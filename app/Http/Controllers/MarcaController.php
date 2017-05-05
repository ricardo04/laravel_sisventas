<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MarcaFormRequest;
use illuminate\html;
use DB;
use Excel;


class MarcaController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');   
    }
    
    public function index(Request $request)
    {
         if ($request)
        {
            $marca = Marca::all();
            return view('almacen.marca.index',["marca"=>$marca]);
        }
        
    }
     public function create()
    {
    	return view('almacen.marca.create');
    }
    
    public function store(MarcaFormRequest $request)
    {
        $flag = false;
        $marcas = DB::table('marca')->get();
       
        foreach ($marcas as $key => $mar)
        {
            if(strcasecmp($mar->nombre,$request->get('nombre')) == 0)
            {
                $flag = true;
            }
        }

        if($flag != true)
        {
    	   $mar = new Marca;
    	   $mar->nombre=$request->get('nombre');
    	   $mar->descripcion=$request->get('descripcion');
    	   $mar->condicion='1';
    	   $mar->save();
           alert()->success("Marca Agregada");
        }
        else
            alert()->error("lo sentimos ya existe una marca con este nombre registrado","Marca no Agregada")->persistent();

        
    	return Redirect::to('almacen/marca');
    }
    
     public function show($id)
    {
    	return view("almacen.marca.show",["marca"=>Marca::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("almacen.marca.edit",["marca"=>Marca::findOrFail($id)]);
    }
    
    public function update(MarcaFormRequest $request, $id)
    {
    	$marca = Marca::findOrFail($id);
    	$marca->nombre=$request->get('nombre');
    	$marca->descripcion=$request->get('descripcion');
    	$marca->update();
        alert()->success("Marca Actualizado Correctamente");

    	return Redirect::to('almacen/marca');
    }
    
    public function destroy($id)
    {
    	$marca = Marca::findOrFail($id);
        if($marca->condicion == 1)
        {
    	   $marca->condicion='0';
           alert()->success('Marca Eliminada');
        }
        elseif($marca->condicion == 0)
        {
             $marca->condicion='1';
             alert()->success('Marca Resturada');
        }
    	$marca->update();

    	return Redirect::to('almacen/marca');
    }
    
    
    public function exportmarcas()
    {
        //cargamos registro de la bd
        $marcas = DB::table('marca')->get();
       
        //creamos el archivo y le ponemos el nombre, tambien usamos el arreglo o lista de categorias del modelo
        Excel::create('Marcas', function($excel) use($marcas) {
            
            //aqui establecemos el nombre del sheet o de la hoja de excel 
            $excel->sheet('Marcas', function($sheet) use($marcas) {
            
            //aqui establecemos con el rango de celda con las que vamosa trabajor
            $sheet->mergeCells('A1:D1');
                
            //nos ubicamos enl a primera fila y accedemos a sus metodos como su fuente, el tipo de fuente, tamano etc
            $sheet->row(1, function ($row) {
                $row->setFontFamily('Comic Sans MS');
                $row->setFontSize(35);
            });
            
            //establecemos a la fila una un margen de celda de 40
            $sheet->setHeight(1, 40);
                
            // en la fila 1 nos huicamos y establecemos el titulo de la tabla
            $sheet->row(1, array('Marcas Registradas'));
                
            //apartir de este rango de la celda del titulo establecemos el color de fondo que es verde y aliniamos el texto
            $sheet->cells('A1:D1', function($cells) {
             $cells->setBackground('green');
             $cells->setAlignment('center');
            });
                
            $sheet->cells('A2:D2', function($cells) {
             $cells->setBackground('#6ccbd8');
            });
                
            $sheet->setBorder('A1:D'. (count($marcas) + 2), 'thin');
            
            $sheet->appendRow(2,array('N.','Nombre','Descripcion','Estado'));
            
                
            $count = 3;
            $quantity = 1;
            $activos = 0;
            $inactivos = 0;
            foreach($marcas as $mar)
            {
                $estado = '';
                if($mar->condicion)
                {
                    $estado = 'Activo';
                    $sheet->appendRow($count,array($quantity,$mar->nombre,$mar->descripcion,$estado));
                    $sheet->setHeight($count, 15);
                    $count += 1;
                    $quantity +=1;
                    $activos +=1;
                }
                else
                {
                    $estado = 'Inactivo';
                    $sheet->appendRow($count,array($quantity,$mar->nombre,$mar->descripcion,$estado));
                    $sheet->row($count,function($row){
                        $row->setBackground('#d4514a');
                    });
                    $sheet->setHeight($count, 15);
                    $count += 1;
                    $quantity +=1;
                    $inactivos +=1;
                }
            }
            
            $sheet->appendRow($count+3,array('Activos',$activos));
            $sheet->cells('A'. ($count+3) . ':B' . ($count+3), function($cells) {
                 $cells->setBackground('#26f094');
            });
                
            
            // aqui van los resultados de los total de activos e inactivos asi como su desi}o del mismo    
            $sheet->setBorder('A'. ($count+3) . ':B' . ($count+5), 'thin');
                
            $sheet->appendRow($count+4,array('Inactivos',$inactivos));
                
             $sheet->cells('A'. ($count+4) . ':B' . ($count+4), function($cells) {
                 $cells->setBackground('#d4514a');
            });
           
            $sheet->appendRow($count+5,array('Total',($activos+$inactivos)));
            $sheet->cells('A'. ($count+5) . ':B' . ($count+5), function($cells) {
                 $cells->setBackground('#feff4e');
            });
                
            
        });

        })->export('xls');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use illuminate\html;
use DB;
use Excel;
use Alert;


class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');   
    }
    
    public function index(Request $request)
    {
         if ($request)
        {      
            $category = Categoria::all();

             
            return view('almacen.categoria.index',["category"=>$category]);
        }
        
    }
    
    public function create()
    {
    	return view('almacen.categoria.create');
    }

    public function store(CategoriaFormRequest $request)
    {
        $flag = false;
        $categories = DB::table('categoria')->get();
       
        foreach ($categories as $key => $cat)
        {
            if(strcasecmp($cat->nombre,$request->get('nombre')) == 0)
            {
                $flag = true;
            }
        }

        if($flag != true)
        {
           $category = new Categoria;
    	   $category->nombre=$request->get('nombre');
    	   $category->descripcion=$request->get('descripcion');
           $category->utilidad=$request->get('utilidad');
    	   $category->condicion='1';
    	   $category->save();
           alert()->success('Categoria Agregada', '');;
         
        }
        else
        {
            alert()->error('Lo sentimos, este nombre ya existe en la lista de categorias', 'No Agregado')->persistent('Close');
        }

        
    	return Redirect::to('almacen/categoria');
    }

    public function show($id)
    {
    	return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request, $id)
    {
    	$category = Categoria::findOrFail($id);
    	$category->nombre=$request->get('nombre');
    	$category->descripcion=$request->get('descripcion');
        $category->utilidad=$request->get('utilidad');
    	$category->update();
        alert()->success('Actualizado Correctamente !!',null);

    	return Redirect::to('almacen/categoria');
    }

    public function destroy($id)
    {
    	$category = Categoria::findOrFail($id);
        if($category->condicion == 1)
        {
    	   $category->condicion='0';
           alert()->success('Categoria Eliminada', '');;
        }
        elseif($category->condicion == 0)
        {
             $category->condicion='1';
             alert()->success('Categoria Reanudada', '');;
        }
    	$category->update();


    	return Redirect::to('almacen/categoria');
    }
    
    public function searchcategoria()
    {
        return DataTables::eloquent(Categoria::query())->make(true);
    }
    
    public function export()
    {
        //cargamos registro de la bd
        $categorias = DB::table('categoria')->get();
       
        //creamos el archivo y le ponemos el nombre, tambien usamos el arreglo o lista de categorias del modelo
        Excel::create('Categorias', function($excel) use($categorias) {
            
            //aqui establecemos el nombre del sheet o de la hoja de excel 
            $excel->sheet('Categorias', function($sheet) use($categorias) {
            
            //aqui establecemos con el rango de celda con las que vamosa trabajor
            $sheet->mergeCells('A1:E1');
                
            //nos ubicamos enl a primera fila y accedemos a sus metodos como su fuente, el tipo de fuente, tamano etc
            $sheet->row(1, function ($row) {
                $row->setFontFamily('Comic Sans MS');
                $row->setFontSize(35);
            });
            
            //establecemos a la fila una un margen de celda de 40
            $sheet->setHeight(1, 40);
                
            // en la fila 1 nos huicamos y establecemos el titulo de la tabla
            $sheet->row(1, array('Todas las categorias'));
                
            //apartir de este rango de la celda del titulo establecemos el color de fondo que es verde y aliniamos el texto
            $sheet->cells('A1:E1', function($cells) {
             $cells->setBackground('green');
             $cells->setAlignment('center');
            });
                
            $sheet->cells('A2:E2', function($cells) {
             $cells->setBackground('#6ccbd8');
            });
                
            $sheet->setBorder('A1:E'. (count($categorias) + 2), 'thin');
            
            $sheet->appendRow(2,array('N.','Nombre','Descripcion','Utilidad','Estado'));
            
                
            $count = 3;
            $quantity = 1;
            $activos = 0;
            $inactivos = 0;
            foreach($categorias as $cat)
            {
                $estado = '';
                if($cat->condicion)
                {
                    $estado = 'Activo';
                    $sheet->appendRow($count,array($quantity,$cat->nombre,$cat->descripcion,($cat->utilidad . ' %'),$estado));
                    $sheet->setHeight($count, 15);
                    $count += 1;
                    $quantity +=1;
                    $activos +=1;
                }
                else
                {
                    $estado = 'Inactivo';
                    $sheet->appendRow($count,array($quantity,$cat->nombre,$cat->descripcion,($cat->utilidad . ' %'),$estado));
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
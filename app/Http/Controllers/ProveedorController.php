<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProveedorFormRequest;
use illuminate\html;
use DB;
use Excel;
use PDF;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    
    public function index(Request $request)
    {
        if($request)
        {
            $proveedores = DB::table('proveedor')->get();
            
            return view('compra.proveedor.index',["proveedores"=>$proveedores]);
        }
    }
    
    public function create()
    {
        return view('compra.proveedor.create');
    }
    
    public function store(ProveedorFormRequest $request)
    {
        $flag = false;
        
        $proveedores = DB::table('proveedor')->get();
        
        foreach($proveedores as $prove)
        {
            if(strcasecmp($prove->ruc,$request->get('ruc')) == 0 || strcasecmp($prove->nombre,$request->get('nombre')) == 0 || strcasecmp($prove->telefono,$request->get('telefono')) == 0)
            {
                $flag = true;
            }
        }
        
        if($flag != true)
        {
            $proveedor = new Proveedor();
            $proveedor->ruc = $request->get('ruc');
            $proveedor->nombre = $request->get('nombre');
            $proveedor->telefono = $request->get('telefono');
            $proveedor->direccion = $request->get('direccion');
            $proveedor->correo = $request->get('correo');
            $proveedor->condicion = true;
            $proveedor->save();
            alert()->success("Proveedor Agregado");
        }
        else
        {
            alert()->error("Lo sentimos, los datos de este proveedor ya estan siendo usado por otro proveedor, por favor, verifique sus datos","Error Al Agregar")->persistent();
        }
        
        return Redirect::to('compra/proveedor');
    }
    
    public function update(ProveedorFormRequest $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->ruc = $request->get("ruc");
        $proveedor->nombre = $request->get("nombre");
        $proveedor->telefono = $request->get("telefono");
        $proveedor->direccion = $request->get("direccion");
        $proveedor->correo = $request->get("correo");
        $proveedor->update();
        alert()->success("Proveedor actualizado Satisfactoriamente!");
        
        return Redirect::to("compra/proveedor");
    }
    
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        
        if($proveedor->condicion == 1)
        {
            $proveedor->condicion = 0;
            alert()->success("Proveedor Eliminado");
        }
        else
        {
            $proveedor->condicion = 1;
            alert()->success("Proveedor Restaurado");
        }
        
        $proveedor->update();
        
        return Redirect::to('compra/proveedor');
    }
    
    public function exportproveedor()
    {
        //cargamos registro de la bd
        $proveedores = DB::table('proveedor')->orderBy('idproveedor')->get();
       
        //creamos el archivo y le ponemos el nombre, tambien usamos el arreglo o lista de categorias del modelo
        Excel::create('Proveedores', function($excel) use($proveedores) {
            
            //aqui establecemos el nombre del sheet o de la hoja de excel 
            $excel->sheet('Proveedor', function($sheet) use($proveedores) {
                
            //aqui establecemos con el rango de celda con las que vamosa trabajor
            $sheet->mergeCells('A1:G1');
                
            //nos ubicamos enl a primera fila y accedemos a sus metodos como su fuente, el tipo de fuente, tamano etc
            $sheet->row(1, function ($row) {
                $row->setFontFamily('Comic Sans MS');
                $row->setFontSize(35);
            });
            
            //establecemos a la fila una un margen de celda de 40
            $sheet->setHeight(1, 40);
                
            // en la fila 1 nos huicamos y establecemos el titulo de la tabla
            $sheet->row(1, array('Proveedores Registrados'));
                
            //apartir de este rango de la celda del titulo establecemos el color de fondo que es verde y aliniamos el texto
            $sheet->cells('A1:G1', function($cells) {
             $cells->setBackground('green');
             $cells->setAlignment('center');
            });
                
            $sheet->cells('A2:G2', function($cells) {
             $cells->setBackground('#6ccbd8');
            });
                
            $sheet->setBorder('A1:G'. (count($proveedores) + 2), 'thin');
            
            $sheet->appendRow(2,array('N.','RUC','Nombre','Direccion','Telefono','Correo','Estado'));
            
                
            $count = 3;
            $quantity = 1;
            $activos = 0;
            $inactivos = 0;
                
            foreach($proveedores as $prove)
            {
                $estado = '';
                if($prove->condicion)
                {
                    $estado = 'Activo';
                    $sheet->appendRow($count,array($quantity,$prove->ruc,$prove->nombre,$prove->direccion,$prove->telefono,$prove->correo,$estado));
                    $sheet->setHeight($count, 15);
                    $count += 1;
                    $quantity +=1;
                    $activos +=1;
                    
                }
                else
                {
                    $estado = 'Inactivo';
                    $sheet->appendRow($count,array($quantity,$prove->ruc,$prove->nombre,$prove->direccion,$prove->telefono,$prove->correo,$estado));
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

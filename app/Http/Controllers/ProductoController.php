<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProductoFormRequest;
use illuminate\html;
use DB;
use Excel;
use PDF;
use PHPExcel_Worksheet_Drawing;


class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    
    public function index(Request $request)
    {
         if ($request)
        {
            $product = DB::table('producto as p')
                        ->join('categoria as c','p.idcategoria','=','c.idcategoria')
                        ->join('marca as m','p.idmarca','=','m.idmarca')
                        ->select('p.idproducto','p.codigobarra','c.nombre as categoria','p.nombre','m.nombre as marca','p.descripcion','p.imagen','p.condicion')
                        ->orderBy('p.idproducto','asc')->get();
             
            return view('almacen.producto.index',["product"=>$product]);
        }
        
    }
    
    public function create()
    {
        $categorias =  DB::table('categoria')->where('condicion','=','1')->get();
        $marcas = DB::table('marca')->where('condicion','=','1')->get();
    	return view('almacen.producto.create',["categorias"=>$categorias,"marcas"=>$marcas]);
    }
    
    public function store(ProductoFormRequest $request)
    {
        
    	   $producto = new Producto;
    	   $producto->nombre=$request->get('nombre');
    	   $producto->descripcion=$request->get('descripcion');
           $producto->idcategoria=$request->get('idcategoria');
           $producto->idmarca=$request->get('idmarca');
           $producto->codigobarra=$request->get('codigobarra');
    	   $producto->condicion='1';
            if(Input::hasfile('imagen'))
    	   {
                $file = Input::file('imagen');
                $extension = $file->extension();
    	   	     $file->move(public_path().'/pictures/productos/', $producto->codigobarra."." .$extension);
    	   	   $producto->imagen= $producto->codigobarra . "." . $extension;
    	   }
            
    	   $producto->save();
           alert()->success("Producto registrado !!");
        
    	return Redirect::to('almacen/producto')->with('message', 'Success!');
    }
    
    function show($id)
    {
    	return view("almacen.producto.show",["producto"=>Producto::findOrFail($id)]);
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $marcas = DB::table("marca")->where("condicion",'=','1')->get();
        $categorias = DB::table("categoria")->where("condicion",'=','1')->get();
    	return view("almacen.producto.edit",["producto"=>$producto,"marcas"=>$marcas,"categorias"=>$categorias]);
    }
    
    public function update(ProductoFormRequest $request,$id)
    {
        $producto = Producto::findOrFail($id);
        $producto->nombre=$request->get('nombre');
        $producto->descripcion=$request->get('descripcion');
        $producto->idcategoria=$request->get('idcategoria');
        $producto->idmarca=$request->get('idmarca');
        $producto->codigobarra=$request->get('codigobarra');
        
        if(Input::hasfile('imagen'))
        {
            $file = Input::file('imagen');
            $extension = $file->extension();
    	    $file->move(public_path().'/pictures/productos/', $producto->idproducto."." .$extension);
    	    $producto->imagen= $producto->idproducto . "." . $extension;
        }
        $producto->update();
        alert()->success("Producto Actualizado !!");
        return Redirect::to('almacen/producto');
    }
    
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        if($producto->condicion == 1)
        {
    	   $producto->condicion='0';
           alert()->success('Marca Eliminada');
        }
        elseif($producto->condicion == 0)
        {
             $producto->condicion='1';
             alert()->success('Marca Resturada');
        }
    	$producto->update();

    	return Redirect::to('almacen/producto');
    }
    
    public function printbarcode($id)
    {
        $producto = Producto::findOrFail($id);
        $pdf = PDF::loadView('almacen.producto.barcode',['producto'=>$producto]);
        return $pdf->download('archivo.pdf');
    } 
    
    public function exportproductos()
    {
        //cargamos registro de la bd
        $producto = DB::table('producto as p')
                        ->join('categoria as c','p.idcategoria','=','c.idcategoria')
                        ->join('marca as m','p.idmarca','=','m.idmarca')
                        ->select('p.idproducto','p.codigobarra','c.nombre as categoria','p.nombre','m.nombre as marca','p.descripcion','p.imagen','p.condicion')
                        ->orderBy('p.idproducto','asc')->get();
       
        //creamos el archivo y le ponemos el nombre, tambien usamos el arreglo o lista de categorias del modelo
        Excel::create('Productos', function($excel) use($producto) {
            
            //aqui establecemos el nombre del sheet o de la hoja de excel 
            $excel->sheet('Productos', function($sheet) use($producto) {
                
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
            $sheet->row(1, array('Productos Registrados'));
                
            //apartir de este rango de la celda del titulo establecemos el color de fondo que es verde y aliniamos el texto
            $sheet->cells('A1:G1', function($cells) {
             $cells->setBackground('green');
             $cells->setAlignment('center');
            });
                
            $sheet->cells('A2:G2', function($cells) {
             $cells->setBackground('#6ccbd8');
            });
                
            $sheet->setBorder('A1:G'. (count($producto) + 2), 'thin');
            
            $sheet->appendRow(2,array('N.','Codigo Barra','Categoria','Nombre','Marca','Descripcion','Estado'));
            
                
            $count = 3;
            $quantity = 1;
            $activos = 0;
            $inactivos = 0;
                
            foreach($producto as $prod)
            {
                $estado = '';
                if($prod->condicion)
                {
                    $estado = 'Activo';
                    $sheet->appendRow($count,array($quantity,$prod->codigobarra,$prod->categoria,$prod->nombre,$prod->marca,$prod->descripcion,$estado));
                    $sheet->setHeight($count, 15);
                    $count += 1;
                    $quantity +=1;
                    $activos +=1;
                    
                }
                else
                {
                    $estado = 'Inactivo';
                    $sheet->appendRow($count,array($quantity,$prod->codigobarra,$prod->categoria,$prod->nombre,$prod->marca,$prod->descripcion,$estado));
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
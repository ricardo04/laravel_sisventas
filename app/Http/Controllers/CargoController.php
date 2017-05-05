<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CargoFormRequest;
use Illuminate\Http\Request;
use App\Cargopermiso;
use illuminate\html;
use App\Cargo;
use Excel;
use Alert;
use DB;

class CargoController extends Controller
{
   public function __construct()
   {
   		$this->middleware('auth');
   }

   public function index(Request $request)
   {
   		if($request)
   		{
   			$cargos = DB::table('cargo')->get();

   			return view('seguridad.cargo.index',["cargos"=>$cargos]);
   		}
   }

   public function store(CargoFormRequest $request)
   {
      $cargos = DB::table('cargo')->get();
      $flag = false;

      foreach ($cargos as $key => $cargo) 
      {
         if(strcasecmp($cargo->nombre, $request->get('nombre')) == 0)
         {
            $flag = true;
         }

      }

      if($flag != true)
      {
          $cargo = new Cargo();
          $cargo->nombre = $request->get('nombre');
          $cargo->descripcion = $request->get('descripcion');
          $cargo->condicion = true;
          $cargo->save();
          Permisocargo::save($cargo->nombre);
          Alert()->success("Cargo agregado correctamente !!");  
      }
      else
      {
         Alert()->error("lo sentimos, ya existe un cargo con este nombre, por favor, verique sus datos!!","Error al crear Cargo !!")->persistent();
      }

   return Redirect::to('seguridad/cargo');

   }

   public function update(CargoFormRequest $request, $id)
   {
      $cargo = Cargo::findOrFail($id);

      $cargo->nombre = $request->get('nombre');
      $cargo->descripcion = $request->get('descripcion');
      $cargo->condicion = true;
      $cargo->update();
      Alert()->success('Actualizado Correctamente !!');

      return Redirect::to('seguridad/cargo');
   }

   public function destroy($id)
   {
      $cargo = Cargo::findOrFail($id);

      if($cargo->condicion == true)
      {
         $cargo->condicion = false;
         Alert()->success("El cargo ha sido eliminado Correctamente !!");
      }
      else
      {
         $cargo->condicion = true;
         Alert()->success("El cargo ha sido restaurado Correctamente !!");
      }

      $cargo->update();

      return Redirect::to('seguridad/cargo');
   }


   


   public function exportcargo()
    {
        //cargamos registro de la bd
        $cargos = DB::table('cargo')->get();
       
        //creamos el archivo y le ponemos el nombre, tambien usamos el arreglo o lista de categorias del modelo
        Excel::create('Cargos', function($excel) use($cargos) {
            
            //aqui establecemos el nombre del sheet o de la hoja de excel 
            $excel->sheet('Roles', function($sheet) use($cargos) {
            
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
            $sheet->row(1, array('Cargos'));
                
            //apartir de este rango de la celda del titulo establecemos el color de fondo que es verde y aliniamos el texto
            $sheet->cells('A1:D1', function($cells) {
             $cells->setBackground('green');
             $cells->setAlignment('center');
            });
                
            $sheet->cells('A2:D2', function($cells) {
             $cells->setBackground('#6ccbd8');
            });
                
            $sheet->setBorder('A1:D'. (count($cargos) + 2), 'thin');
            
            $sheet->appendRow(2,array('N.','Nombre','Descripcion','Estado'));
            
                
            $count = 3;
            $quantity = 1;
            $activos = 0;
            $inactivos = 0;
            foreach($cargos as $cargo)
            {
                $estado = '';
                if($cargo->condicion)
                {
                    $estado = 'Activo';
                    $sheet->appendRow($count,array($quantity,$cargo->nombre,$cargo->descripcion,$estado));
                    $sheet->setHeight($count, 15);
                    $count += 1;
                    $quantity +=1;
                    $activos +=1;
                }
                else
                {
                    $estado = 'Inactivo';
                    $sheet->appendRow($count,array($quantity,$cargo->nombre,$cargo->descripcion,$estado));
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



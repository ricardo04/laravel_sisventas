<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Hash; 
use illuminate\html;
use App\User;
use Excel;
use PDF;
use DB;


class UsuarioController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if($request)
        {
            $usuarios = DB::table('users as u')
                        ->join('cargo as c','u.idcargo','=','c.idcargo')
                        ->select('u.id as id','u.cedula as cedula','u.name as nombre', 'u.imagen' ,'u.email as correo','u.telefono as telefono','u.direccion as direccion','c.nombre as cargo','c.idcargo','u.condicion as condicion')
                        ->get();
            
            $cargos = DB::table('cargo')->where('condicion','=','1')->get();
            
            return view('seguridad.usuario.index',["usuarios"=>$usuarios,"cargos"=>$cargos]);
        }
    }
    
    public function store(UsuarioFormRequest $request)
    {
        $flag = false;
        
        $usuarios = DB::table('users')->get();
        
        foreach($usuarios as $key => $user)
        {
            if(strcasecmp($user->cedula,$request->get('cedula')) == 0)
            {
                $flag = true;
            }
        }
        
        if($flag != true)
        {
            $usuario = new User();
            $usuario->cedula = $request->get('cedula');
            $usuario->name = $request->get('nombre');
            $usuario->email = $request->get('correo');
            $usuario->telefono = $request->get('telefono');
            $usuario->direccion = $request->get('direccion');
            $usuario->idcargo = $request->get('cargo');
            $usuario->password = bcrypt($request->get('password'));
            $usuario->condicion = true;
            if(Input::hasfile('imagen'))
            {
                $file = Input::file('imagen');
                $extension = $file->extension();
                $file->move(public_path(). '/pictures/usuarios/', $usuario->cedula . "." . $extension);
                $usuario->imagen = $usuario->cedula . "." . $extension;
            }
            
            $usuario->save();
            alert()->success("Usuario Registrado Correctamente !!");
            
            
        }
        else
        {
            alert()->error("Lo sentimos, ya existe un usuario registrado con esta cedula, por favor, verifique sus datos!","Error registrar !!")->persistent();
        }

        return Redirect::to('seguridad/usuario');
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $cargos = DB::table("cargo")->where("condicion",'=','1')->get();

        return view("seguridad.usuario.edit",["usuario"=>$usuario,"cargos"=>$cargos]);
    }

    public function update(UsuarioFormRequest $request,$id)
    {
        
        $usuario = User::findOrFail($id);
        $usuario->cedula = $request->get('cedula');
        $usuario->name = $request->get('nombre');
        $usuario->email = $request->get('correo');
        $usuario->telefono = $request->get('telefono');
        $usuario->direccion = $request->get('direccion');
        $usuario->idcargo = $request->get('idcargo');
        $usuario->condicion = true;

        if($request->get('password') != '')
        {
            $usuario->password = bcrypt($request->get('password'));
        }

        if(Input::hasfile('imagen'))
        {
            $file = Input::file('imagen');
            $extension = $file->extension();
            $file->move(public_path() . '/pictures/usuarios/', $usuario->id . "." . $extension);
            $usuario->imagen = $usuario->id . "." . $extension;
        }

        $usuario->update();
        alert()->success("Usuario Actualizado !!");

        return Redirect::to('seguridad/usuario');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        if($usuario->condicion == true)
        {
            $usuario->condicion = false;
            alert()->success("Usuario Eliminado Correctamente !! ");
        }
        else
        {
            $usuario->condicion = true;
            alert()->success("Usuario Reanudado Correctamente !!");
        }

        $usuario->update();

        return Redirect::to('seguridad/usuario');
    }

    public function exportusuarios()
    {
        //cargamos registro de la bd
        $usuarios = DB::table('users as u')
                        ->join('cargo as c','u.idcargo','=','c.idcargo')
                        ->select('u.id as id','u.cedula as cedula','u.name as nombre', 'u.imagen' ,'u.email as correo','u.telefono as telefono','u.direccion as direccion','c.nombre as cargo','c.idcargo','u.condicion as condicion')->get();
       
        //creamos el archivo y le ponemos el nombre, tambien usamos el arreglo o lista de categorias del modelo
        Excel::create('Usuarios', function($excel) use($usuarios){
            
            //aqui establecemos el nombre del sheet o de la hoja de excel 
            $excel->sheet('Productos', function($sheet) use($usuarios) {
                
            //aqui establecemos con el rango de celda con las que vamosa trabajor
            $sheet->mergeCells('A1:H1');
                
            //nos ubicamos enl a primera fila y accedemos a sus metodos como su fuente, el tipo de fuente, tamano etc
            $sheet->row(1, function ($row) {
                $row->setFontFamily('Comic Sans MS');
                $row->setFontSize(35);
            });
            
            //establecemos a la fila una un margen de celda de 40
            $sheet->setHeight(1, 40);
                
            // en la fila 1 nos huicamos y establecemos el titulo de la tabla
            $sheet->row(1, array('Usuarios Registrados'));
                
            //apartir de este rango de la celda del titulo establecemos el color de fondo que es verde y aliniamos el texto
            $sheet->cells('A1:H1', function($cells) {
             $cells->setBackground('green');
             $cells->setAlignment('center');
            });
                
            $sheet->cells('A2:H2', function($cells) {
             $cells->setBackground('#6ccbd8');
            });
                
            $sheet->setBorder('A1:H'. (count($usuarios) + 2), 'thin');
            
            $sheet->appendRow(2,array('N.','Cedula','Nombre','Correo','Telefono','Direccion','Cargo','Estado'));
            
                
            $count = 3;
            $quantity = 1;
            $activos = 0;
            $inactivos = 0;
                
            foreach($usuarios as $user)
            {
                $estado = '';
                if($user->condicion)
                {
                    $estado = 'Activo';
                    $sheet->appendRow($count,array($quantity,$user->cedula,$user->nombre,$user->correo,$user->telefono,$user->direccion,$user->cargo,$estado));
                    $sheet->setHeight($count, 15);
                    $count += 1;
                    $quantity +=1;
                    $activos +=1;
                    
                }
                else
                {
                    $estado = 'Inactivo';
                    $sheet->appendRow($count,array($quantity,$user->cedula,$user->nombre,$user->correo,$user->telefono,$user->direccion,$user->cargo,$estado));
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

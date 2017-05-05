<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ContactoFormRequest;
use Illuminate\Http\Request;
use illuminate\html;
use App\Contacto;
use DB;
use Excel;
use PDF;

class ContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(Request $request,$id)
    {
        $contactos = DB::table('contacto')->where('idproveedor','=',$id)->get();
        
        $proveedores = DB::table('proveedor')->where('condicion','=','1')->get();
        
         return view('compra.contacto.show',["contactos"=>$contactos,"idproveedor"=>$id,"proveedores"=>$proveedores]);
    }

    public function store(ContactoFormRequest $request)
    {
        $contactos = DB::table('contacto')->get();
        $flag = false;
        
        foreach($contactos as $key => $contacto)
        {
            if(strcasecmp($request->get('cedula'),$contacto->cedula) == 0)
            {
                $flag = true;
            }
        }
        
        if($flag != true)
        {
            $contacto = new Contacto();
            $contacto->cedula = $request->get('cedula');
            $contacto->nombre1 = $request->get('nombre1');
            $contacto->nombre2 = $request->get('nombre2');
            $contacto->apellido1 = $request->get('apellido1');
            $contacto->apellido2 = $request->get('apellido2');
            $contacto->telefono = $request->get('telefono');
            $contacto->idproveedor = $request->get('idproveedor');
            $contacto->condicion = true;
            $contacto->save();
            alert()->success("Contacto Registrado !");
        }
        else
        {
            alert()->error("Lo sentimos, ya existe un contacto con esta cedula, por favor verifique sus datos","Error al Registrar Contacto");
        }
        
        return Redirect::to('compra/contacto/' . $request->get('idproveedor'));
    }
    
    public function update(ContactoFormRequest $request, $idcontacto)
    {
       dd();
        $contacto = Contacto::findOrFail($idcontacto);
        $current_supplier = $contacto->idproveedor;
        $contacto->cedula = $request->get('cedula');
        $contacto->nombre1 = $request->get('nombre1');
        $contacto->nombre2 = $request->get('nombre2');
        $contacto->apellido1 = $request->get('apellido1');
        $contacto->apellido2 = $request->get('apellido2');
        $contacto->telefono = $request->get('telefono');
        $contacto->idproveedor = $request->get('idproveedor');
        $contacto->condicion = true;
        $contacto->update();
        alert()->success("Actualizado Correctamente !");
        
        return Redirect::to('compra/contacto/' . $current_supplier);
    }
    
    public function destroy($id)
    {
    
         $contacto = Contacto::findOrFail($id);
        
        if($contacto->condicion == 1)
        {
            $contacto->condicion = 0;
            alert()->success("Contacto Eliminado");
        }
        else
        {
            $contacto->condicion = 1;
            alert()->success("Contacto Restaurado");
        }
        
        $contacto->update();
        
        return Redirect::to('compra/contacto/' . $contacto->idproveedor);
        
    }
    
   

    
}
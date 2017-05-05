<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use illuminate\html;
use App\Permiso;
use Alert;
use Excel;
use DB;

class PermisoController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if($request)
    	{
    		$cargos = DB::table('cargo')->where('condicion','=','1')->get();
    		return view('seguridad.permiso.index',['cargos'=>$cargos]);
    	}
    }

}

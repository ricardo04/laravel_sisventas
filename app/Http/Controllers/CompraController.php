<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CompraFormRequest;
use Illuminate\Http\Request;
use illuminate\html;
use App\Compra;
use Alert;
use Excel;
use DB;


class CompraController extends Controller
{
   
   public function __construct()
   {
   		$this->middleware('auth');
   }

   public function index(Request $request)
   {
   		if($request)
   		{
            $proveedores = DB::table('proveedor')->where('condicion','=','1')->get();
   			return view('compra.compra.index',['proveedores'=>$proveedores]);
   		}
   }
}

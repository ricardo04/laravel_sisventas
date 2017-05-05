<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   	return redirect('/login');

});


Auth::routes();
Route::get('/home','HomeController@index');

//routas de las categorias
Route::resource('almacen/categoria','CategoriaController');
Route::get('export','CategoriaController@export');

//routas de las marcas
Route::resource('almacen/marca','MarcaController');
Route::get('exportmarcas','MarcaController@exportmarcas');

//routas de los productos
Route::resource('almacen/producto','ProductoController');
Route::get('printbarcode/{id}','ProductoController@printbarcode');
Route::get('exportproductos','ProductoController@exportproductos');

//routas inventario
Route::resource('almacen/inventario','InventarioController');

//routas compra
Route::resource('compra/compra','CompraController');

//routas cuentas por pagar
Route::resource('compra/cuentas','CuentraController');

//routas proveedores
Route::resource('compra/proveedor','ProveedorController');
Route::get('exportproveedor','ProveedorController@exportproveedor');

//routas contacto
Route::resource('compra/contacto','ContactoController');

//Routas reportes
Route::resource('compra/reporte','ReportecompraController');

//Routas venta
Route::resource('venta/venta','VentaController');

//routas cuentas por cobrar
Route::resource('venta/cuentas','CobroController');

//rutas de los clientes
Route::resource('venta/cliente','ClienteController');

//reportes venta
Route::resource('venta/reporte','VentareporteController');

//rutas estadisticas.
Route::resource('estadisticas/compra','EstadisticacompraController');

//rutas estadisticas venta
Route::resource('estadisticas/venta','EstadisticaventaController');

//rutas productos mas vendidos
Route::resource('estadisticas/producto','EstadisticaproductoController');

//routas de los usuarios
Route::resource('seguridad/usuario','UsuarioController');
Route::get('exportusuarios','UsuarioController@exportusuarios');

//rutas de los cargos
Route::resource('seguridad/cargo','CargoController');
Route::get('exportcargo','CargoController@exportcargo');

//ruta de los permisos
Route::resource('seguridad/permiso','PermisoController');

//ruta del respaldo
Route::resource('seguridad/backup','BackupController');

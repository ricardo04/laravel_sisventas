<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contacto';

	protected $primaryKey = "idcontacto";

	public $timestamps=false;

	protected $fillable =[
		'cedula',
		'nombre1',
		'nombre2',
        'apellido1',
        'apellido2',
        'telefono',
        'condicion',
        'idproveedor'
	];
}

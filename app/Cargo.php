<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargo';

	protected $primaryKey = "idcargo";

	public $timestamps=false;

	protected $fillable =[
		'nombre',
		'descripcion',
		'condicion',
	];
	
}

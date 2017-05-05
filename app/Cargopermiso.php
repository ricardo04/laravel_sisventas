<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargopermiso extends Model
{
    protected $table = 'cargopermiso';

	protected $primaryKey = "idcargopermiso";

	public $timestamps=false;

	protected $fillable =[
		'idcargo',
		'idpermiso',
		'condicion',
	];
}

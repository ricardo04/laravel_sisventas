<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
   protected $table = 'permiso';
   protected $primaryKey = 'idpermiso';

   public $time_stamps = false;

   protected $fillable =[
   'nombre',
   'condicion'
   ];
}

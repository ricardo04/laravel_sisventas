<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedor';
    
    protected $primaryKey = 'idproveedor';
    
    public $timestamps = false;
    
    protected $fillable =
        [
            'ruc',
            'nombre',
            'direccion',
            'telefono',
            'correo',
            'condicion'  
        ];
    
    protected $guarded = [];
    
}

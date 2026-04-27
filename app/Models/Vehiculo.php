<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = [
        'marca',
        'modelo',   
        'matricula',
        'anio',    
        'capacidad',
        'activo'
    ];
}
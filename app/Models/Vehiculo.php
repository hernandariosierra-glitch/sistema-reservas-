<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = [
    'marca',
    'modelo',
    'tipo',
    'matricula',
    'anio',
    'capacidad',
    'activo'
];
public function tipo()
{
    return $this->belongsTo(TipoVehiculo::class);
}
}
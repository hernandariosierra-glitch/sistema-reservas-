<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    protected $table = 'tipos_vehiculo';

    protected $fillable = [
        'nombre',
        'precio_base',
        'descripcion'
    ];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
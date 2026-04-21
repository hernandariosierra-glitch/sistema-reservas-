<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Chofer;

class Reserva extends Model
{
    protected $fillable = [
        'cliente_id',
        'vehiculo_id',
        'chofer_id',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'activo'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function chofer()
    {
        return $this->belongsTo(Chofer::class);
    }
}
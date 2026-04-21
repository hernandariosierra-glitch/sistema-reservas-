<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ChoferController;

Route::get('/', [ReservaController::class, 'dashboard'])
    ->name('dashboard');

Route::resource('clientes', ClienteController::class);

Route::resource('vehiculos', VehiculoController::class);

Route::resource('choferes', ChoferController::class)
    ->parameters(['choferes' => 'chofer']);

Route::resource('reservas', ReservaController::class);

Route::post('reservas/{reserva}/confirmar', [ReservaController::class, 'confirmar'])
    ->name('reservas.confirmar');

Route::post('reservas/{reserva}/cancelar', [ReservaController::class, 'cancelar'])
    ->name('reservas.cancelar');
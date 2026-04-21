<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Chofer;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['cliente', 'vehiculo', 'chofer'])
            ->where('activo', true)
            ->get();

        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $clientes = Cliente::where('activo', true)->get();
        $vehiculos = Vehiculo::where('activo', true)->get();
        $choferes = Chofer::where('activo', true)->get();

        return view('reservas.create', compact('clientes', 'vehiculos', 'choferes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio'
        ]);

        $existeReserva = Reserva::where('vehiculo_id', $request->vehiculo_id)
            ->where('activo', true)
            ->where(function ($query) use ($request) {
                $query->whereBetween('fecha_inicio', [$request->fecha_inicio, $request->fecha_fin])
                      ->orWhereBetween('fecha_fin', [$request->fecha_inicio, $request->fecha_fin])
                      ->orWhere(function ($q) use ($request) {
                          $q->where('fecha_inicio', '<=', $request->fecha_inicio)
                            ->where('fecha_fin', '>=', $request->fecha_fin);
                      });
            })
            ->exists();

        if ($existeReserva) {
            return back()->withErrors([
                'vehiculo_id' => 'El vehículo ya está reservado en ese rango de fechas.'
            ])->withInput();
        }

        Reserva::create($request->all());

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva creada correctamente');
    }

    public function edit(Reserva $reserva)
    {
        $clientes = Cliente::where('activo', true)->get();
        $vehiculos = Vehiculo::where('activo', true)->get();
        $choferes = Chofer::where('activo', true)->get();

        return view('reservas.edit', compact('reserva', 'clientes', 'vehiculos', 'choferes'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio'
        ]);

        $existeReserva = Reserva::where('vehiculo_id', $request->vehiculo_id)
            ->where('id', '!=', $reserva->id)
            ->where('activo', true)
            ->where(function ($query) use ($request) {
                $query->whereBetween('fecha_inicio', [$request->fecha_inicio, $request->fecha_fin])
                      ->orWhereBetween('fecha_fin', [$request->fecha_inicio, $request->fecha_fin])
                      ->orWhere(function ($q) use ($request) {
                          $q->where('fecha_inicio', '<=', $request->fecha_inicio)
                            ->where('fecha_fin', '>=', $request->fecha_fin);
                      });
            })
            ->exists();

        if ($existeReserva) {
            return back()->withErrors([
                'vehiculo_id' => 'El vehículo ya está reservado en ese rango de fechas.'
            ])->withInput();
        }

        $reserva->update($request->all());

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva actualizada correctamente');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->update(['activo' => false]);

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva eliminada correctamente');
    }

    public function confirmar(Reserva $reserva)
    {
        $reserva->update(['estado' => 'confirmada']);

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva confirmada correctamente');
    }

    public function cancelar(Reserva $reserva)
    {
        $reserva->update(['estado' => 'cancelada']);

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva cancelada correctamente');
    }

    public function dashboard()
    {
        $totalClientes = Cliente::where('activo', true)->count();
        $totalVehiculos = Vehiculo::where('activo', true)->count();
        $totalChoferes = Chofer::where('activo', true)->count();

        $reservasActivas = Reserva::where('activo', true)->count();
        $reservasPendientes = Reserva::where('estado', 'pendiente')
                                ->where('activo', true)
                                ->count();
        $reservasConfirmadas = Reserva::where('estado', 'confirmada')
                                ->where('activo', true)
                                ->count();
        $reservasCanceladas = Reserva::where('estado', 'cancelada')
                                ->where('activo', true)
                                ->count();

        $ultimasReservas = Reserva::with(['cliente','vehiculo'])
                                ->where('activo', true)
                                ->latest()
                                ->take(5)
                                ->get();

        return view('dashboard', compact(
            'totalClientes',
            'totalVehiculos',
            'totalChoferes',
            'reservasActivas',
            'reservasPendientes',
            'reservasConfirmadas',
            'reservasCanceladas',
            'ultimasReservas'
        ));
    }
}
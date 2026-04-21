<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = Vehiculo::where('activo', true)->get();
    return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'marca' => 'required',
        'modelo' => 'required',
        'matricula' => 'required|unique:vehiculos',
        'capacidad' => 'required|integer|min:1'
    ]);

    Vehiculo::create($request->all());

    return redirect()->route('vehiculos.index')
        ->with('success', 'Vehículo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
         $request->validate([
        'marca' => 'required',
        'modelo' => 'required',
        'matricula' => 'required|unique:vehiculos,matricula,' . $vehiculo->id,
        'capacidad' => 'required|integer|min:1'
    ]);

    $vehiculo->update($request->all());

    return redirect()->route('vehiculos.index')
        ->with('success', 'Vehículo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
          $vehiculo->update(['activo' => false]);

    return redirect()->route('vehiculos.index')
        ->with('success', 'Vehículo eliminado correctamente');
    }
}

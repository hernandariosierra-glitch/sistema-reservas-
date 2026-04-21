<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use Illuminate\Http\Request;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $choferes = Chofer::where('activo', true)->get();
    return view('choferes.index', compact('choferes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('choferes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'documento' => 'required|unique:chofers',
        'telefono' => 'required',
        'licencia' => 'required'
    ]);

    Chofer::create($request->all());

    return redirect()->route('choferes.index')
        ->with('success', 'Chofer creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chofer $chofer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chofer $chofer)
    {
        return view('choferes.edit', compact('chofer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chofer $chofer)
    {
        $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'documento' => 'required|unique:chofers,documento,' . $chofer->id,
        'telefono' => 'required',
        'licencia' => 'required'
    ]);

    $chofer->update($request->all());

    return redirect()->route('choferes.index')
        ->with('success', 'Chofer actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chofer $chofer)
    {
         $chofer->update(['activo' => false]);

    return redirect()->route('choferes.index')
        ->with('success', 'Chofer eliminado correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use Illuminate\Http\Request;

class VueloController extends Controller
{
    public function index()
    {
        $vuelos = Vuelo::orderBy('fecha_salida', 'asc')->paginate(10);
        return view('vuelos.index', compact('vuelos'));
    }

    public function create()
    {
        return view('vuelos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo' => 'required|string|max:10|unique:vuelos,codigo',
            'origen' => 'required|string|max:100',
            'destino' => 'required|string|max:100',
            'fecha_salida' => 'required|date',
            'fecha_llegada' => 'required|date|after:fecha_salida',
            'precio' => 'required|numeric|min:0',
        ]);

        Vuelo::create($data);

        return redirect()->route('vuelos.index')->with('success', 'Vuelo registrado correctamente.');
    }

    public function show(Vuelo $vuelo)
    {
        return view('vuelos.show', compact('vuelo'));
    }

    public function edit(Vuelo $vuelo)
    {
        return view('vuelos.edit', compact('vuelo'));
    }

    public function update(Request $request, Vuelo $vuelo)
    {
        $data = $request->validate([
            'codigo' => 'required|string|max:10|unique:vuelos,codigo,' . $vuelo->id,
            'origen' => 'required|string|max:100',
            'destino' => 'required|string|max:100',
            'fecha_salida' => 'required|date',
            'fecha_llegada' => 'required|date|after:fecha_salida',
            'precio' => 'required|numeric|min:0',
        ]);

        $vuelo->update($data);

        return redirect()->route('vuelos.index')->with('success', 'Vuelo actualizado correctamente.');
    }

    public function destroy(Vuelo $vuelo)
    {
        $vuelo->delete();
        return redirect()->route('vuelos.index')->with('success', 'Vuelo eliminado correctamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use App\Models\Cliente;
use App\Models\Vuelo;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    public function index()
    {
        $reservaciones = Reservacion::with(['cliente', 'vuelo'])->orderBy('fecha_reserva', 'desc')->paginate(10);
        return view('reservaciones.index', compact('reservaciones'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $vuelos = Vuelo::orderBy('fecha_salida')->get();
        return view('reservaciones.create', compact('clientes', 'vuelos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'vuelo_id' => 'required|exists:vuelos,id',
            'fecha_reserva' => 'required|date',
            'asientos' => 'required|integer|min:1',
        ]);

        Reservacion::create($data);

        return redirect()->route('reservaciones.index')->with('success', 'Reservación creada correctamente.');
    }

    public function show(Reservacion $reservacion)
    {
        $reservacion->load(['cliente', 'vuelo']);
        return view('reservaciones.show', compact('reservacion'));
    }

    public function edit(Reservacion $reservacion)
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $vuelos = Vuelo::orderBy('fecha_salida')->get();
        return view('reservaciones.edit', compact('reservacion', 'clientes', 'vuelos'));
    }

    public function update(Request $request, Reservacion $reservacion)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'vuelo_id' => 'required|exists:vuelos,id',
            'fecha_reserva' => 'required|date',
            'asientos' => 'required|integer|min:1',
        ]);

        $reservacion->update($data);

        return redirect()->route('reservaciones.index')->with('success', 'Reservación actualizada correctamente.');
    }

    public function destroy(Reservacion $reservacion)
    {
        $reservacion->delete();
        return redirect()->route('reservaciones.index')->with('success', 'Reservación eliminada correctamente.');
    }
}

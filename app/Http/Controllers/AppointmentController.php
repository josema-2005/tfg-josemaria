<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // 1) Mostrar el formulario para reservar cita
    public function index()
    {
        return view('appointments.create');
    }

    // 2) Guardar la cita enviada
    public function store(Request $request)
    {
        $request->validate([
            'fecha'  => 'required|date|after_or_equal:today',
            'hora'   => 'required',
            'motivo' => 'nullable|string|max:255',
        ]);

        Appointment::create([
            'user_id' => Auth::id(),
            'fecha'   => $request->fecha,
            'hora'    => $request->hora,
            'motivo'  => $request->motivo,
        ]);

        return redirect()->route('appointments.index')
                         ->with('success', 'Cita reservada correctamente.');
    }
}

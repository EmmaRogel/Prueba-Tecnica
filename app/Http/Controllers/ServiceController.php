<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all(); // Obtener todos los servicios
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create'); // Mostrar el formulario de creación
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::id(), // ID del usuario que creó el servicio
        ]);

        return redirect()->route('services.index'); // Redirigir a la lista de servicios
    }
}


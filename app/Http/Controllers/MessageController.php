<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $messages = Message::where('service_id', $serviceId)->with('sender', 'receiver')->get();
        return view('messages.index', compact('service', 'messages'));
    }

    public function store(Request $request, $serviceId)
    {
        $request->validate([
            'message' => 'required|string',
            // Añade validaciones para el archivo si es necesario
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id, // Asegúrate de enviar este ID
            'message' => $request->message,
            // Manejo del archivo adjunto si es necesario
        ]);

        return redirect()->route('messages.index', ['service' => $serviceId]);
    }
}



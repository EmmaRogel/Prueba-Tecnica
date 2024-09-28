<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Redirige a la página de servicios después de iniciar sesión
            return redirect()->route('services.index');
        }
    
        // Si las credenciales no son válidas, vuelve a la página de login con un mensaje de error
        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }
    public function showLoginForm()
{
    return view('auth.login');  // Asegúrate de que la vista 'auth.login' exista
}
}



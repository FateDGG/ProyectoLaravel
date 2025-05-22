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
        // Validar datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // Verificar credenciales
        $user = User::where('email', $request->email)->first();
    
        \Log::info('Intento de inicio de sesión para el correo electrónico: ' . $request->email); // Agrega esto
        if ($user) {
            \Log::info('Usuario encontrado en la base de datos.');  // Agrega esto
            if (Hash::check($request->password, $user->password)) {
                \Log::info('Contraseña verificada.'); // Agrega esto
                Auth::login($user);
                return redirect()->route('index'); // Redirige a la página principal
            } else {
                \Log::warning('Contraseña incorrecta.'); // Agrega esto
            }
        } else {
            \Log::warning('Usuario no encontrado.'); // Agrega esto
        }
    
        return back()->withErrors(['email' => 'Las credenciales son incorrectas.']);
    }
    
    public function register(Request $request)
    {
        // Validar los datos del formulario con los requisitos de contraseña
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',      // Al menos una mayúscula
                'regex:/[a-z]/',      // Al menos una minúscula
                'regex:/[0-9]/',      // Al menos un número
                'regex:/[\W]/',       // Al menos un carácter especial
                'confirmed'
            ],
        ], [
            'password.regex' => 'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);
    
        // Crear el usuario sin autenticarlo
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Redirigir al login
        return redirect()->route('login')->with('success', 'Registro exitoso. Inicia sesión para continuar.');
    }
    
}

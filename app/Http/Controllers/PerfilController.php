<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
    
        // Validación de nombre y correo
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);
    
        // Si el usuario intenta cambiar la contraseña, se validará
        if ($request->filled('password')) {
            $request->validate([
                'password' => [
                    'min:8',
                    'regex:/[A-Z]/',    // Al menos una mayúscula
                    'regex:/[a-z]/',    // Al menos una minúscula
                    'regex:/[0-9]/',    // Al menos un número
                    'regex:/[\W]/',     // Al menos un carácter especial
                    'confirmed',
                ],
            ], [
                'password.regex' => 'La contraseña debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula, un número y un carácter especial.',
            ]);
    
            // Si la contraseña es válida, la encripta y la guarda
            $user->password = Hash::make($request->password);
        }
    
        // Actualiza nombre y correo
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($user->save()) {
            return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'Hubo un problema al actualizar el perfil.');
        }
    }
    
}


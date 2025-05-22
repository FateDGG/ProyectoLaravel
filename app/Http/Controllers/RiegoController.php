<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riego; // Importa tu modelo Riego
use App\Models\Dispositivo; // Importa tu modelo Dispositivo (necesario para validación)
use Carbon\Carbon; // Importa Carbon para manejar marcas de tiempo
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Importa Log para loguear errores

class RiegoController extends Controller
{
    /**
     * Registra un evento de riego para un dispositivo.
     */
    public function recordRiego(Request $request)
    {
        // Valida la solicitud entrante
        // Validamos que dispositivo_id sea requerido y exista en la tabla 'dispositivos' en la columna 'id'
        $validator = Validator::make($request->all(), [
            'dispositivo_id' => 'required|exists:dispositivos,id',
        ], [
            'dispositivo_id.required' => 'El ID del dispositivo es obligatorio.',
            'dispositivo_id.exists' => 'El dispositivo con el ID proporcionado no existe.'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Error de validación', 'errors' => $validator->errors()], 400);
        }

        try {
            $dispositivoId = $request->input('dispositivo_id');

            // Crea un nuevo registro de riego usando tu modelo Riego
            $riego = Riego::create([
                'dispositivo_id' => $dispositivoId,
                'fecha' => Carbon::now(), // Usa Carbon para registrar la hora actual en el campo 'fecha'
            ]);

            // Devuelve respuesta de éxito con la hora registrada
            // Usamos toISOString() para que JavaScript pueda parsearla fácilmente
            return response()->json([
                'success' => true,
                'message' => 'Riego registrado con éxito.',
                'fecha' => $riego->fecha->toISOString()
            ]);

        } catch (\Exception $e) {
            // Loguea el error para depuración
            Log::error('Error recording watering (RiegoController):', [
                'error' => $e->getMessage(),
                'dispositivo_id' => $request->input('dispositivo_id'),
                'trace' => $e->getTraceAsString(),
            ]);

            // Devuelve una respuesta de error
            return response()->json(['success' => false, 'message' => 'Ocurrió un error al registrar el riego.'], 500);
        }
    }

    // Si necesitas, puedes añadir aquí otros métodos para Riegos (ver historial, etc.)
}
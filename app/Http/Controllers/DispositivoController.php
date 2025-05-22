<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo; // Asegúrate de importar tu modelo Dispositivo
use App\Models\Riego; // Aunque no lo usemos directamente aquí, es bueno importarlo para claridad
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth; // Asegúrate de importar Auth
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Asegúrate de importar Log si usas \Log::error

class DispositivoController extends Controller
{
    /**
     * Muestra la vista de los dispositivos del usuario autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Este método solo devuelve la vista, la carga de datos se hace vía AJAX en getDispositivos()
        return view('dispositivos');
    }

    /**
     * Obtiene los dispositivos del usuario autenticado en formato JSON,
     * incluyendo la información del último riego.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDispositivos()
    {
        try {
            // Obtener los dispositivos del usuario autenticado
            // Usar eager loading (with('ultimoRiego')) para cargar la relación del último riego
            $dispositivos = Auth::user()->dispositivos()->with('ultimoRiego')->get();

            // Mapear la colección para añadir la fecha del último riego al array de cada dispositivo
            $dispositivosData = $dispositivos->map(function ($dispositivo) {
                // Convertir el modelo Dispositivo a array
                $data = $dispositivo->toArray();

                // Añadir la fecha del último riego si existe
                // Accedemos a la relación cargada 'ultimoRiego' y luego al campo 'fecha'.
                // Usamos el operador ?. (optional chaining) por si 'ultimoRiego' es null (el dispositivo nunca se ha regado).
                // Si existe $dispositivo->ultimoRiego->fecha, lo asigna; si no, asigna null.
                $data['last_watered_at'] = $dispositivo->ultimoRiego?->fecha;

                return $data;
            });

            // Devolver la colección de dispositivos con la fecha del último riego en formato JSON
            return response()->json(['success' => true, 'dispositivos' => $dispositivosData]);

        } catch (\Exception $e) {
            // Loguear cualquier error que ocurra durante la obtención de datos
            Log::error('Error al obtener dispositivos para el usuario ' . Auth::id() . ': ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error al cargar los dispositivos.'], 500);
        }
    }

    /**
     * Guarda un nuevo dispositivo para el usuario autenticado.
     * (Tu código existente, sin modificaciones)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'id_dispositivo' => 'required|string|max:255|unique:dispositivos',
            'planta_seleccionada' => 'required|string|max:255',
            'nombre_planta' => 'required|string|max:255',
        ];

        $messages = [
            'id_dispositivo.unique' => 'Este ID de dispositivo ya está registrado, intenta con otro.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Error de validación', 'errors' => $validator->errors()], 422);
        }

        try {
            $dispositivo = Auth::user()->dispositivos()->create([
                'id_dispositivo' => $request->id_dispositivo,
                'planta_seleccionada' => $request->planta_seleccionada,
                'nombre_planta' => $request->nombre_planta,
                // Laravel automáticamente asignará user_id si la relación está configurada correctamente
            ]);

            if ($dispositivo) {
                 // Para el frontend, podrías devolver el ID del dispositivo recién creado
                 // return response()->json(['success' => true, 'message' => 'Dispositivo guardado correctamente', 'dispositivo_id' => $dispositivo->id]);
                return response()->json(['success' => true, 'message' => 'Dispositivo guardado correctamente']);
            } else {
                return response()->json(['success' => false, 'message' => 'Error al guardar el dispositivo (problema interno)']);
            }
        } catch (\Exception $e) {
            Log::error('Error al guardar dispositivo: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error al guardar el dispositivo (excepción)', 'error' => $e->getMessage()], 500);
        }
    }

     /**
     * Muestra los detalles de un dispositivo específico.
     * (Tu código existente, sin modificaciones relevantes para esta tarea)
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $dispositivo = Dispositivo::findOrFail($id);
         // Opcional: Asegúrate de que el usuario actual es dueño del dispositivo
         // if (Auth::user()->id !== $dispositivo->user_id) {
         //     abort(403, 'No tienes permiso para ver este dispositivo.');
         // }

        $planta = $dispositivo->planta_seleccionada;

        $vista = '';
        switch ($planta) {
            case 'aloeOpcion':
                $vista = 'aloeOpcion';
                break;
            case 'coleoOpcion':
                $vista = 'coleoOpcion';
                break;
            case 'coronaOpcion':
                $vista = 'coronaOpcion';
                break;
            case 'crotonOpcion':
                $vista = 'crotonOpcion';
                break;
            case 'suegraOpcion':
                $vista = 'suegraOpcion';
                break;
            default:
                // Si la planta seleccionada no tiene una vista definida, redirigir o mostrar error
                return redirect()->route('catalogo')->with('error', 'Vista de detalles no encontrada para esta planta.');
                // O puedes mostrar una vista genérica de error o 404
                // abort(404, 'Vista de detalles no encontrada para esta planta.');
        }

        return view($vista, compact('dispositivo'));
    }

    /**
     * Elimina un dispositivo específico.
     * (Tu código existente, sin modificaciones relevantes para esta tarea)
     *
     * @param  \App\Models\Dispositivo  $dispositivo
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Dispositivo $dispositivo)
    {
        // Verificar que el usuario autenticado sea el dueño del dispositivo
        if (Auth::user()->id !== $dispositivo->user_id) {
            return response()->json(['success' => false, 'message' => 'No estás autorizado para eliminar este dispositivo.'], 403);
        }

        try {
            // Eliminar el dispositivo. Si configuraste onDelete('cascade') en la migración de riegos,
            // los riegos asociados también se eliminarán automáticamente.
            $dispositivo->delete();
            return response()->json(['success' => true, 'message' => 'Dispositivo eliminado correctamente']);
        } catch (\Exception $e) {
            Log::error('Error al eliminar dispositivo: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error al eliminar el dispositivo (excepción)', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Muestra el formulario para crear un nuevo dispositivo (opcional).
     * (Tu código existente, sin modificaciones relevantes para esta tarea)
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dispositivo.create');
    }

    /**
     * Muestra los detalles de un dispositivo (parece un duplicado de 'show').
     * (Tu código existente, sin modificaciones relevantes para esta tarea)
     *
     * @param  string $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function mostrarDetalles(string $id): View
    {
        $dispositivo = Dispositivo::findOrFail($id);
         // Opcional: Asegúrate de que el usuario actual es dueño del dispositivo
         // if (Auth::user()->id !== $dispositivo->user_id) {
         //     abort(403, 'No tienes permiso para ver este dispositivo.');
         // }

        $planta = $dispositivo->planta_seleccionada;

        $vista = '';
        switch ($planta) {
            case 'aloeOpcion':
                $vista = 'aloeOpcion';
                break;
            case 'coleoOpcion':
                $vista = 'coleoOpcion';
                break;
            case 'coronaOpcion':
                $vista = 'coronaOpcion';
                break;
            case 'crotonOpcion':
                $vista = 'crotonOpcion';
                break;
            case 'suegraOpcion':
                $vista = 'suegraOpcion';
                break;
            default:
                 // Usar abort() es más estándar para 404 que redirigir desde un método show/details
                 abort(404, 'Vista de detalles no encontrada para esta planta.');
                 // O podrías redirigir si prefieres
                 // return redirect()->route('catalogo')->with('error', 'Vista de detalles no encontrada para esta planta.');
        }

        return view($vista, compact('dispositivo'));
    }
}
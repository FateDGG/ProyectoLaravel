<?php

namespace App\Http\Controllers;
use App\Models\lectura;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class LecturaController extends Controller
{
    //
public function promedios($id)
{
    // 1) Si tu ruta recibe el id de dispositivo (tabla dispositivos),
    //    primero carga el sensor asociado:
    $disp = Dispositivo::findOrFail($id);
    $sensorId = $disp->id_dispositivo;

    // 2) Trae las últimas 500 lecturas de ese sensor:
    $lecturas = lectura::where('idsensor', $sensorId)
        ->orderByDesc('fecha')
        ->take(200)
        ->get();

    if ($lecturas->isEmpty()) {
        return response()->json([
            'message' => 'No se encontraron lecturas para este sensor.'
        ], 404);
    }

    // 3) Calcula los promedios:
    $promedios = [
        'temperatura' => round($lecturas->avg('temperatura'), 2),
        'humedad'     => round($lecturas->avg('humedad'), 2),
        'luminosidad'=> round($lecturas->avg('luminosidad'), 2),
        'phsuelo'     => round($lecturas->avg('phsuelo'), 2),
        'ultima_fecha' => $lecturas->first()->fecha,
        'ultima_temperatura' => $lecturas->first()->temperatura,
        'ultima_humedad' => $lecturas->first()->humedad,
        'ultima_luminosidad' => $lecturas->first()->luminosidad,
        'ultima_phsuelo' => $lecturas->first()->phsuelo,
    ];

    // 4) La última lectura:
    $ultima = $lecturas->first();

    // 5) Devuelves TODO en el root:
    return response()->json(array_merge(
        $promedios,
        [
          'ultima_lectura' => [
            'fecha'       => $ultima->fecha,
            'temperatura' => $ultima->temperatura,
            'humedad'     => $ultima->humedad,
            'luminosidad' => $ultima->luminosidad,
            'phsuelo'     => $ultima->phsuelo,
          ],
        ]
    ));
}


}

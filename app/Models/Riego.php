<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Riego extends Model
{
    use HasFactory;

    // Nombre de la tabla si no sigue la convención plural del modelo
    // protected $table = 'riegos';

    protected $fillable = [
        'dispositivo_id',
        'fecha', // Campo para la fecha y hora del riego
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'datetime', // Esto asegura que 'fecha' siempre sea un objeto Carbon
    ];

    /**
     * Define la relación BelongsTo con Dispositivo.
     * Asume que hay una columna 'dispositivo_id' en la tabla 'riegos'
     * que referencia la clave primaria 'id' en la tabla 'dispositivos'.
     */
    public function dispositivo(): BelongsTo
    {
        return $this->belongsTo(Dispositivo::class, 'dispositivo_id');
    }
}
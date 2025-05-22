<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne; // Importar HasOne

class Dispositivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dispositivo',
        'nombre_planta',
        'planta_seleccionada',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // Define la relación uno a muchos con Riego
    public function riegos(): HasMany
    {
        // Asegúrate de que 'dispositivo_id' es el nombre de la columna de clave foránea en la tabla 'riegos'
        return $this->hasMany(Riego::class, 'dispositivo_id');
    }

    /**
     * Define una relación uno a uno para obtener el ÚLTIMO riego registrado para este dispositivo.
     */
    public function ultimoRiego(): HasOne
    {
        // Obtiene el registro más reciente de la relación 'riegos' basado en el campo 'fecha'
        return $this->hasOne(Riego::class, 'dispositivo_id')->latestOfMany('fecha');
    }
}
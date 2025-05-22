<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lectura extends Model
{
    //
    protected $table = 'lecturas'; // Asegúrate de que este es el nombre real de tu tabla

    public $timestamps = false; // Si tu tabla no tiene columnas created_at / updated_at

    protected $fillable = [
        'id',
        'fecha',
        'idsensor',
        'phsuelo',
        'temperatura',
        'humedad',
        'luminosidad',
    ];
}

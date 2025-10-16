<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo',
        'origen',
        'destino',
        'fecha_salida',
        'fecha_llegada',
        'precio',
        'asientos_disponibles', // <--- Añadido
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_salida' => 'datetime',  // <--- Añadido
        'fecha_llegada' => 'datetime', // <--- Añadido
    ];
}
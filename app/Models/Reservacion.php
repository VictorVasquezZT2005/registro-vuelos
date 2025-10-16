<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $table = 'reservaciones';

    protected $fillable = [
        'cliente_id',
        'vuelo_id',
        'fecha_reserva',
        'asientos',
        'numeros_asiento', // <--- Añadido
        'metodo_pago',     // <--- Añadido
        'paypal_email',    // <--- Añadido
    ];

    // Convertimos fecha_reserva a Carbon automáticamente
    protected $casts = [
        'fecha_reserva' => 'datetime',
        'numeros_asiento' => 'array', // <--- Añadido
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function vuelo()
    {
        return $this->belongsTo(Vuelo::class);
    }
}
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
    ];

    // Convertimos fecha_reserva a Carbon automáticamente
    protected $casts = [
        'fecha_reserva' => 'datetime',
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

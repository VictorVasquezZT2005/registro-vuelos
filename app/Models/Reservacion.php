<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $table = 'reservaciones'; // <--- Asegúrate que coincide con tu tabla en MySQL

    protected $fillable = [
        'cliente_id',
        'vuelo_id',
        'fecha_reserva',
        'asientos',
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

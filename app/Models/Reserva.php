<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas'; // Nombre de la tabla
    protected $fillable = ['user_id', 'cancha_id', 'hora']; // Campos permitidos
}

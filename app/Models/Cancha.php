<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancha extends Model
{
    use HasFactory;

    protected $table = 'canchas'; // Nombre de la tabla
    protected $fillable = ['nombre']; // Campos permitidos para guardado masivo
}

<?php
// app/Http/Controllers/ReservaController.php
namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    // Método para verificar disponibilidad
    public function verificarDisponibilidad(Request $request)
    {
        $hora = $request->input('hora');
        $canchaId = $request->input('cancha_id');

        $existeReserva = Reserva::where('cancha_id', $canchaId)
            ->where('hora', $hora)
            ->exists();

        if ($existeReserva) {
            return response()->json(['mensaje' => 'La hora ya está reservada.'], 409);
        }

        return response()->json(['mensaje' => 'La hora está disponible.'], 200);
    }

    // Método para reservar
    public function reservar(Request $request)
    {
        $hora = $request->input('hora');
        $canchaId = $request->input('cancha_id');

        $existeReserva = Reserva::where('cancha_id', $canchaId)
            ->where('hora', $hora)
            ->exists();

        if ($existeReserva) {
            return response()->json(['mensaje' => 'No se puede reservar. La hora ya está ocupada.'], 409);
        }

        // Crear una nueva reserva
        Reserva::create([
            'user_id' => Auth::id(), // Usar el ID del usuario autenticado
            'cancha_id' => $canchaId,
            'hora' => $hora,
        ]);

        return response()->json(['mensaje' => 'Reserva exitosa.'], 200);
    }

    // Método para cancelar la reserva
    public function cancelarReserva(Request $request)
    {
        $hora = $request->input('hora');
        $canchaId = $request->input('cancha_id');

        $reserva = Reserva::where('cancha_id', $canchaId)
            ->where('hora', $hora)
            ->where('user_id', Auth::id()) // Solo el usuario que hizo la reserva puede cancelarla
            ->first();

        if (!$reserva) {
            return response()->json(['mensaje' => 'No se encontró la reserva para cancelar.'], 404);
        }

        $reserva->delete();
        return response()->json(['mensaje' => 'Reserva cancelada.'], 200);
    }
}

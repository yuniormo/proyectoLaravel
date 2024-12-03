<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancha;

class CanchaController extends Controller
{
    public function storeCancha(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        $cancha = Cancha::create($request->all());
    
        return response()->json(['message' => 'Cancha guardada', 'data' => $cancha], 201);
    }
    
}

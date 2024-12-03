<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home');
    }
    public function show()
{
    // Lógica de la página de usuario autenticado
    return view('cursos.show');
}
public function index()
{
    // Puedes retornar una vista, por ejemplo, 'welcome', o la vista de inicio que desees.
    return view('home'); // Asegúrate de que 'welcome' sea una vista existente en resources/views
}

}

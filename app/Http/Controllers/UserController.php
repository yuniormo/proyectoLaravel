<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Muestra la lista de cursos.
     */
    public function index()
    {
        // Aquí puedes obtener los datos de los cursos desde la base de datos.
        $cursos = [
            ['id' => 1, 'nombre' => 'Curso Laravel'],
            ['id' => 2, 'nombre' => 'Curso PHP Básico'],
            ['id' => 3, 'nombre' => 'Curso de Vue.js'],
        ];

        // Devuelve una vista con la lista de cursos.
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Muestra el formulario para crear un nuevo curso.
     */
    public function create()
    {
        // Devuelve una vista con el formulario para crear un curso.
        return view('cursos.create');
    }

    /**
     * Muestra un curso específico por su ID.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        // Simula la búsqueda de un curso en la base de datos.
        $curso = [
            'id' => $id,
            'nombre' => 'Curso Laravel Avanzado',
            'descripcion' => 'Aprende a manejar Laravel a un nivel avanzado.',
        ];

        // Devuelve una vista con los detalles del curso.
        return view('cursos.show', compact('curso'));
    }
}

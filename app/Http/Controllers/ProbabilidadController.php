<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProbabilidadController extends Controller
{
    public function index(Request $request)
    {
        // Acceder al ID del animal seleccionado
        $animal_id = $request->input('animal_id');

        // Acceder a los demás datos del formulario
        $p1 = $request->input('p1');
        if ($p1 == 'noe' || $p1== 'no'){
            $p1 = 0;
        }else{
            $p1 = 10;
        }


        $p2 = $request->input('p2');
        // Y así sucesivamente para todas las preguntas

        // Hacer lo que necesites con los datos

        // Redirigir o devolver una respuesta
        return $p1;
    }
}

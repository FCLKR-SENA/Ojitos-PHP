<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProbabilidadController extends Controller
{
    public function index(Request $request)
    {

        $Pt=0;
        // Acceder al ID del animal seleccionado
        $animal_id = $request->input('animal_id');
        $animal = Animal::find($animal_id); //Busco por id

        // Acceder a los demás datos del formulario
        $p1 = $request->input('p1');
        if ($p1 == 'noe' || $p1== 'no'){
            $p1 = 0;
        }else{
            $p1 = 100;
        }


        $p2 = $request->input('p2');
        if ($p2 == 'noe' || $p2== 'no'){
            $p2 = 0;
        }else{
            $p2 = 100;
        }

        $p3 = $request->input('p3');
        $p3 = $request->input('p3');
        if ($p3 == 'noe' || $p3== 'no'){
            $p3 = 0;
        }else{
            $p3 = 100;
        }

        $p4 = $request->input('p4');
        if ($p4 == 'noe' || $p4== 'no'){
            $p4 = 0;
        }else{
            $p4 = 100;
        }

        $p5 = $request->input('p5');
        if ($p5 == 'noe' || $p5== 'no'){
            $p5 = 0;
        }else{
            $p5 = 100;
        }

        $p6 = $request->input('p6');
        if ($p6 == 'noe' || $p6== 'no'){
            $p6 = 0;
        }else{
            $p6 = 100;
        }

        $p7 = $request->input('p7');
        if ($p7 == 'noe' || $p7== 'no'){
            $p7 = 0;
        }else{
            $p7 = 100;
        }

        $p8 = $request->input('p8');
        if ($p8 == 'noe' || $p8== 'no'){
            $p8 = 0;
        }else{
            $p8 = 100;
        }

        $p9 = $request->input('p9');
        if ($p9 == 'noe' || $p9== 'no'){
            $p9 = 0;
        }else{
            $p9 = 100;
        }

        $p10 = $request->input('p10');
        if ($p10 == 'noe' || $p10== 'no'){
            $p10 = 0;
        }else{
            $p10 = 100;
        }

        $Pt=($p1+$p2+$p3+$p4+$p5+$p6+$p7+$p8+$p9+$p10)/10;

        $result = [
            'animal_age' => $animal->age,
            'animal_name' => $animal->nombreAnimaladopocion,
            'img' => $animal->img,
            'status'=> "En proceso",
            'total_score' => $Pt
            // Otros datos que quieras devolver
        ];
        Adoption::create([
            //La introduce el admin al momento de aceptar la peticion 'fecha_adopcion' =>  'animal_age',
            'animal_adopcioncol' => $animal_id,
            'usuarios_id_usuario'=> Auth::user()->id,
            'img' => $animal->img,
            //Inserccion automaticamente 'created_at',
            // Inserccion automatica 'updated_at',
            'probablidad' => $Pt,
            'adoption_status' =>"En proceso",
            //'user_id' => auth()->id() ,//Trae el ID de quien se esta logueando COD2
        ]);

        return  to_route('AdopcionUser.index')->with('status','Se ha enviado tu solicitud de adopcion');
    }

}

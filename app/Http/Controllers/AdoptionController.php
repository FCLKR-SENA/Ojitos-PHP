<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Animal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdoptionController extends Controller
{

    public function index()
    {
        $adopciones = Adoption::with('animals', 'users')->get();


        return view('AdopcionAdmin.solicitudesAdoption', compact('adopciones'));
    }

    public function rechazar(Request $request, Animal $animal)
    {
        //Obtener Id del formulario
        $adoptionID = $request->input('animal_id');

        // Aquí obtienes la información del animal según su ID
        $adoption = Adoption::find($adoptionID);
        $idAnimal_find=$adoption->animals;
        $idAnimal = $idAnimal_find->id;
        //FIN INFORMACION DEL ANIMAL SEGUN ID

        //*******ENCONTRAR CORREO DEL USUARIO***********

        // Obtener los datos del usuario relacionado con la adopción
        $usuario = $adoption->users;

        // Obtener el correo electrónico del usuario
        $email = $usuario->email;
        //*****FIN ENCONTRAR CORREO DEL USUARIO**********

        //****ENVIO DE CORREO******
        Mail::to($email)->send(new InformacionAdopcionMail($adoption));
        //**********FIN DE CORREO**************+

        //****ACTUALIZAR ESTADO EN TABLA ADOPCION****
        DB::statement('CALL rechazarAdopcion(?)',[$idAnimal]);
        //*** FIN ACTUALIZACION DE TABLA**************

        //****ACTUALIZAR ESTADO EN TABLA ANIMALES EN ADOPCION****
        $status="Disponible";
        DB::statement('CALL updateStatusAnimalList(?,?)',[$idAnimal,$status]);
        //*** FIN ACTUALIZACION DE TABLA**************



        return  to_route('AdopcionAdmin.solicitudesAdoption')->with('status','¡Se ha rechazado el proceso de adopcion!');

    }

    public function aprobarAdopcion(Request $request, Animal $animal)

    {

        //Obtener Id del formulario
        $adoptionID = $request->input('animal_id');

        // Aquí obtienes la información del animal según su ID
        $adoption = Adoption::find($adoptionID);
        $idAnimal_find=$adoption->animals;
        $idAnimal = $idAnimal_find->id;
        //FIN INFORMACION DEL ANIMAL SEGUN ID

        //ACTUALIZA TABLA ADOPCION SEGUN ESTADO VACUNACION
        //Buscar si hay vacunas pendientes
        $sinAplicar=DB::select('CALL SearchP_Vacunas(?)',[$idAnimal]);
        if(empty($sinAplicar)){
            $status = 'P. Entrega';
        }else{
            $status = 'P. Vacuna';
        }
        //Fin busqueda de vacunas pendientes

        DB::statement('CALL AprobacionAdoptar(?,?)',[$adoptionID,$status]);
        //FIN ACTUALIZA TABLA ADOPCION SEGUN ESTADO VACUNACION

        //*******ENCONTRAR CORREO DEL USUARIO***********

        // Obtener los datos del usuario relacionado con la adopción
        $usuario = $adoption->users;

        // Obtener el correo electrónico del usuario
        $email = $usuario->email;
        //*****FIN ENCONTRAR CORREO DEL USUARIO**********

        //****ENVIO DE CORREO******

        //**********FIN DE CORREO**************+

        //****ACTUALIZAR ESTADO EN TABLA ANIMALES EN ADOPCION****
        DB::statement('CALL estadosolicitudAnimales(?)',[$idAnimal]);
        //*** FIN ACTUALIZACION DE TABLA**************



        return $idAnimal;

    }

    public function concluirAdopcion(Request $request, Animal $animal){
        //Obtener Id del formulario
        $adoptionID = $request->input('animal_id');

        // Aquí obtienes la información del animal según su ID
        $adoption = Adoption::find($adoptionID);
        $idAnimal_find=$adoption->animals;
        $idAnimal = $idAnimal_find->id;
        //FIN INFORMACION DEL ANIMAL SEGUN ID

        //Capturar fecha actual
        $dateNow=Carbon::now();
        $formattedDate = $dateNow->format('Y-m-d');
        $year = $dateNow->year;
        $month = $dateNow->month;
        $day = $dateNow->day;
        $dateNow = date('Y-m-d');
        //Fin capturar fecha

        //ACTUALIZA TABLA ADOPCION SEGUN ESTADO VACUNACION
        $status="Adoptado";
        DB::statement('CALL concluirAdopcion(?,?,?)',[$adoptionID,$status,$dateNow]);
        //FIN ACTUALIZA TABLA ADOPCION SEGUN ESTADO VACUNACION

        return  to_route('AdopcionAdmin.solicitudesAdoption')->with('status','¡Se ha terminado el proceso de adopcion!');
    }
}

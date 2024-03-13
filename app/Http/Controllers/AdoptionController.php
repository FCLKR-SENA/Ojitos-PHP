<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Animal;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class AdoptionController extends Controller
{

    public function index()
    {
        $adopciones = Adoption::with('animals', 'users')->get();


        return view('AdopcionAdmin.solicitudesAdoption', compact('adopciones'));
    }

    public function indexMisSolicitudes(Request $request)
    {

        $idUsuario = Auth::user()->id;
        $misSolicitudes= Adoption::with('animals', 'users')
            ->where('usuarios_id_usuario',$idUsuario)
            ->get();


        return view('AdopcionUser.misSolicitudes', compact('misSolicitudes'));
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
        if($adoption->adoption_status!='En proceso' ){
            $correo = new InformacionAdopcionMail(
                $adoption,
                'Proceso de solicitud cancelado',
                'emails.cancelacion-adoption'
            );
        }else {
            $correo = new InformacionAdopcionMail(
                $adoption,
                'Solicitud Rechazada',
                'emails.rechazo-adoption'
            );
        }

        Mail::to($email)->send($correo);

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
        $url=URL::signedRoute('AdopcionUser.misSolicitudes');

        $correo = new linkAdopcionMail(
            $adoption,
            $url,
            'Solicitud Aprobada',
            'emails.aprobacion-adoption'
        );

        Mail::to($email)->send($correo);
        //**********FIN DE CORREO**************+

        //****ACTUALIZAR ESTADO EN TABLA ANIMALES EN ADOPCION****
        DB::statement('CALL estadosolicitudAnimales(?)',[$idAnimal]);
        //*** FIN ACTUALIZACION DE TABLA**************

        return  to_route('AdopcionAdmin.solicitudesAdoption')->with('status','¡Se ha notificado al usuario la aprobacion!');

    }

    public function concluirAdopcion(Request $request, Animal $animal){
        //Obtener Id del formulario
        $adoptionID = $request->input('animal_id');

        // Aquí obtienes la información del animal según su ID
        $adoption = Adoption::findorFail($adoptionID);
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

        //*******ENCONTRAR CORREO DEL USUARIO***********

        // Obtener los datos del usuario relacionado con la adopción
        $usuario = $adoption->users;

        // Obtener el correo electrónico del usuario
        $email = $usuario->email;
        //*****FIN ENCONTRAR CORREO DEL USUARIO**********



        //ACTUALIZA TABLA ADOPCION SEGUN ESTADO VACUNACION
        $status="Adoptado";
        DB::statement('CALL concluirAdopcion(?,?,?)',[$adoptionID,$status,$dateNow]);
        //FIN ACTUALIZA TABLA ADOPCION SEGUN ESTADO VACUNACION

        //***RECOLECCION DE DATOS DE USUARIO PARA CERTIFICADO
        $data=[
          'userName' => $adoption->users->name,
          'apellido_adoptante' =>$adoption->users->lastname,
          'fecha_adopcion'=>$adoption->fecha_adopcion,
          'raza'=>$adoption->animals->raza,
          'especie'=>$adoption->animals->especie_Animal ,
          'edad'=>$adoption->animals->age,
            'nombre_animal'=>$adoption->animals->nombreAnimaladopocion,
          'logo_path' => public_path('images\Logo.png')
        ];


        // Creación del documento PDF utilizando la fachada PDF
        $pdf = PDF::loadView('emails.certificado-adoption', $data)
            ->setPaper('letter', 'portrait');
        // Obtener el contenido del PDF como una cadena
        $output = $pdf->output();
        /*Creacion de parametros para el documento.
        $html=view('emails.certificado-adoption',$data)->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $output = $dompdf->output();
        Fin creacion de parametros*/

        // Guardar el certificado en un archivo temporal
        $filename = 'certificado_adopcion_' . $adoption->id_animaladopcion . '.pdf';
        Storage::put('public/' . $filename, $output);
        //Fin de guardar

        $pdfPath = Storage::path('public/' . $filename);

        //***FIN DE LA RECOLECCION

        Mail::to($email)->send(new CertificadoAdopcion($adoption, $pdfPath));

        // Eliminar el archivo temporal del certificado
        unlink($pdfPath);


        return  to_route('AdopcionAdmin.solicitudesAdoption')->with('status','¡Se ha terminado el proceso de adopcion!');
    }

    public function descargarDocumento($clienteId)
    {
        $userDocument = Adoption::findOrFail($clienteId);
        $rutaDocumento = $userDocument->file;

        $rutaCompleta = public_path( $rutaDocumento);

        if (file_exists($rutaCompleta)) {
            return response()->download($rutaCompleta);
        }
        abort(404);
    }



}

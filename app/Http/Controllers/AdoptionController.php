<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Animal;
use App\Models\Factura;
use App\Models\User;
use App\Models\Vacuna;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Mockery\Exception;

class AdoptionController extends Controller
{

    public function index()
    {
        $adopciones = Adoption::with('animals', 'users')->get();


        return view('AdopcionAdmin.solicitudesAdoption', compact('adopciones'));
    }


    public function mostrarVacunasModal($animalId)
    {
        $vacunas = DB::select('CALL encontrar_vacunas_modal(?)', [$animalId]);
        return $vacunas;
    }

    public function mostrarVacunasModalxPrecio($animalId)
    {
        $vacunasPrice = DB::select('CALL Search_VN_Sin_Aplicar(?)', [$animalId]);
        return $vacunasPrice;
    }

    public function indexMisSolicitudes()
    {

        $todasLasVacunas = Vacuna::all();
        $idUsuario = Auth::user()->id;
        $misSolicitudes= Adoption::with('animals', 'users')
            ->where('usuarios_id_usuario',$idUsuario)
            ->get();
        $animales = Animal::with('user')
            ->where('estadoSolicitud', 'Solicitado')
            ->orWhere('estadoSolicitud', 'Disponible')
            ->oldest()->get();

        foreach ($misSolicitudes as $misSolicitud) {
            $misSolicitud->vacunasModal = $this->mostrarVacunasModal($misSolicitud->animals->id);
            $misSolicitud->vacunasPriceModal = $this->mostrarVacunasModalxPrecio($misSolicitud->animals->id);
        }


        return view('AdopcionUser.misSolicitudes', [
            'animals' => $animales,
            'todasLasVacunas' => $todasLasVacunas,
            'misSolicitudes' =>$misSolicitudes
        ]);

        //return view('AdopcionUser.misSolicitudes', compact('misSolicitudes'));
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
        $status ="Solicitado";
        DB::statement('CALL estadosolicitudAnimales(?,?)',[$idAnimal,$status]);
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
        DB::statement('CALL concluirAdopcion(?,?,?)',[$dateNow,$adoptionID,$status]);
        //FIN ACTUALIZA TABLA ADOPCION SEGUN ESTADO VACUNACION

        //****ACTUALIZAR ESTADO EN TABLA ANIMALES EN ADOPCION****
        $status ="Adoptado";
        DB::statement('CALL estadosolicitudAnimales(?,?)',[$idAnimal,$status]);
        //*** FIN ACTUALIZACION DE TABLA**************

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

    public function comprarVacuna(Request $request){

        $user = Auth::user();
        $email = $user->email;

        $idAnimal = $request->input('idAnimal');
        $idUser = $request->input('idUser');
        $iva = $request->input('iva');
        $subTotal = $request->input('subTotal');
        $total = $request->input('total');
        $metodoPago = $request->input('metodoPago');
        $idAdoption = $request->input('idAdoption');



        //ACTUALIZA TABLA FACTURA SEGUN ESTADO VACUNACION
        DB::statement('CALL comprarVacuna(?, ?, ?, ?, ?,?)', [
            $iva,
            $subTotal,
            $total,
            $idUser,
            $metodoPago,
            $idAnimal]);
        //FIN ACTUALIZA TABLA ADOPCION SEGUN ESTADO VACUNACION


        //***CONSULTAS POR ID ESPECIFICOS*********
        $adoption= Adoption::with('animals', 'users')
            ->where('usuarios_id_usuario',$idUser)
            ->get();
            $factura = Factura::with('users')
                ->where([
                    'usuarios_id_usuario' => $idUser,
                    'idAnimal' => $idAnimal
                ])
                ->orderByDesc('idfactura')
                ->first();
        //*** FIN CONSULTAS POR ID ESPECIFICOS*********

        foreach ($adoption as $adop) {
            $adop->vacunasPriceModal = $this->mostrarVacunasModalxPrecio($adop->animals->id);
        }
// Convertir el array vacunasPriceModal en una colección de Eloquent
        $vacunasPriceModal = collect($adop->vacunasPriceModal);

// Obtener el nombre y precio de la vacuna de la colección
        $nombreVacuna = $vacunasPriceModal->pluck('nombre')->all();
        $precioVacuna = $vacunasPriceModal->pluck('price')->all();

        //***RECOLECCION DE DATOS DE USUARIO PARA CERTIFICADO
        $data=[
            'userName' => $adop->users->name,
            'apellido_adoptante' =>$adop->users->lastname,
            'fecha_solicitud'=>$adop->created_at,
            'raza'=>$adop->animals->raza,
            'especie'=>$adop->animals->especie_Animal ,
            'edad'=>$adop->animals->age,
            'nombre_animal'=>$adop->animals->nombreAnimaladopocion,
            'logo_path' => public_path('images\Logo.png'),
            'nombreVacuna'=>$nombreVacuna,
            'precioVacuna'=> $precioVacuna,
            'numeroFactura' => $factura->idfactura,
            'dateFactura' => $factura->fecha_factura,
            'subtotal' =>$subTotal,
            'IVA' =>$iva,
            'total' =>$total,
            'medioPago' =>$metodoPago
        ];


        // Creación del documento PDF utilizando la fachada PDF
        $pdf = PDF::loadView('emails.facturaAdjunta-vacuna', $data)
            ->setPaper('letter', 'portrait');
        // Obtener el contenido del PDF como una cadena
        $output = $pdf->output();

        // Guardar el certificado en un archivo temporal
        $filename = 'facturaAdjunta-vacuna_' . $factura->idfactura . '.pdf';
        Storage::put('public/' . $filename, $output);
        //Fin de guardar

        $pdfPath = Storage::path('public/' . $filename);

        //***ENVIO DE CORREO CON FACTURA****
        Mail::to($email)->send(new FacturaVacuna($factura, $adop, $pdfPath));

        // Eliminar el archivo temporal del certificado
        unlink($pdfPath);
        //****FIN ENVIO DE CORREO CON ADJUNTO**

        //ACTUALIZA TABLA FACTURA SEGUN ESTADO VACUNACION
        DB::statement('CALL updateTablesForCompra(?)', [
            $idAnimal]);
        //FIN ACTUALIZA TABLA ADOPCION SEGUN ESTADO VACUNACION



        return to_route('AdopcionUser.misSolicitudes')->with('status', '¡Tu pago se ha realizado con exito!');


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EnviarCorreoController extends Controller
{
    public function enviarCorreo(Request $request)
    {
        // Aquí obtienes los datos del formulario
        $animalId = $request->animal_id;

        // Aquí obtienes la información del animal según su ID
        $animal = Animal::find($animalId);

        // Obtener el correo del usuario autenticado
        $correoUsuario = Auth::user()->email;

        // Aquí envías el correo electrónico con la información del animal
        Mail::to($correoUsuario)->send(new InformacionAnimalMail($animal));

        // Puedes redirigir a una página de éxito o cualquier otra página después de enviar el correo
        //return redirect()->back()->with('success', 'Correo enviado correctamente');
        return to_route('AdopcionUser.index')
            ->with('status',__('¡Enviamos informacion a tu correo!'));
    }

    public function mostrarInformacionAnimal($id)
    {
        $animal = Animal::findOrFail($id);
        return view('informacion-animal', compact('animal'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AnimalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //$animals = Animal::with('user')->orderBy('created_at', 'desc')->get();
        return view ('AdopcionAdmin.index',[
            'animals'=> Animal::with('user')->latest()->get()
           // 'animals'=> Animal::all() Original
        ]); //Comunicacion con "route" en Web"
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkboxOptions = [
            ['value' => 'opcion1', 'label' => 'Opción 1'],
            ['value' => 'opcion2', 'label' => 'Opción 2'],
            ['value' => 'opcion3', 'label' => 'Opción 3'],
        ];

        // Pasar las opciones a la vista
        return view('index', ['checkboxOptions' => $checkboxOptions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fechaEncuentro' => ['required'],
            'especie_Animal' => 'required',
            'nombreAnimaladopocion' => 'required',
            'raza' => 'required',
            'observacionesAnimal' => ['required','min:10' , 'max:255'],
            'img'
        ]);
        // Procesar la imagen
        $rutaImagen = null;
        if ($request->hasFile('img')) {
            $imagen = $request->file('img');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $rutaImagen = $imagen->storeAs('public/images', $nombreImagen);
            $rutaImagen = str_replace('public', 'storage', $rutaImagen);
        }
        //***********CREAR REGISTRO COD1*******//
        /* auth()->user()->adopcion()->create([
             'fechaEncuentro' =>$request->get ('fechaEncuentro'),
             'especie_Animal' =>$request->get  ('especie_Animal'),
             'nombreAnimaladopocion' =>$request->get  ('nombreAnimaladopocion'),
             'raza' =>$request->get  ('raza'),
             'observacionesAnimal' =>$request->get ('observacionesAnimal'),
         ]);*/
        Animal::create([
            'fechaEncuentro' =>$request->get ('fechaEncuentro'),
            'especie_Animal' =>$request->get  ('especie_Animal'),
            'nombreAnimaladopocion' =>$request->get  ('nombreAnimaladopocion'),
            'raza' =>$request->get  ('raza'),
            'observacionesAnimal' =>$request->get ('observacionesAnimal'),
            'img' => $rutaImagen
            //'user_id' => auth()->id() ,//Trae el ID de quien se esta logueando COD2
        ]);
        //session()->flash('status','Animal ingresado correctamente'); Otra forma de generar mensajes
        return  to_route('AdopcionAdmin.index')->with('status','Animal ingresado correctamente'); //Debe redireccionar a la lista de animales registrados

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        $user = User::with('posts')->find($animal);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        return view('AdopcionAdmin.editar',[
            'animal' => $animal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)

    {
        $rutaImagen = null;
        if ($request->hasFile('img')) {
            $imagen = $request->file('img');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $rutaImagen = $imagen->storeAs('public/images', $nombreImagen);
            $rutaImagen = str_replace('public', 'storage', $rutaImagen);
            $animal->img = $rutaImagen;
        }


        $validated = $request->validate([
            'fechaEncuentro' => ['required'],
            'especie_Animal' => 'required',
            'nombreAnimaladopocion' => 'required',
            'raza' => 'required',
            'observacionesAnimal' => ['required','min:10' , 'max:255']
        ]);

        $animal->update($validated);

        return to_route('AdopcionAdmin.index')
            ->with('status',__('¡Registro Actualizado!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        //$this->authorize('delete',$animal) --> Validacion de id logueado con el creado del registro

        $animal->delete();
        return  to_route('AdopcionAdmin.index')
            ->with('status',__('Registro eliminado.'));
    }
}

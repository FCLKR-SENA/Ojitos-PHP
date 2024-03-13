<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Animal_vacuna;
use App\Models\User;
use App\Models\Vacuna;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AnimalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showImage($id)
    {
        $animal = Animal::findOrFail($id);
        return response()->file(storage_path('app/' . $animal->img));
    }

    public function index()
    {
        $todasLasVacunas = Vacuna::all();
        $animales = Animal::with('user',)
            ->where('estadoSolicitud', 'Solicitado')
            ->orWhere('estadoSolicitud', 'Disponible')
            ->latest()
            ->get();

        return view('AdopcionAdmin.index', [
            'animals' => $animales,
            'todasLasVacunas' => $todasLasVacunas
        ]);
    }

    public function mostrarVacunasModal($animalId)
    {
        $vacunas = DB::select('CALL encontrar_vacunas_modal(?)', [$animalId]);
        return $vacunas;
    }

    public function indexUser()
    {
        $todasLasVacunas = Vacuna::all();
        $animales = Animal::with('user')
            ->where('estadoSolicitud', 'Solicitado')
            ->orWhere('estadoSolicitud', 'Disponible')
            ->oldest()->get();

        foreach ($animales as $animal) {
            $animal->vacunasModal = $this->mostrarVacunasModal($animal->id);
        }

        //$animals = Animal::with('user')->orderBy('created_at', 'desc')->get();
        return view('AdopcionUser.index', [
            'animals' => $animales,
            'todasLasVacunas' => $todasLasVacunas
        ]);
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
            'age'=>'required',
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
        $animales = Animal::create([
            'fechaEncuentro' =>$request->get ('fechaEncuentro'),
            'especie_Animal' =>$request->get  ('especie_Animal'),
            'nombreAnimaladopocion' =>$request->get  ('nombreAnimaladopocion'),
            'raza' =>$request->get  ('raza'),
            'age'=>$request->get('age'),
            'observacionesAnimal' =>$request->get ('observacionesAnimal'),
            'img' => $rutaImagen

            //'user_id' => auth()->id() ,//Trae el ID de quien se esta logueando COD2
        ]);
        $idAnimal= $animales->id;
        $especie = $request->get('especie_Animal');
        $todasLasVacunas= Vacuna::whereIn('especie', [$especie])->pluck('id');

        // Obtener las vacunas seleccionadas
        $vacunasSeleccionadas = $request->input('vacunas', []);

        // Insertar todas las vacunas del checkbox
        foreach ($todasLasVacunas as $vacunaId) {
            $aplicada = in_array($vacunaId, $vacunasSeleccionadas) ? 'Aplicada' : 'Sin_Aplicar';

            DB::statement('CALL InsertarVacuna(?, ?, ?)', [
                $idAnimal,
                $vacunaId,
                $aplicada
            ]);
        }
        //session()->flash('status','Animal ingresado correctamente'); //Otra forma de generar mensajes
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
            'age' =>'required',
            'observacionesAnimal' => ['required','min:10']
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
    public function destroy( Animal_vacuna $animal_vacuna,Animal $animal,)
    {
        //$this->authorize('delete',$animal) --> Validacion de id logueado con el creado del registro
        $animal->delete();
        return  to_route('AdopcionAdmin.index')
            ->with('status',__('Registro eliminado.'));
    }
}

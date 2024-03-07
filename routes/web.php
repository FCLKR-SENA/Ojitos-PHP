<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('index');
});

//************************PUBLICOS*************************************+
Route::get('/adopta', [\App\Http\Controllers\AnimalController::class, 'indexUser'])
    ->name('AdopcionUser.index');


//**************************ENTRADA DIRECTA ADMIN***********************
Route::get('/dashboardAdmin', function () {
    return view('dashboardAdmin');
})->middleware(['auth', 'verified','roles:ADMIN'])->name('dashboardAdmin');
//*************************************************************************

//**************************ENTRADA DIRECTA AUSER***********************
Route::get('/dashboardUser', function () {
    return view('dashboardUser');
})->middleware(['auth', 'verified','roles:USER'])->name('dashboardUser');
//*************************************************************************

//**************************ENTRADA DIRECTA ADMIN***********************
Route::get('/dashboardAdmin', function () {
    return view('dashboardAdmin');
})->middleware(['auth', 'verified','roles:ADMIN'])->name('dashboardAdmin');
//************************************************************

//*****************ELECCION POR ROLES*************************
//----------------------ADMINISTRADOR-------------------------

Route::middleware(['auth', 'verified', 'roles:ADMIN'])->group(function () {

    Route::get('/productos', [\App\Http\Controllers\ProductController::class, 'index'])->name('ProductAdmin.index');
    Route::post('/productos', [\App\Http\Controllers\ProductController::class, 'store'])->name('ProductAdmin.store');
    Route::get('/products/{product}/edit', [AnimalController::class,'edit'])
        ->name('products.edit');
    Route::delete('products/{product}',[AnimalController::class,'destroy'])
        ->name('products.destroy');

    Route::get('/adopcion', [\App\Http\Controllers\AnimalController::class, 'index'])->name('AdopcionAdmin.index');
    Route::post('/adopcion', [\App\Http\Controllers\AnimalController::class, 'store'])->name('AnimalAdmin.store');

    Route::get('/solicitudes', [\App\Http\Controllers\AdoptionController::class, 'index'])->name('AdopcionAdmin.solicitudesAdoption');


    Route::get('/animals/{animal}/edit', [AnimalController::class,'edit'])
        ->name('animals.edit');
    Route::post('/animals/{animal}/edit', [AnimalController::class,'edit'])
        ->name('animals.edit');
    Route::put('animals/{animal}',[AnimalController::class,'update'])
    ->name('Animals.update');
    Route::delete('animals/{animal}',[AnimalController::class,'destroy'])
        ->name('Animals.delete');

});


//----------------------USUARIO-------------------------
Route::middleware(['auth', 'verified', 'roles:USER'])->group(function () {
    Route::post('/enviar-correo', 'App\Http\Controllers\EnviarCorreoController@enviarCorreo')->name('enviar-correo');

    Route::get('/formadoption', function () {
        return view('AdopcionUser/Form-Adoption');
    });

    Route::post('/adopta', [\App\Http\Controllers\ProbabilidadController::class, 'index'])->name('Probabilidad');
});




   /* Route::get('/adopcion', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('AdopcionAdmin.index');*/
    /*Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');*/

    /*Route::get('/adopcion',[\App\Http\Controllers\AnimalController::Class,'index'])
        ->name('AdopcionAdmin.index');


    //implementacion metodo "post" para un formulario
    Route::post('/adopcion',[\App\Http\Controllers\AnimalController::Class,'store'])
        ->name('AnimalAdmin.store');

    //********************Metodo post Simple***************
    /*Route::post('/adopcion', function (){
        $message=request ('message'); //-> Almacena lo digitado en area de texto para una inserccion en la base de datos
        return'Precessing Adopcion';
    });*/



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__.'/auth.php';

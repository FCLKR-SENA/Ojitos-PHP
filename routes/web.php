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
//**************************ENTRADA DIRECTA ADMIN***********************
Route::get('/dashboardAdmin', function () {
    return view('dashboardAdmin');
})->middleware(['auth', 'verified','roles:ADMIN'])->name('dashboardAdmin');
//*************************************************************************

//**************************ENTRADA DIRECTA AUSER***********************
Route::get('/dashboardUser', function () {
    return view('dashboardUSer');
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


    Route::get('/adopcion', [\App\Http\Controllers\AnimalController::class, 'index'])->name('AdopcionAdmin.index');
    Route::post('/adopcion', [\App\Http\Controllers\AnimalController::class, 'store'])->name('AnimalAdmin.store');


    Route::get('/animals/{animal}/edit', [AnimalController::class,'edit'])
        ->name('animals.edit');
    Route::post('/animals/{animal}/edit', [AnimalController::class,'edit'])
        ->name('animals.edit');

});


//----------------------USUARIO-------------------------
Route::middleware(['auth', 'verified', 'roles:USER'])->group(function () {
   // Route::get('/adopcion', [\App\Http\Controllers\AnimalController::class, 'index'])->name('AdopcionAdmin.index');
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

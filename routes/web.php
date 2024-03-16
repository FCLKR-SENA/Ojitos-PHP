<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
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

//***********PRODUCTOS****************************
    Route::get('/productos', [\App\Http\Controllers\ProductController::class, 'index'])->name('ProductAdmin.index');
    Route::post('/productos', [\App\Http\Controllers\ProductController::class, 'store'])->name('ProductAdmin.store');
    Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])
        ->name('products.edit');
    Route::put('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])
        ->name('products.update');
    Route::delete('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])
        ->name('products.destroy');
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.show');
//**********FIN PRODUCTO*************************

//**********ADOPCION******************************
    Route::get('/adopcion', [\App\Http\Controllers\AnimalController::class, 'index'])->name('AdopcionAdmin.index');
    Route::post('/adopcion', [\App\Http\Controllers\AnimalController::class, 'store'])->name('AnimalAdmin.store');

    Route::post('/gestionAdopcion', [\App\Http\Controllers\AdoptionController::class, 'aprobarAdopcion'])->name('AdopcionAdmin.aprobacion');
    Route::get('/admin/descargar-documento/{userDocument}', [\App\Http\Controllers\AdoptionController::class, 'descargarDocumento'])->name('admin.descargar-documento');

    Route::get('/solicitudes', [\App\Http\Controllers\AdoptionController::class, 'index'])->name('AdopcionAdmin.solicitudesAdoption');
    Route::post('/solicitudes', [\App\Http\Controllers\AdoptionController::class, 'concluirAdopcion'])->name('AdopcionAdmin.conclusionAdopcion');
    Route::post('/Rsolicitudes', [\App\Http\Controllers\AdoptionController::class, 'rechazar'])->name('AdopcionAdmin.rechazarAdopcion');


    Route::get('/animals/{animal}/edit', [AnimalController::class,'edit'])
        ->name('animals.edit');
    Route::post('/animals/{animal}/edit', [AnimalController::class,'edit'])
        ->name('animals.edit');
    Route::put('animals/{animal}',[AnimalController::class,'update'])
    ->name('Animals.update');
    Route::delete('animals/{animal}',[AnimalController::class,'destroy'])
        ->name('Animals.delete');
//********** FIN ADOPCION ***************************
});


//----------------------USUARIO-------------------------
Route::middleware(['auth', 'verified', 'roles:USER'])->group(function () {
    Route::post('/enviar-correo', 'App\Http\Controllers\EnviarCorreoController@enviarCorreo')->name('enviar-correo');

    Route::get('/formadoption', function () {
        return view('AdopcionUser/Form-Adoption');
    });

    Route::post('/adopta', [\App\Http\Controllers\ProbabilidadController::class, 'index'])->name('Probabilidad');
    Route::get('/missolicitudes', [\App\Http\Controllers\AdoptionController::class, 'indexMisSolicitudes'])->name('AdopcionUser.misSolicitudes')->middleware('auth');

    Route::post('/comprarvacuna', [\App\Http\Controllers\AdoptionController::class, 'comprarVacuna'])->name('comprarVacuna');

//**************PRODUCTOS USUARIOS************************************

    Route::get('/products', [ProductController::class, 'indexClient'])->name('client.products');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart', [CartController::class, 'showCart'])->name('client.cart');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.form');
    Route::get('/confirmation/{order}', [CheckoutController::class, 'showConfirmation'])->name('checkout.confirmation');
    Route::get('/user/invoices', [InvoiceController::class, 'userInvoices'])->name('user.invoices');
    Route::get('/user/invoices/{id}', [InvoiceController::class, 'userInvoiceDetails'])->name('user.invoice.details');


//*************FIN PRODUCTOS USUARIOS*********************************


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

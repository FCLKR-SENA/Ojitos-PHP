<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdoptionController extends Controller
{

    public function index()
    {
        $adopciones = Adoption::with('animals', 'users')->get();


        return view('AdopcionAdmin.solicitudesAdoption', compact('adopciones'));
    }
}

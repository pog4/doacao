<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Especies;

class HomeController extends Controller
{
    public function index()
    {

        $numAnimais = Animal::all()->count();
        $numEspecies = Especies::all()->count();
        return view('home',array('numAnimais'=>$numAnimais,'numEspecies'=>$numEspecies));
    }
}

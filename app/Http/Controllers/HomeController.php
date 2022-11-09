<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Especies;
use App\Models\Visitacao;

class HomeController extends Controller
{
    public function index()
    {

        $numAnimais = Animal::all()->count();
        $numEspecies = Especies::all()->count();
        $numVisitacaos = Visitacao::all()->count();
        return view('home',array('numAnimais'=>$numAnimais,'numEspecies'=>$numEspecies,'numVisitacaos'=>$numVisitacaos));
    }
}

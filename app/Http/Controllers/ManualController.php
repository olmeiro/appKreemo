<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;



class ManualController extends Controller
{
    public function index(){
        return view('manual.index');
    }

    public function usuarios(){
        return view('manual.usuarios');
    }

    public function clientes(){
        return view('manual.clientes');
    }

    public function visitas(){
        return view('manual.visitas');
    }

    public function cotizacion(){
        return view('manual.cotizacion');
    }

    public function maquinaria(){
        return view('manual.maquinaria');
    }

    public function encuesta(){
        return view('manual.encuesta');
    }

}

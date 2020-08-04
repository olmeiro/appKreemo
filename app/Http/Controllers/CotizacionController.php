<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function index(){
        return view('cotizacion.index');
    }
    public function create(){
        return view('cotizacion.create');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;



class ManualController extends Controller
{
    public function index(){
        return view('manual.index');
        
    }
}
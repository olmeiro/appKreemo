<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Encuesta;
//use App\Models\Obra;

class EncuestaController extends Controller
{
    public function index(){
        return view('encuesta.index');
    }

    public function listar(Request $request){


        $encuesta = Encuesta::all();

        return DataTables::of($encuesta)

        ->make(true);

    }

    public function create(){

        $encuesta = Encuesta::all();
        //$obra = Obra::all();

        return view('encuesta.create');
    }

    public function save(Request $request){

        $request->validate(Encuesta::$rules);

        // $request->validate([
        //     'idservicio' => 'integer|max:10',
        //     'directorobra' => 'required|string|max:30',
        //     'constructora' =>  'required|string|max:20',
        //     'correo' => 'required|string|max:30',
        //     'celular' => 'required|numeric|digits_between:7,11',
        //     'mes' => 'required|date',
        //     'respuesta1_1' => 'required|integer|max:1',
        //     'respuesta1_2' => 'required|integer|max:1',
        //     'respuesta1_3' => 'required|integer|max:1',
        //     'respuesta1_4' => 'required|integer|max:1',
        //     'respuesta2' => 'required|string|max:1',
        //     'respuesta3' => 'required|string|max:100',
        //     'respuesta4' => 'required|string|max:2',
        //     'respuesta5' => 'required|string|max:100',
        //     'respuesta6' => 'required|string|max:2',
        //     'respuesta7' => 'required|string|max:2'
        //   ]);

        $input = $request->all();

        try {

            Encuesta::create([
                "idservicio" => $input["idservicio"],
                "directorobra" => $input["directorobra"],
                "constructora" => $input["constructora"],
                "correo" => $input["correo"],
                "celular" => $input["celular"],
                "mes" => $input["mes"],
                "respuesta1_1" => $input["respuesta1_1"],
                "respuesta1_2" => $input["respuesta1_2"],
                "respuesta1_3" => $input["respuesta1_3"],
                "respuesta1_4" => $input["respuesta1_4"],
                "respuesta2" => $input["respuesta2"],
                "respuesta3" => $input["respuesta3"],
                "respuesta4" => $input["respuesta4"],
                "respuesta5" => $input["respuesta5"],
                "respuesta6" => $input["respuesta6"],
                "respuesta7" => $input["respuesta7"]
            ]);

            Flash::success("Encuesta registrada correctamente");
            return redirect("/encuesta");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/encuesta/crear");
        }
    }
}

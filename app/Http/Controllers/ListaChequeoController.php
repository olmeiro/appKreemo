<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Flash;
use DataTables;
use Illuminate\Support\Facades\URL;

use App\Models\ListaChequeo;
use App\Models\Visita;


class ListaChequeoController extends Controller
{
    public function index(){
        $listachequeo= ListaChequeo::all();
        $visita = Visita::all();
        return view('listachequeo.index', compact('visita'));
        
    }

    public function listar(Request $request){

        //$cliente = Cliente::all();
        

        $listachequeo = ListaChequeo::all();

        return DataTables::of($listachequeo)    
        
        ->addColumn('editar', function ($listachequeo) {
            // return '<a type="button" class="btn btn-primary"  data-toggle="modal" data-target="#edit" href="/listachequeo/editar/'.$listachequeo->id.'" >Editar</a>';

            return '<a type="button" class="btn btn-primary"   href="/listachequeo/editar/'.$listachequeo->id.'" ><i class="fas fa-edit"></i></a>';
        })
      
        ->rawColumns(['editar'])
        ->make(true);
    }

    public function pasarid($id)
    {   
        $id;
        //dd($id);
        return view('listachequeo.create', compact('id'));
    }

    public function create(){
        
       $visita = Visita::all();
        $listachequeo = ListaChequeo::all();
       
        return view('listachequeo.create', compact ('visita'));
    }
    

    public function createlist(){

        $visita = Visita::all();
        $listachequeo = ListaChequeo::all();
        return view('listachequeo.createlist', compact ('visita'));
        
    
     }

    public function save(Request $request){
        //dd('ruta ok');

        $request->validate(ListaChequeo::$rules);

        $input = $request->all();

        try {

            ListaChequeo::create([
                "idvisita" => $input["idvisita"],
                "numeroplanilla" => $input["numeroplanilla"],
                "estadovia" =>$input["estadovia"],
                "ph" =>$input["ph"],
                "hueco" =>$input["hueco"],
                "techo" =>$input["techo"],
                "desarenadero" =>$input["desarenadero"],
                "desague" =>$input["desague"],
                "agua" =>$input["agua"],
                "lineaelectrica" =>$input["lineaelectrica"],
                "senializacion" =>$input["senializacion"],
                "iluminacion" =>$input["iluminacion"],
                "banios" =>$input["banios"],
                "condicioninsegura" =>$input["condicioninsegura"],
                "ordenpublico" =>$input["ordenpublico"],
                "vigilancia" =>$input["vigilancia"],
                 "caspete" =>$input["caspete"],
                 "infoSST" =>$input["infoSST"],
                 "politicashoras" =>$input["politicashoras"],
                 "encargadovisita" =>$input["encargadovisita"],
                 "viabilidad" =>$input["viabilidad"],

              
            ]);

            Flash::success("Lista de chequeo Registrada");
            return redirect("/listachequeo");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/listachequeo/crear");
        } 
  }

  public function edit($id){
        
    $visita = Visita::all();
    $listachequeo = ListaChequeo::find($id);


    if ($listachequeo==null) {
        
        Flash::error("Lista de chequeo no encontrada");
        return redirect("/listachequeo");
    }
    //else{
        return view("listachequeo.edit", compact("listachequeo","visita"));
    // }
}

public function update(Request $request){

    $request->validate(ListaChequeo::$rules);
    $input = $request->all();
    

    
    //dd($input);
    try {

        $listachequeo = ListaChequeo::find($input["id"]);

        if ($listachequeo==null) {
            Flash::error("Lista chequeo no encontrada");
            return redirect("/listachequeo");
        }

        $listachequeo->update([
            "idvisita" => $input["idvisita"],
            "numeroplanilla" => $input["numeroplanilla"],
                "estadovia" =>$input["estadovia"],
                "ph" =>$input["ph"],
                "hueco" =>$input["hueco"],
                "techo" =>$input["techo"],
                "desarenadero" =>$input["desarenadero"],
                "desague" =>$input["desague"],
                "agua" =>$input["agua"],
                "lineaelectrica" =>$input["lineaelectrica"],
                "senializacion" =>$input["senializacion"],
                "iluminacion" =>$input["iluminacion"],
                "banios" =>$input["banios"],
                "condicioninsegura" =>$input["condicioninsegura"],
                "ordenpublico" =>$input["ordenpublico"],
                "vigilancia" =>$input["vigilancia"],
                 "caspete" =>$input["caspete"],
                 "infoSST" =>$input["infoSST"],
                 "politicashoras" =>$input["politicashoras"],
                 "encargadovisita" =>$input["encargadovisita"],
                 "viabilidad" =>$input["viabilidad"],
        ]);

        Flash::success("Se modificó la lista de chequeo");
        return redirect("/listachequeo");

    } catch (\Exception $e ) {
        Flash::error($e->getMessage());
        return redirect("/listachequeo");
    }   
}


}


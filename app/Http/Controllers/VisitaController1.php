<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Visita;
use App\Models\Obra;
use App\Models\ListaChequeo;
class VisitaController extends Controller
{

    //Videos youtube:

 

    public function index(){
        $visita = Visita::all();
        $obra = Obra::all();
        return view('visita.index', compact('obra'));
    }

    public function store (Request $request){

    }

    // public function show(){
    //     Visita::all();

    //     $data['visita']=visita::all();
    //     return response()->json($data['visita']);

    // }

    // public function listar(Request $request){


    //     $visita = Visita::select("visita.*", "obra.nombre as nombre_obra")
    //     ->join("obra", "visita.idobra", "=", "obra.id")
    //      ->get();
        
    //     $nuevavisita=[];
    //     foreach ($visita as $value) {
    //         $nuevavisita[]=[
    //         "id"=>$value->id,
    //         "start"=>$value->fecha." ".$value->horainicio,
    //         "end"=>$value->fecha." ".$value->horafinal,
    //         "obra"=>$value->idobra,
    //         "tipovisita"=>$value->tipovisita,
    //         "title"=>$value->nombre_obra,
    //         "backgroundColor"=>$value->estado ==1 ? "#1f7904" : "#7b0205",
    //         "textColor"=>"#fff"
    //     ];
    //     }
    //     return response()->json($nuevavisita);
    // }

 
    // public function validarFecha($fecha, $horainicio, $horafinal){
    //     $visita = Visita::select("*")->whereDate('fecha',$fecha)
    //     ->whereBetween('horainicio',[ $horainicio, $horafinal])
    //     ->whereBetween('horafinal',[ $horainicio, $horafinal])
    //     ->first();
        
    //     return $visita == null ? true : false;

    // }
    // public function save(Request $request)
    // {
      

    //     $input = $request->all();

    //    if($this->validarFecha($input["fecha"], $input["horainicio"], $input["horafinal"])){
    //         $visita= Visita::create([
    //             "idobra"=>$input["idobra"],
    //             "tipovisita"=>$input["tipovisita"],
    //             "fecha"=>$input["fecha"],
    //             "horainicio"=>$input["horainicio"],
    //             "horafinal"=>$input["horafinal"],
    //         ]);
    //         return response()->json(["ok"=>true]);
    //    }
    //    else{
    //     return response()->json(["ok"=>false]);
    //    }
       
    // }
 
    // public function edit($id){

    //     //$categorias = Categoria::all();
    //     $visita = Visita::find($id);
    //     $obra = Obra::all();
    //     if ($visita==null) {

    //         Flash::error("Visita no encontrada");
    //         return redirect("/visita");
    //     }
    //     //else{
    //         return view("visita.edit", compact("visita", "obra"));
    //     // }
    // }

    // public function update(Request $request){

    //     $request->validate(Visita::$rules);
    //     $input = $request->all();



    //     //dd($input);
    //     try {

    //         $visita = Visita::find($input["id"]);

    //         if ($visita==null) {
    //             Flash::error("Visita no encontrada");
    //             return redirect("/visita");
    //         }

    //         $visita->update([
    //             "tipovisita"=>$input["tipovisita"],
    //             "idobra"=>$input["idobra"],
    //             "encargadovisita"=>$input["encargadovisita"],
    //             "Fecha_Hora"=>$input["Fecha_Hora"],
    //             "viabilidad"=>$input["viabilidad"],

    //         ]);

    //         Flash::success("Se modificò la visita");
    //         return redirect("/visita");

    //     } catch (\Exception $e ) {
    //         Flash::error($e->getMessage());
    //         return redirect("/visita");
    //     }
    // }

    // public function destroy($id)
    // {
    //     $visita = Visita::find($id);

    //     if (empty($visita)) {
    //         Flash::error('Visita no encontrada');

    //         return redirect('/visita');
    //     }

    //     $visita->delete($id);

    //     Flash::success('Visita eliminada.');

    //     return redirect('/visita');
    // }
}


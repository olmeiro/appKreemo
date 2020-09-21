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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $visita = Visita::all();
        $obra = Obra::all();
        return view('visita.index', compact('obra'));
    }

    
    public function listarvisitas(Request $request){


        $visita = Visita::select("visita.*", "obra.nombre as nombre_obra")
        ->join("obra", "visita.idobra", "=", "obra.id")
        ->get();
        return DataTables::of($visita)    
       
        ->addColumn('editar', function ($visita) {
            return '<a class="btn btn-xs btn-primary" href="/visita/editar/'.$visita->id.'">Editar</a>';
        })
        ->addColumn('eliminar', function ($visita) {
            return '<a class="btn btn-danger btn-xs" href="/visita/eliminar/'.$visita->id.'">Eliminar</a>';
        })
        ->rawColumns(['editar', 'eliminar'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->except(['_token','_method']);
        Visita::insert($data);
        print_r($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      
        $data['visita']= $visita = Visita::select("visita.*", "obra.nombre as nombre_obra")
           ->join("obra", "visita.idobra", "=", "obra.id")
            ->get(); 

            $nuevavisita=[];
        
            foreach ($visita as $value) {
                        $nuevavisita[]=[
                        "id"=>$value->id,
                        "start"=>$value->fecha." ".$value->horainicio,
                        "end"=>$value->fecha." ".$value->horafinal,
                        "obra"=>$value->idobra,
                        "tipovisita"=>$value->tipovisita,
                        "descripcion"=>$value->descripcion,
                        "title"=>$value->nombre_obra,
                        "backgroundColor"=>$value->estado ==1 ? "#1f7904" : "#7b0205",
                        "textColor"=>"#fff"
                    ];
                    }
                    return response()->json($nuevavisita);

        return response()->json($nuevavisita);
     
    }

    //  public function listar(Request $request){


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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosVisita = request()->except(['_token','_method']);
        $respuesta = Visita::where('id', '=', $id)->update($datosVisita);
        return response()->json($respuesta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visita = Visita::findOrFail($id);
        Visita::destroy($id);
        return response()->json($id);
    }
}

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

        $obra = Obra::all();


        if ($request->ajax()) {

        $visita = Visita::select("visita.*", "obra.nombre as nombre_obra")
        ->join("obra", "visita.idobra", "=", "obra.id")
        ->get();

        return DataTables::of($visita)
        ->editColumn("estado", function($visita){
            return $visita->estado == 1 ? "Por realizar" : "Realizada";
        })
        ->addColumn('listaChequeo', function ($visita) {
            //return '<a type="button" class="btn btn-primary" href="/listachequeo/crear/'.$visita->id.'" ><i class="fas fa-check"></i></a>';
            if($visita->tipovisita == 'Técnica')
            {
                return '<a type="button" class="btn btn-primary" href="/listachequeo/crear/'.$visita->id.'" ><i class="fas fa-check"></i></a>';

            }
            else
            {
                return '<a type="button" class="btn btn-primary disabled"  href="/listachequeo/crear/'.$visita->id.'" ><i class="fas fa-check"></i></a>';

            }
        })
        ->addColumn('cambiar', function ($visita) {
            if($visita->estado == 1)
            {
                return '<a class="btn btn-danger btn-md" href="/visita/cambiar/estado/'.$visita->id.'/0">Realizada</a>';

            }
            else
            {
                return  '<a class="btn btn-success btn-md" href="/visita/cambiar/estado/'.$visita->id.'/1">Por realizar</a>';

            }
        })
        ->rawColumns(['listaChequeo','cambiar'])
        ->make(true);

        }
        return view('visita.listarvisita', compact('obra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function pasarid($id)
    {
        $id;
        //dd($id);
        return view('servicio.create', compact('id'));
    }

    public function updateState($id, $estado){

        $visita = Visita::find($id);

        if ($visita==null) {
            Flash::error("Visita no encontrada");
            return redirect("/visita/listarvisitas");
        }

        try {

            $visita->update(["estado"=>$estado]);
            Flash::success("Se modifico el estado de la cita");
            return redirect("/visita/listarvisitas");

        } catch (\Exception $e) {

            Flash::error($e->getMessage());
            return redirect("/visita/listarvisitas");
        }
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
                        "estado"=>$value->estado,
                        "title"=>$value->nombre_obra,
                        "backgroundColor"=>$value->estado ==1 ? "#5EFA10" : "#FE0303",
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
        // $visita = Visita::find($id);
        // $visita->destroy();
        // return Response::json($id);

        $visita = Visita::findOrFail($id);
        Visita::destroy($id);
        return response()->json($id);
    }
}

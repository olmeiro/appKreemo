<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;
use App\Models\Cotizacion;
use App\Models\Empresa;
use App\Models\Obra;

class CotizacionController extends Controller
{
    public function index(){
        return view('cotizacion.index');
    }

    public function listar(Request $request){

        $cotizacion = Cotizacion::select("cotizacion.*","empresa.nombre as nombre_empresa", "obra.nombre as nombre_obra")
        ->join("empresa","cotizacion.IdEmpresa", "=", "empresa.id")
        ->join("obra", "cotizacion.IdObra", "=", "obra.id")
        ->get();

        return Datatables::of($cotizacion)
            ->addColumn('editar', function ($cotizacion) {
                return '<a class="btn btn-xs btn-primary" href="/cotizacion/editar/'.$cotizacion->id.'">Editar</a>';
            })
            ->addColumn('editarEstado', function ($cotizacion) {
                return '<a class="btn btn-xs btn-secondary" href="/cotizacion/editarEstado/'.$cotizacion->id.'" >Cambiar Estado</a>';
            })
            ->rawColumns(['editar', 'editarEstado'])
            ->make(true);

    }


    public function create(){

        $cotizacion = Cotizacion::all();
        $empresa = Empresa::all();
        $obra = Obra::all();

        return view('cotizacion.create', compact('empresa', 'obra'));
    }

    public function save(Request $request){

        $request->validate(Cotizacion::$rules);
        $input = $request->all();

        try {
            Cotizacion::create([

                'idEmpresa' =>$input["IdEmpresa"],
                'idEstado' =>$input["IdEstado"],
                'idModalidad' =>$input["IdModalidad"],
                'idEtapa' =>$input["IdEtapa"],
                'idJornada' =>$input["IdJornada"],
                'idTipo_Concreto' =>$input["IdTipo_Concreto"],
                'idObra' =>$input["IdObra"],
                'idMaquinaria' =>$input["IdMaquinaria"],
                'idOperario' =>$input["IdOperario"],
                'fechaCotizacion' =>$input["FechaCotizacion"],
                'inicioBombeo' =>$input["InicioBombeo"],
                'ciudad' =>$input["Ciudad"],
                'losas' =>$input["Losas"],
                'tuberia' =>$input["Tuberia"],
                'metrosCubicos' =>$input["MetrosCubicos"],
                'valorMetro' =>$input["ValorMetro"],
                'AIU' =>$input["AIU"],
                'subtotal' =>$input["Subtotal"],
                'ivaAIU' =>$input["IvaAIU"],
                'valorTotal' =>$input["ValorTotal"],
                'observaciones' =>$input["Observaciones"],
            ]);
            Flash::success("Cotización Registrada");
            return redirect("/cotizacion");

        }catch(\Exception $e){
            Flash::error($e->getMessage());
            return redirect("/cotizacion/crear");
        }
    }

    public function edit($id){

        $empresa = Empresa::all();
        $obra = Obra::all();
        $cotizacion = Cotizacion::find($id);


        if($cotizacion==null){

            Flash::error("Cotización NO encontrada");
            return redirect("/cotizacion");
        }
        return view("cotizacion.edit", compact("cotizacion", "empresa", "obra"));
    }

    public function update(Request $request){

        $request->validate(Cotizacion::$rules);
        $input = $request->all();

        dd($input);
        try {

            $cotizacion = Cotizacion::find($input["id"]);

            if($cotizacion==null){

            Flash::error("Cotización NO encontrada");
            return redirect("/cotizacion");
            }


            $cotizacion->update([

                'idEmpresa' =>$input["IdEmpresa"],
                'idEstado' =>$input["IdEstado"],
                'idModalidad' =>$input["IdModalidad"],
                'idEtapa' =>$input["IdEtapa"],
                'idJornada' =>$input["IdJornada"],
                'idTipo_Concreto' =>$input["IdTipo_Concreto"],
                'idObra' =>$input["IdObra"],
                'idMaquinaria' =>$input["IdMaquinaria"],
                'idOperario' =>$input["IdOperario"],
                'fechaCotizacion' =>$input["FechaCotizacion"],
                'inicioBombeo' =>$input["InicioBombeo"],
                'ciudad' =>$input["Ciudad"],
                'losas' =>$input["Losas"],
                'tuberia' =>$input["Tuberia"],
                'metrosCubicos' =>$input["MetrosCubicos"],
                'valorMetro' =>$input["ValorMetro"],
                'AIU' =>$input["AIU"],
                'subtotal' =>$input["Subtotal"],
                'ivaAIU' =>$input["IvaAIU"],
                'valorTotal' =>$input["ValorTotal"],
                'observaciones' =>$input["Observaciones"],
            ]);
            Flash::success("Cotización Modificada");
            return redirect("/cotizacion");

        }catch(\Exception $e){
            Flash::error($e->getMessage());
            return redirect("/cotizacion");
        }
    }

    public function editEstado($id){


        $cotizacion = Cotizacion::find($id);


        if($cotizacion==null){

            Flash::error("Cotización  NO encontrada");
            return redirect("/cotizacion");
        }
        return view("cotizacion.editEstado", compact("cotizacion"));
    }

    // public function updateEstado($id, $idEstado){

    //     $cotizacion= Cotizacion::find($id);

    //     if($cotizacion==null){

    //         Flash::error("Cotización uu NO encontrada");
    //         return redirect("/cotizacion");
    //         }

    //     try {

    //         $cotizacion->update([


    //             'idEstado' =>$idEstado,

    //         ]);
    //         Flash::success("Estado Cotización Modificada");
    //         return redirect("/cotizacion");

    //     }catch(\Exception $e){
    //         Flash::error($e->getMessage());
    //         return redirect("/cotizacion");
    //     }
    // }


    public function updateEstado(Request $request){

        $request->validate(Cotizacion::$rules);
        $input = $request->all();


        try {

            $cotizacion = Cotizacion::find($input["id"]);

            if($cotizacion==null){

            Flash::error("Cotización NO encontrada");
            return redirect("/cotizacion");
            }


            $cotizacion->update([


                'idEstado' =>$input["IdEstado"],

            ]);
            Flash::success("Estado Cotización Modificada");
            return redirect("/cotizacion");

        }catch(\Exception $e){
            Flash::error($e->getMessage());
            return redirect("/cotizacion");
        }
    }


}

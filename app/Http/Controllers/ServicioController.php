<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Servicio;
use App\Models\EstadoServicio;
use App\Models\Cotizacion;
use App\Models\Maquinaria;
use App\Models\Operario;
use App\Models\Obra;

class ServicioController extends Controller
{
    public function index(){
        $servicio = Servicio::all();
        $estadoservicio = EstadoServicio::all();
        $cotizacion = Cotizacion::all();
        $maquinaria = Maquinaria::all();
        $operario = Operario::all();
        return view('servicio.index', compact('estadoservicio','cotizacion','maquinaria','operario'));
    }

    public function listarservicios(Request $request){

        if ($request->ajax()) {
            $estadoservicio = EstadoServicio::all();

        $servicio = Servicio::select("servicio.*","maquinaria.modelo", "op1.nombre as n1","op2.nombre as n2","estadoservicio.estado")
        ->join("maquinaria", "servicio.idmaquina","=","maquinaria.id")
        ->join("operario as op1", "servicio.idoperario1","=","op1.id")
        ->join("operario as op2", "servicio.idoperario2","=","op2.id")
        ->join("estadoservicio", "servicio.idestadoservicio","=","estadoservicio.id")
        ->get();


        return DataTables::of($servicio)
        ->addColumn('editar', function ($servicio) {
            return '<a type="button" class="btn btn-primary"   href="/servicio/editar/'.$servicio->id.'" >Editar</a>';
        })
        ->addColumn('encuesta', function ($servicio) {
            return '<a type="button" class="btn btn-primary" href="/encuesta/crear/'.$servicio->id.'" >Encuesta</a>';
        })
        ->rawColumns(['encuesta','editar'])
        ->make(true);

        }
        return view('/servicio/listarservicios');
    }

    public function store(Request $request)
    {
        $data = request()->except(['_token','_method']);
        Servicio::insert($data);
        print_r($data);
    }

      public function edit($id){

        $servicio = servicio::find($id);
        $cotizacion = Cotizacion::all();
        $estadoservicio = EstadoServicio::all();
        $maquinaria = Maquinaria::all();
        $operario = Operario::all();

        if ($servicio==null) {

            Flash::error("servicio no encontrado");
            return redirect("/servicio/listarservicios");
        }
        //else{
            return view("servicio.edit", compact('id','servicio','estadoservicio','maquinaria','cotizacion','operario'));
        // }
    }

    public function create(){
        
        $servicio = Servicio::all();
        $estadoservicio = EstadoServicio::all();
        $maquinaria = Maquinaria::all();
        $cotizacion = Cotizacion::all();
        $operario = Operario::all();
        
         return view('/servicio/edit', compact ('servicio','estadoservicio','maquinaria','cotizacion','operario'));
     }



    public function show()
    {

        $cotizacion = Cotizacion::all();
        $obra = Obra::all();

        $data['servicio']= $servicio = Servicio::select("servicio.*", "cotizacion.idobra")
        ->join("cotizacion","cotizacion.id", "=", "servicio.idcotizacion")
         ->get();


            $nuevoservicio=[];

            foreach ($servicio as $value) {
                        $nuevoservicio[]=[
                        "id"=>$value->id,
                        "start"=>$value->fechainicio." ".$value->horainicio,
                        "end"=>$value->fechafin." ".$value->horafin,
                        "estadoservicio"=>$value->idestadoservicio,
                        "cotizacion"=>$value->idcotizacion,
                        "maquina"=>$value->idmaquina,
                        "operario1"=>$value->idoperario1,
                        "operario2"=>$value->idoperario2,
                        "descripcion"=>$value->descripcion,
                        "title"=>"Servicio N° ".$value->id." - Obra N° ".$value->idobra,
                        "backgroundColor"=>$value->estado ==1 ? "#1f7904" : "#7b0205",
                        "textColor"=>"#fff"
                    ];
                    }
                    return response()->json($nuevoservicio);

        return response()->json($nuevoservicio);

    }

    public function actualizar(Request $request)
    {
        $input = $request->all();
        try {

                $servicio = Servicio::find($input["id"]);

                if ($servicio==null) {
                    Flash::error("Servicio no encontrado");
                    return redirect("/servicio/listarservicio");
                }

                $servicio->update([
                    "idestadoservicio" => $input["idestadoservicio"],
                    "idcotizacion" => $input["idcotizacion"],
                    "idmaquina" => $input["idmaquina"],
                    "idoperario1" => $input["idoperario1"],
                    "idoperario2" => $input["idoperario2"],
                    "fechainicio" => $input["fechainicio"],
                    "fechafin" => $input["fechafin"],
                    "horainicio" => $input["horainicio"],
                    "horafin" => $input["horafin"],
                    "estado" => $input["estado"],
                    "descripcion" => $input["descripcion"],
                ]);

                Flash::success("Se modifico el servicio");
                return redirect("/servicio/listarservicio");

            } catch (\Exception $e ) {
                Flash::error($e->getMessage());
                return redirect("/servicio/listarservicio");
            }
    }

    public function update(Request $request, $id)
    {
        $datosservicio = request()->except(['_token','_method']);
        $respuesta = Servicio::where('id', '=', $id)->update($datosservicio);
        return response()->json($respuesta);
    }

    public function updateState($id, $estado){
        $servicio = Servicio::find($id);

        if ($servicio==null) {
            Flash::error("Servicio no encontrado");
            return redirect("/servicio/listarservicios");
        }

        try {

            $servicio->update(["estado"=>$estado]);
            Flash::success("Se modifico el estado del servicio");
            return redirect("/servicio/listarservicios");

        } catch (\Exception $e) {

            Flash::error($e->getMessage());
            return redirect("/servicio/listarservicios");
        }
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        Servicio::destroy($id);
        return response()->json($id);
    }
}

// select("servicio.*", "estadoservicio.estado", "maquinaria.modelo", "operario.id as nombreOperario")
// ->join("estadoservicio", "servicio.idestadoservicio", "=", "estadoservicio.id")
// ->join("maquinaria", "servicio.idmaquina", "=", "maquinaria.id")
// ->join("operario", "servicio.idoperario1", "=" , "operario.id")
// ->join("operario", "servicio.idoperario2", "=" , "operario.id")
// ->get();


// $servicio = Servicio::select("servicio.*","estadoservicio.estado")
// ->join("estadoservicio", "servicio.idestadoservicio","=","estadoservicio.id")
// ->get();


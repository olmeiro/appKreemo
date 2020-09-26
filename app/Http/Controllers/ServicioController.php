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

class ServicioController extends Controller
{
    public function index(){
        $servicio = Servicio::all();
        $estadoservicio = EstadoServicio::all();
        $cotizacion = Cotizacion::all();
        $maquinaria = Maquinaria::all();
        $operario = Operario::all();
        return view('servicio.indexx', compact('estadoservicio','cotizacion','maquinaria','operario'));
    }

    public function store(Request $request)
    {
        $data = request()->except(['_token','_method']);
        Servicio::insert($data);
        print_r($data);
    }

    public function show()
    {

        $data['servicio']= $servicio = Servicio::all();

            $nuevoservicio=[];

            foreach ($servicio as $value) {
                        $nuevoservicio[]=[
                        "id"=>$value->id,
                        "start"=>$value->fechainicio,
                        "end"=>$value->fechafin,
                        "estadoservicio"=>$value->idestadoservicio,
                        "cotizacion"=>$value->idcotizacion,
                        "maquina"=>$value->idmaquina,
                        "operario1"=>$value->idoperario1,
                        "operario2"=>$value->idoperario2,
                        "descripcion"=>$value->descripcion,
                        "title"=>$value->id." ".$value->descripcion,
                        "backgroundColor"=>$value->estado ==1 ? "#1f7904" : "#7b0205",
                        "textColor"=>"#fff"
                    ];
                    }
                    return response()->json($nuevoservicio);

        return response()->json($nuevoservicio);

    }

    public function update(Request $request, $id)
    {
        $datosservicio = request()->except(['_token','_method']);
        $respuesta = Servicio::where('id', '=', $id)->update($datosservicio);
        return response()->json($respuesta);
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        Servicio::destroy($id);
        return response()->json($id);
    }
}

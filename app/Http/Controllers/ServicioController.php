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

        $data['servicio']= $servicio = Servicio::select("servicio.*", "estadoservicio.estado", "maquinaria.modelo" , "operario.nombre", "operario.nombre")
            ->join("estadoservicio", "servicio.idestadoservicio", "=", "estadoservicio.id")
            //->join("cotizacion", "cotizacion.idcotizacion", "=", "cotizacion.id")
            ->join("maquinaria", "maquinaria.idmaquina", "=", "maquinaria.id")
            ->join("operario", "operario.idoperario", "=", "operario.id")
            ->get();

            $nuevoservicio=[];

            foreach ($servicio as $value) {
                        $nuevoservicio[]=[
                        "id"=>$value->id,
                        "start"=>$value->fechainicio." ".$value->fechainicio,
                        "end"=>$value->fechafin." ".$value->fechafin,
                        "estadoservicio"=>$value->idestadoservicio,
                        "cotizacion"=>$value->idcotizacion,
                        "maquina"=>$value->idmaquina,
                        "operario1"=>$value->idoperario1,
                        "operario2"=>$value->idoperario2,
                        "descripcion"=>$value->descripcion,
                        //"title"=>$value->nombre_obra,
                        //"backgroundColor"=>$value->estado ==1 ? "#1f7904" : "#7b0205",
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
    /* public function index(){
        return view('servicio.indexx');
    } */

    /* public function listar(Request $request){

        $servicio = Servicio::select("servicio.*","estadoservicio.estado")
        ->join("estadoservicio", "servicio.idestadoservicio", "=", "estadoservicio.id")
        ->get();

        return DataTables::of($servicio)
        ->addColumn('editar', function ($servicio) {
            return '<a class="btn btn-primary btn-sm" href="/servicio/editar/'.$servicio->id.'"><i class="fas fa-edit"></i></a>';
        })

        ->addColumn('eliminar', function ($servicio) {
            return '<a class="btn btn-danger btn-sm" href="/servicio/eliminar/'.$servicio->id.'"><i class="fas fa-trash-alt"></i></a>';
        })
        ->rawColumns(['editar', 'eliminar'])
        ->make(true);
    }

    public function create(){

        $servicio = Servicio::all();
        $estadoservicio = EstadoServicio::all();
        $cotizacion = Cotizacion::all();

        //$cliente = Cliente::all();

        return view('servicio.create', compact("estadoservicio", "cotizacion"));
    }

    public function save(Request $request){

        $request->validate(Servicio::$rules);

        $input = $request->all();

        try {

            Servicio::create([
                "idestadoservicio" => $input["idestadoservicio"],
                "idcotizacion" => $input["idcotizacion"],
                "fechainicio" => $input["fechainicio"],
                "fechafin" => $input["fechafin"]
            ]);

            Flash::success("Servicio registrado con éxito");
            return redirect("/servicio");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/servicio/crear");
        }
    }

    public function edit($id){

        $servicio = Servicio::find($id);
        $estadoservicio = EstadoServicio::all();
        $cotizacion = Cotizacion::all();

        if ($servicio==null) {

            Flash::error("Servicio no encontrado");
            return redirect("/Servicio");
        }

        //return view("servicio.edit", compact("servicio", "cotizacion"));
        return view("servicio.edit", compact("servicio", "estadoservicio", "cotizacion"));
    }

    public function update(Request $request){

        $request->validate(Servicio::$rules);
        $input = $request->all();

        try {

            $servicio = Servicio::find($input["id"]);

            if ($servicio==null) {
                Flash::error("Servicio no encontrado");
                return redirect("/servicio");
            }

            $servicio->update([
                "idestadoservicio" => $input["idestadoservicio"],
                "idcotizacion" => $input["idcotizacion"],
                "fechainicio" => $input["fechainicio"],
                "fechafin" => $input["fechafin"]
            ]);

            Flash::success("Se modifico el servicio");
            return redirect("/servicio");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/servicio");
        }
    }

    public function destroy($id)
    {
        $servicio = Servicio::find($id);

        if (empty($servicio)) {
            Flash::error('Servicio no encontrado');

            return redirect('/servicio');
        }

        $servicio->delete($id);

        Flash::success('Servicio eliminado.');

        return redirect('/servicio');
    }
 */
}

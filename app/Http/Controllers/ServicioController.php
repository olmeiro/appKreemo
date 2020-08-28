<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Servicio;
use App\Models\EstadoServicio;
use App\Models\Cotizacion;

class ServicioController extends Controller
{
    public function index(){
        return view('servicio.index');
    }

    public function listar(Request $request){

        $servicio = Servicio::select("servicio.*","estadoservicio.estado")
        ->join("estadoservicio", "servicio.idestadoservicio", "=", "estadoservicio.id")
        ->get();

        return DataTables::of($servicio)
        ->addColumn('editar', function ($servicio) {
            return '<a class="btn btn-primary btn-sm" href="/servicio/editar/'.$servicio->id.'">Editar</a>';
        })

        ->addColumn('eliminar', function ($servicio) {
            return '<a class="btn btn-danger btn-sm" href="/servicio/eliminar/'.$servicio->id.'">Eliminar</a>';
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

}

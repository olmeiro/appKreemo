<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;
use SweetAlert;

use App\Models\EstadoCotizacion;

class EstadoCotizacionController extends Controller
{
    public function index(){

        return view('estadocotizacion.index');
    }

    public function listar(Request $request){
        $estadocotizacion = EstadoCotizacion::all();
        return Datatables::of($estadocotizacion)
            ->addColumn('editar', function ($estadocotizacion) {
                return '<a class="btn btn-xs btn-secondary" href="/estadocotizacion/editar/'.$estadocotizacion->id.'">Editar</a>';
            // ->addColumn('editar', function ($estadocotizacion) {
            //     return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#exampleModal2" href="/estadocotizacion/editar/'.$estadocotizacion->id.'">Editar</a>'
            //     ;
            })
            ->addColumn('eliminar', function ($estadocotizacion) {
                return '<a class="btn btn-danger btn-xs" href="/estadocotizacion/eliminar/'.$estadocotizacion->id.'">Eliminar</a>';
            })
            ->rawColumns(['editar', 'eliminar'])
            ->make(true);
    }

    public function create(){
        $estadocotizacion = EstadoCotizacion::all();
        return view('estadocotizacion.create');
    }

    public function save(Request $request){

        $request->validate(EstadoCotizacion::$rules);
        $input = $request->all();

        try {
            EstadoCotizacion::create([

                'estado_cotizacion' =>$input["Estado_Cotizacion"],

            ]);
            Flash::success("Estado de Cotizacion Registrada");
            return redirect("/estadocotizacion");

        }catch(\Exception $e){
            Flash::error($e->getMessage());
            return redirect("/estadocotizacion/crear");
        }
    }

    public function edit($id){
        $estadocotizacion = EstadoCotizacion::find($id);
        if($estadocotizacion==null){
            Flash::error("Estado de Cotizacion NO encontrada");
            return redirect("/estadocotizacion");
        }
        return view("estadocotizacion.edit", compact("estadocotizacion"));
    }

    public function update(Request $request){

        $request->validate(EstadoCotizacion::$rules);
        $input = $request->all();

        try {

            $estadocotizacion = EstadoCotizacion::find($input["id"]);
            if($estadocotizacion==null){

            Flash::error("Estado de Cotizacion NO encontrada");
            return redirect("/estadocotizacion");
            }

            $estadocotizacion->update([

                'estado_cotizacion' =>$input["Estado_Cotizacion"],
            ]);
            Flash::success("Estado de Cotizacion Modificada");
            return redirect("/estadocotizacion")->with('success', 'Estado de Cotizacion actualizado');

        }catch(\Exception $e){
            Flash::error($e->getMessage());
            return redirect("/estadocotizacion");
        }
    }

    public function destroy($id){
        $estadocotizacion = EstadoCotizacion::find($id);

        if (empty($estadocotizacion)) {
            Flash::error('Estado de Cotizacion no encontrada');
            return redirect('/estadocotizacion');
        }

        $estadocotizacion->delete($id);
        Flash::success('Estado de Cotizacion eliminada.');
        return redirect('/estadocotizacion');
    }
}

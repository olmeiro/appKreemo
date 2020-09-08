<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;
use App\Models\Cotizacion;
use App\Models\Empresa;
use App\Models\Obra;
use App\Models\Jornada;
use App\Models\Etapa;
use App\Models\Modalidad;
use App\Models\TipoConcreto;
use App\Models\EstadoCotizacion;
use App\Models\Maquinaria;
use App\Models\Operario;

class CotizacionController extends Controller
{
    public function index(){

        $cotizacion = Cotizacion::all();
        $empresa = Empresa::all();
        $obra = Obra::all();
        $estadocotizacion = EstadoCotizacion::all();
        $jornada = Jornada::all();
        $etapa = Etapa::all();
        $modalidad = Modalidad::all();
        $tipoconcreto = TipoConcreto::all();
        $maquinaria = Maquinaria::all();
        $operario = Operario::all();

        return view('cotizacion.index', compact('empresa', 'obra', 'estadocotizacion', 'jornada', 'etapa', 'modalidad', 'tipoconcreto', 'maquinaria', 'operario'));
    }

    public function modal(Request $request){

        $request->validate(Cotizacion::$rules);
        $input = $request->all();

        dd($input);
        // return view('cotizacion.wizardModal');

    }

    public function listar(Request $request){

        $cotizacion = Cotizacion::select("cotizacion.*","empresa.nombre as nombre_empresa", "estadocotizacion.estado_cotizacion","modalidad.modalidad", "etapa.etapa", "jornada.jornada_nombre", "tipoconcreto.tipo_concreto", "obra.nombre as nombre_obra", "maquinaria.modelo", "operario.nombre")
        ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
        ->join("estadocotizacion", "cotizacion.idEstado", "=", "estadocotizacion.id")
        ->join("modalidad", "cotizacion.idModalidad", "=", "modalidad.id")
        ->join("etapa", "cotizacion.idEtapa", "=", "etapa.id")
        ->join("jornada", "cotizacion.idJornada", "=", "jornada.id")
        ->join("tipoconcreto", "cotizacion.idTipo_Concreto", "=", "tipoconcreto.id")
        ->join("obra", "cotizacion.idObra", "=", "obra.id")
        ->join("maquinaria", "cotizacion.idMaquinaria", "=", "maquinaria.id")
        ->join("operario", "cotizacion.idOperario", "=", "operario.id")
        ->get();

        return Datatables::of($cotizacion)
            ->addColumn('editar', function ($cotizacion) {
                return '<a class="btn btn-xs btn-primary" href="/cotizacion/editar/'.$cotizacion->id.'"><i class="fas fa-edit"></i></a>';
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
        $estadocotizacion = EstadoCotizacion::all();
        $jornada = Jornada::all();
        $etapa = Etapa::all();
        $modalidad = Modalidad::all();
        $tipoconcreto = TipoConcreto::all();
        $maquinaria = Maquinaria::all();
        $operario = Operario::all();

        return view('cotizacion.create', compact('empresa', 'obra', 'estadocotizacion', 'jornada', 'etapa', 'modalidad', 'tipoconcreto', 'maquinaria', 'operario'));
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
        $estadocotizacion = EstadoCotizacion::all();
        $jornada = Jornada::all();
        $etapa = Etapa::all();
        $modalidad = Modalidad::all();
        $tipoconcreto = TipoConcreto::all();
        $maquinaria = Maquinaria::all();
        $operario = Operario::all();
        $cotizacion = Cotizacion::find($id);

        if($cotizacion==null){

            Flash::error("Cotización NO encontrada");
            return redirect("/cotizacion");
        }
        return view("cotizacion.edit", compact("cotizacion", "empresa", "obra", 'estadocotizacion', 'jornada', 'etapa', 'modalidad', 'tipoconcreto', 'maquinaria', 'operario'));
    }

    public function update(Request $request){

        $request->validate(Cotizacion::$rules);
        $input = $request->all();

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

        $estadocotizacion = EstadoCotizacion::all();
        $cotizacion = Cotizacion::find($id);

        if($cotizacion==null){

            Flash::error("Cotización  NO encontrada");
            return redirect("/cotizacion");
        }
        return view("cotizacion.editEstado", compact("cotizacion", 'estadocotizacion'));
    }

    public function actualizarestado(Request $request){

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

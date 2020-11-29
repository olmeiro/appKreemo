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
use PDF;


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


        return view('cotizacion.index', compact('empresa', 'obra', 'estadocotizacion', 'jornada', 'etapa', 'modalidad', 'tipoconcreto'));
    }

    public function modal(Request $request){

        $request->validate(Cotizacion::$rules);
        $input = $request->all();

        dd($input);

    }

    public function listar(Request $request){

        $cotizacion = Cotizacion::select("cotizacion.*","empresa.nombre as nombre_empresa", "estadocotizacion.estado_cotizacion","modalidad.modalidad", "etapa.etapa", "jornada.jornada_nombre", "tipoconcreto.tipo_concreto", "obra.nombre as nombre_obra")
        ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
        ->join("estadocotizacion", "cotizacion.idEstado", "=", "estadocotizacion.id")
        ->join("modalidad", "cotizacion.idModalidad", "=", "modalidad.id")
        ->join("etapa", "cotizacion.idEtapa", "=", "etapa.id")
        ->join("jornada", "cotizacion.idJornada", "=", "jornada.id")
        ->join("tipoconcreto", "cotizacion.idTipo_Concreto", "=", "tipoconcreto.id")
        ->join("obra", "cotizacion.idObra", "=", "obra.id")
        ->get();

        return Datatables::of($cotizacion)
            ->addColumn('editar', function ($cotizacion) {
                return '<a class="btn btn-xs btn-primary" href="/cotizacion/editar/'.$cotizacion->id.'"><i class="fas fa-edit"></i></a>';
            })
            ->addColumn('editarEstado', function ($cotizacion) {
                return '<a class="btn btn-xs btn-primary" href="/cotizacion/editarEstado/'.$cotizacion->id.'" >Cambiar Estado</a>';
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

        return view('cotizacion.create', compact('empresa', 'obra', 'estadocotizacion', 'jornada', 'etapa', 'modalidad', 'tipoconcreto'));
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
                'valorTransporte' =>$input["ValorTransporte"],
                'AIUtrans' =>$input["AIUtrans"],
                'ivaAIUtrans' =>$input["IvaAIUtrans"],
                'valorTotaltrans' =>$input["ValorTotaltrans"],
                'observaciones' =>$input["Observaciones"],
                'observaciones2' =>$input["Observaciones2"],
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
        $cotizacion = Cotizacion::find($id);

        if($cotizacion==null){

            Flash::error("Cotización NO encontrada");
            return redirect("/cotizacion");
        }
        return view("cotizacion.edit", compact("cotizacion", "empresa", "obra", 'estadocotizacion', 'jornada', 'etapa', 'modalidad', 'tipoconcreto'));
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
                'valorTransporte' =>$input["ValorTransporte"],
                'AIUtrans' =>$input["AIUtrans"],
                'ivaAIUtrans' =>$input["IvaAIUtrans"],
                'valorTotaltrans' =>$input["ValorTotaltrans"],
                'observaciones' =>$input["Observaciones"],
                'observaciones2' =>$input["Observaciones2"],
            ]);
            Flash::success("Cotización Modificada");
            return redirect("/cotizacion");

        }catch(\Exception $e){
            Flash::error($e->getMessage());
            return redirect("/cotizacion");
        }
    }

    public function editEstado($id){

        $empresa = Empresa::all();
        $obra = Obra::all();
        $jornada = Jornada::all();
        $etapa = Etapa::all();
        $modalidad = Modalidad::all();
        $tipoconcreto = TipoConcreto::all();
        $estadocotizacion = EstadoCotizacion::all();
        $cotizacion = Cotizacion::find($id);


        if($cotizacion==null){

            Flash::error("Cotización  NO encontrada");
            return redirect("/cotizacion");
        }

        return view("cotizacion.editEstado", compact("cotizacion", "empresa", "obra", 'estadocotizacion', 'jornada', 'etapa', 'modalidad', 'tipoconcreto'));
    }

    public function actualizarestado(Request $request){


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

    public function informe(){

        $cotizacion = Cotizacion::select("cotizacion.*", "empresa.nombre as nombre_empresa", "estadocotizacion.estado_cotizacion","modalidad.modalidad", "etapa.etapa", "jornada.jornada_nombre", "tipoconcreto.tipo_concreto","obra.nombre as nombre_obra", "obra.telefono1", "obra.correo1")
            ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
            ->join("estadocotizacion", "cotizacion.idEstado", "=", "estadocotizacion.id")
            ->join("modalidad", "cotizacion.idModalidad", "=", "modalidad.id")
            ->join("etapa", "cotizacion.idEtapa", "=", "etapa.id")
            ->join("jornada", "cotizacion.idJornada", "=", "jornada.id")
            ->join("tipoconcreto", "cotizacion.idTipo_Concreto", "=", "tipoconcreto.id")
            ->join("obra", "cotizacion.idObra", "=", "obra.id")
            ->orderBy("cotizacion.id")
            ->get();


        return view("cotizacion.informe", compact("cotizacion"));

    }

    public function generar_PDF(Request $request){
        $input = $request->all();
        $cotizacion = Cotizacion::select("cotizacion.*", "empresa.nombre as nombre_empresa", "estadocotizacion.estado_cotizacion","modalidad.modalidad", "etapa.etapa", "jornada.jornada_nombre", "tipoconcreto.tipo_concreto","obra.nombre as nombre_obra", "obra.telefono1", "obra.correo1")
            ->join("empresa","cotizacion.idEmpresa", "=", "empresa.id")
            ->join("estadocotizacion", "cotizacion.idEstado", "=", "estadocotizacion.id")
            ->join("modalidad", "cotizacion.idModalidad", "=", "modalidad.id")
            ->join("etapa", "cotizacion.idEtapa", "=", "etapa.id")
            ->join("jornada", "cotizacion.idJornada", "=", "jornada.id")
            ->join("tipoconcreto", "cotizacion.idTipo_Concreto", "=", "tipoconcreto.id")
            ->join("obra", "cotizacion.idObra", "=", "obra.id")
            ->where("cotizacion.id", [$input["id"]])
            ->get();
        if (count($cotizacion) > 0) {

            $pdf = PDF::loadView('pdf.cotizacion', compact('cotizacion', 'input'));

            return $pdf->download('informe.pdf');
            // return $pdf->stream('informe.pdf');
        }else{
            Flash::error("Reporte de Cotización NO encontrado");
            return redirect("/cotizacion/informe");
        }


    }


    function pasarObras(Request $request){
        $input = $request->all();

        $obra = Obra::select('obra.*')
        ->where("obra.idempresa","=", [$input["id"]])
        ->get();

        return response(json_encode($obra), 200)->header('Content-type','text/plain');
    }


}

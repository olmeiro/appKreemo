<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Jornada;

class JornadaController extends Controller
{
    // public function index(){
    //     return view('jornada.index');
    // }

    // public function listar(Request $request){
    //     $jornada = Jornada::all();
    //     return Datatables::of($jornada)
    //         ->addColumn('editar', function ($jornada) {
    //             return '<a class="btn btn-xs btn-secondary" href="/componentes/editar/'.$jornada->id.'"><i class="fas fa-trash-alt"></i></a>';
    //         })
    //         ->rawColumns(['editar'])
    //         ->make(true);
    // }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Jornada::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('acciones', function($row){

                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-md editJornada"><i class="fas fa-edit"></i></a>';

                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-md deleteJornada"><i class="fas fa-trash-alt"></i></a>';

                            return $btn;
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
        }

        return view('jornada.index');
    }


    public function store(Request $request)
    {
        Jornada::updateOrCreate(['id' => $request->jornada_id],
                ['jornada_nombre' => $request->jornada_nombre]);

        return response()->json(['success'=>'Jornada guardada correctamente.']);
    }

    public function edit($id)
    {
        $jornada = Jornada::find($id);
        return response()->json($jornada);
    }


    public function destroy($id)
    {
        $jornada = Jornada::find($id);
        $jornada->delete();
        return response()->json(['success'=>'Jornada eliminada correctamente.']);
    }

    public function listar(Request $request){
        $jornada = Jornada::all();
        return Datatables::of($jornada)
            ->make(true);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empresa;
use DataTables;

use Illuminate\Http\Request, Response;

use App\Models\Obra;



class ObraController extends Controller
{
    public function index()
    {
        $empresa = Empresa::all();
        return view('obra.index', compact('empresa'));
    }

    public function listar(Request $request){

        $obra = Obra::select("obra.*","empresa.nombre as empresa")
        ->join("empresa","obra.idempresa","=","empresa.id")
        ->get();

        return DataTables::of($obra)
        ->addColumn('editar', function ($obra) {
            return '<a class="btn btn-primary btn-md" data-toggle="modal" data-target="#verModal5" id="editar-obra" data-id='.$obra->id.' ><i class="far fa-edit"></i></a><meta name="csrf-token" content="{{csrf_token() }}">';

        })
        ->addColumn('ver', function ($obra) {
            return '<a class="btn btn-secondary btn-md ver" style="color:white"  data-toggle="modal" data-target="#verModal4" id="ver-Contactos" data-id='.$obra->id.' >Ver contactos</a><meta name="csrf-token" content="{{csrf_token() }}">';

        })
        ->addColumn('agregar', function ($obra) {
            return '<a class="btn btn-primary btn-md" href="/cliente/pasarid/'.$obra->id.'">Agregar contacto</a>';
        })
        ->addColumn('eliminar', function ($obra) {
            return '<a id="delete-obra"   data-id='.$obra->id.' class="btn btn-danger delete-obra btn-md" href="/obra/eliminar/'.$obra->id.'"><i class="fas fa-trash-alt"></i></a>';

        })
        ->rawColumns(['editar','ver','agregar','eliminar'])
        ->make(true);
    }

    public function listarContactos($id){

        $contactos = Cliente::select("contacto.*", "obra.nombre as obra")
        ->join("obra","contacto.idobra","=","obra.id")
        ->where("contacto.idobra","=",$id)
        ->get();

        return DataTables::of($contactos)
        ->addIndexColumn()
        ->addColumn('eliminar', function ($contactos) {
            return '<a id="delete-contacto"  data-id='.$contactos->id.' class="btn btn-danger delete-cliente" ><i class="fas fa-trash-alt"></i></a>';
        })
        ->rawColumns(['eliminar'])
        ->make(true);

    }

    public function pasarid($id)
    {
        return view('obra.create', compact('id'));
    }

    public function save(Request $request){

        $input = $request->all();

        try {

            Obra::create([
                "idempresa" => $input["idempresa"],
                "nombre" => $input["nombre"],
                "direccion" =>$input["direccion"],
                "telefono1" =>$input["telefono1"],
                "correo1" =>$input["correo1"],

            ]);

            return redirect("/obra");

        } catch (\Exception $e ) {
            return redirect("/obra");
        }
    }

    public function create(){

        $obra = Obra::all();

        return view('obra.create', compact('obra'));
    }

    public function edit($id){

        $obra = Obra::find($id);

        if ($obra==null) {

            return redirect("/obra");
        }

        return Response::json($obra);
    }

    public function update(Request $request)
    {

            $oId = $request->id;
            Obra::updateOrCreate(['id' => $oId],[
                "idempresa" => $request->oidempresa,
                "nombre" => $request->nombre,
                "direccion" => $request->direccion,
                "telefono1" => $request->telefono1,
                "correo1" => $request->correo1,
                ]);

                return response()->json(["ok"=>true]);

    }

    public function destroy($id){
        try
        {
            $obra = Obra::find($id);

            if (empty($obra)) {
                return redirect('/obracontacto/listar');
            }

            $obra->delete();
            return response()->json(["ok"=>true]);
        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empresa;
use Flash;
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
        //dd($obra);

        return DataTables::of($obra)
        ->addColumn('editar', function ($obra) {
            return '<a class="btn btn-primary btn-md" href="/obra/editar/'.$obra->id.'"><i class="fas fa-edit"></i></a>';
        })
        ->addColumn('ver', function ($obra) {
            return '<a class="btn btn-secondary btn-md" data-toggle="modal" data-target="#verModal4" id="ver-Contactos" data-id='.$obra->id.' >Ver contactos</a><meta name="csrf-token" content="{{csrf_token() }}">';

        })
        ->addColumn('agregar', function ($obra) {
            return '<a class="btn btn-primary btn-md" href="/cliente/pasarid/'.$obra->id.'">Agregar Contacto</a>';
        })
        ->rawColumns(['editar','ver','agregar'])
        ->make(true);
    }

    public function listarContactos($id){

        
        // $contactos = Cliente::select("obracontacto.*", "obracontacto.idcontacto","tipocontacto.tipocontacto")
        // ->join("tipocontacto","contacto.idtipocontacto", "=", "tipocontacto.id")
        // ->join("obracontacto", "contacto.id", "=", "obracontacto.idcontacto")
        // ->where("obracontacto.idobra", $id)
        // ->get();

        // return DataTables::of($contactos);

        // SELECT contacto.nombre, obra.nombre FROM `contacto`
        // INNER JOIN obra 
        // ON contacto.idobra = obra.id
        // WHERE idobra = 16

        $contactos = Cliente::select("contacto.*", "obra.nombre as obra")
        ->join("obra","contacto.idobra","=","obra.id")
        ->where("contacto.idobra","=",$id)
        ->get();

        //return response(json_encode($obraContactos), 200)->header('Content-type','text/plain');

        return DataTables::of($contactos)
        ->addIndexColumn()
        ->addColumn('eliminar', function ($contactos) {

            return '<a id="delete-contacto"  data-id='.$contactos->id.' class="btn btn-danger delete-cliente" href="/cliente/eliminar/'.$contactos->id.'"><i class="fas fa-trash-alt"></i></a>';

        })
        ->rawColumns(['eliminar'])
        ->make(true);
      
    }

    public function pasarid($id)
    {   
        $id;
        //dd($id);
        return view('obra.create', compact('id'));
    }

    public function save(Request $request){
        //dd('ruta ok');

        $request->validate(Obra::$rules);
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
            return redirect("/empresa");
        }
    }

    public function create(){

        $obra = Obra::all();

        return view('obra.create', compact('obra'));
    }

  

    public function edit($id){

        

        $obra = Obra::find($id);

        if ($obra==null) {

            Flash::error("Obra no encontrada");
            return redirect("/obra");
        }
        
        return view("obra.edit", compact("obra"));
    }

    public function update(Request $request){

        $request->validate(Obra::$rules);
        $input = $request->all();
        //dd($input);

        try {

            $obra = Obra::find($input["id"]);

            if ($obra==null) {
                Flash::error("Obra no encontrada");
                return redirect("/obra");
            }

            $obra->update([
                "nombre" => $input["nombre"],
                "direccion" =>$input["direccion"],
                "telefono1" =>$input["telefono1"],
                "correo1" =>$input["correo1"],
            ]);

            Flash::success("Se modifico la obra");
            return redirect("/obra");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/obra");
        }
    }

    public function destroy($id){

        // SELECT id FROM `obracontacto` WHERE idobra = 1

        //dd($id);

        try
        {
            $obra = Obra::find($id);

            if (empty($obra)) {
                Flash::error('Obra no encontrada');
                return redirect('/obracontacto/listar');
            }

            $obra->delete($id);
            return response()->json(["ok"=>true]);
            //Flash::success('Obra ('.$obra->nombre. ') eliminada.');
            // return redirect('/cliente');
        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
            //Flash::success('No puedes eliminar este cliente.');
            // return redirect("/cliente");
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\ObraContacto;
use App\Models\Cliente;
use App\Models\Obra;
use App\Models\tipoContacto;

use Illuminate\Http\Request, Response;
use DataTables;
use DB;

class ObraContactoController extends Controller
{
    public function index(){

        $tipocontacto = tipoContacto::all();
        $obra = Obra::all();

        $cliente = cliente::select("contacto.*","tipocontacto.tipocontacto")
        ->join("tipocontacto","contacto.idtipocontacto", "=", "tipocontacto.id")
        ->get();

        return view("obracontacto.index", compact("tipocontacto","obra","cliente"));
    }

    public function save(Request $request)
    {
        $input = $request->all();
        $request->validate(Obra::$rules);
        $input = $request->all();

        try {

            DB::beginTransaction();

        $obra = Obra::create([
            "nombre" => $input["nombre"],
            "direccion" => $input["direccion"],
            "telefono1" => $input["telefono1"],
            "correo1" => $input["correo1"],
        ]);

        foreach ($input["contacto_id"] as $key => $value) {

            ObraContacto::create([
                "idobra"=>$obra->id,
                "idcontacto"=> $value,
            ]);
        }
        DB::commit();

        return redirect("/obracontacto/listar")->with('status', '1');

    }catch(\Exception $e)
    {
        DB::rollBack();
        return redirect("/obracontacto/listar")->with('status', $e->getMessage());
    }

    }

    public function listar(Request $request){

        $obras = Obra::all();
        $cliente = Cliente::all();
        $tipocontacto = tipoContacto::all();

        if ($request->ajax()) {

        return DataTables::of($obras)
        ->addColumn('ver', function ($obras) {
            return '
                    <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal6" id="ver-Contactos" data-id='.$obras->id.' ><i class="fas fa-eye"></i></a><meta name="csrf-token" content="{{csrf_token() }}">';
        })
        ->addColumn('editar', function ($obras) {
            return '
            <a class="btn btn-primary btn-lg" data-toggle="modal" id="editar-Obra" data-id='.$obras->id.' ><i class="fas fa-edit"></i></a><meta name="csrf-token" content="{{csrf_token() }}">';

        })
        ->addColumn('eliminar', function ($obras) {
            return '<a id="delete-obra"   data-id='.$obras->id.' class="btn btn-danger delete-obra btn-lg" href="/obra/eliminar/'.$obras->id.'"><i class="fas fa-trash-alt"></i></a>';

        })
        ->rawColumns(['ver','editar','eliminar'])
        ->make(true);
        }
        return view("obracontacto.listar", compact("obras","cliente","tipocontacto"));
    }

    public function listarContactos($id){

        $obraContactos = ObraContacto::select("obracontacto.*","obra.nombre as obra","contacto.nombre","contacto.apellido1","contacto.telefono1","contacto.correo1")
        ->join("obra","obracontacto.idobra","=","obra.id")
        ->join("contacto","obracontacto.idcontacto","=","contacto.id")
        ->where("obracontacto.idobra", $id)
        ->get();

        return DataTables::of($obraContactos)
        ->addIndexColumn()
        ->addColumn('eliminar', function ($obraContactos) {

            return '<a id="delete-obracontacto"  data-id='.$obraContactos->id.' class="btn btn-danger delete-cliente" href="/obracontacto/eliminar/'.$obraContactos->id.'"><i class="fas fa-trash-alt"></i></a>';

        })
        ->rawColumns(['editar','eliminar'])
        ->make(true);

    }

    public function edit($id){

        $where = array('id' => $id);
        $obra = Obra::where($where)->first();
        return Response::json($obra);
    }

    public function actualizar(Request $request){

        $request->validate(Obra::$rules);
        $input = $request->all();

        try {

            $obra = Obra::find($input["id"]);

            if ($obra==null) {
                return redirect("/obracontacto/listar");
            }

            $obra->update([
                "nombre" => $input["nombre"],
                "direccion" =>$input["direccion"],
                "telefono1" =>$input["telefono1"],
                "correo1" =>$input["correo1"],
            ]);

            return redirect("/obracontacto/listar");

        } catch (\Exception $e ) {
            return redirect("/obracontacto/listar");
        }
    }

    public function destroy($id){

        try
        {
            $obraContactos = ObraContacto::find($id);

            if (empty($obraContactos)) {
                return redirect('/obracontacto');
            }

            $obraContactos->delete($id);
            return response()->json(["ok"=>true]);
        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
        }
    }

}

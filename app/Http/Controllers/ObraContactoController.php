<?php

namespace App\Http\Controllers;

use App\Models\ObraContacto;
use App\Models\Cliente;
use App\Models\Obra;
use App\Models\tipoContacto;

use Illuminate\Http\Request, Response;
use Flash;
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
        //dd($input);

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

    // public function listar(Request $request){

    //     $id = $request->input("id");
    //     $contactos = [];
    //     if($id != null)
    //     {
    //         $contactos = Cliente::select("contacto.*", "obracontacto.idcontacto as contactos","tipocontacto.tipocontacto")
    //         ->join("tipocontacto","contacto.idtipocontacto", "=", "tipocontacto.id")
    //         ->join("obracontacto", "contacto.id", "=", "obracontacto.idcontacto")
    //         ->where("obracontacto.idobra", $id)
    //         ->get();
    //     }

    //     $obras = Obra::all();

    //     return view("obracontacto.listar", compact("obras","contactos"));
    // }

    public function listar(Request $request){

        $obras = Obra::all();

        if ($request->ajax()) {
            
            //$obras = Obra::all();

        return DataTables::of($obras)
        ->addColumn('ver', function ($obras) {
            return ' 
                    <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal6" id="ver-Contactos" data-id='.$obras->id.' ><i class="fas fa-eye"></i></a><meta name="csrf-token" content="{{csrf_token() }}">';
        })
        ->addColumn('editar', function ($obras) {
            return '
            <a class="btn btn-primary btn-lg" data-toggle="modal" id="editar-Contactos" data-id='.$obras->id.' ><i class="fas fa-edit"></i></a><meta name="csrf-token" content="{{csrf_token() }}">';

        })
        ->addColumn('eliminar', function ($obras) {
            return '<a id="delete-obra"   data-id='.$obras->id.' class="btn btn-danger delete-obra btn-lg" href="/obra/eliminar/'.$obras->id.'"><i class="fas fa-trash-alt"></i></a>';
           
        })
        ->rawColumns(['ver','editar','eliminar'])
        ->make(true);
        }
        return view("obracontacto.listar", compact("obras"));
    }

    public function listarContactos($id){
        
        // $contactos = Cliente::select("obracontacto.*", "obracontacto.idcontacto","tipocontacto.tipocontacto")
        // ->join("tipocontacto","contacto.idtipocontacto", "=", "tipocontacto.id")
        // ->join("obracontacto", "contacto.id", "=", "obracontacto.idcontacto")
        // ->where("obracontacto.idobra", $id)
        // ->get();

        // return DataTables::of($contactos);



        $obraContactos = ObraContacto::select("obracontacto.*","obra.nombre as obra","contacto.nombre","contacto.apellido1","contacto.telefono1","contacto.correo1")
        ->join("obra","obracontacto.idobra","=","obra.id")
        ->join("contacto","obracontacto.idcontacto","=","contacto.id")
        ->where("obracontacto.idobra", $id)
        ->get();

        //return response(json_encode($obraContactos), 200)->header('Content-type','text/plain');

        return DataTables::of($obraContactos)
        ->addIndexColumn()
        ->addColumn('eliminar', function ($obraContactos) {

            return '<a id="delete-obracontacto"  data-id='.$obraContactos->id.' class="btn btn-danger delete-cliente" href="/obracontacto/eliminar/'.$obraContactos->id.'"><i class="fas fa-trash-alt"></i></a>';

        })
        ->rawColumns(['editar','eliminar'])
        ->make(true);
      
    }

    public function edit($id){
        dd($id);

        $where = array('id' => $id);
        $obra = Obra::where($where)->first();
        Flash::success("Se modifico la obra.");
        return Response::json($obra);
    }

    public function destroy($id){
        
   // SELECT id FROM `obracontacto` WHERE idobra = 1

        try
        {
            $obraContactos = ObraContacto::find($id);

            if (empty($obraContactos)) {
                Flash::error('Contacto no encontrado');
                return redirect('/obracontacto');
            }

            $obraContactos->delete($id);
            return response()->json(["ok"=>true]);
            // Flash::success('Cliente ('.$cliente->nombre. ') eliminado');
            // return redirect('/cliente');
        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
            // Flash::success('No puedes eliminar este cliente.');
            // return redirect("/cliente");
        }
    }

}

// $obras = Obra::select("obra.*", "obracontacto.idobra as obra")
// ->join("obracontacto", "obracontacto.idobra", "=", "obra.id")
// ->get();


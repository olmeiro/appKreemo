<?php

namespace App\Http\Controllers;

use App\Models\ObraContacto;
use App\Models\Cliente;
use App\Models\Obra;
use App\Models\tipoContacto;
use App\Models\Empresa;

use Illuminate\Http\Request;
use Flash;
use DataTables;
use DB;

class ObraContactoController extends Controller
{
    public function index(){

        $tipocontacto = tipoContacto::all();
        $obra = Obra::all();
        $empresa = Empresa::all();
        $cliente = Cliente::all();

        return view("obracontacto.index", compact("tipocontacto","obra","empresa","cliente"));
    }

    public function save(Request $request)
    {
        $request->validate(Obra::$rules);
        $input = $request->all();

       // dd($input);
      
        try {

            DB::beginTransaction();

        $obra = Obra::create([
            "idempresa" => $input["idempresa"],
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

        $id = $request->input("id");
        $contactos = [];
        if($id != null)
        {
            $contactos = Cliente::select("contacto.*", "obracontacto.idcontacto as contactos")
            ->join("obracontacto", "contacto.id", "=", "obracontacto.idcontacto")
            ->where("obracontacto.idobra", $id)
            ->get();
        }

        $obras = Obra::select("obra.*", "obracontacto.idobra as obra")
        ->join("obracontacto", "obracontacto.idobra", "=", "obra.id")
        ->get();

        return view("obracontacto.listar", compact("obras","contactos"));
    }

}

// $obras = Obra::select("obra.*", "obracontacto.idobra as obra")
// ->join("obracontacto", "obracontacto.idobra", "=", "obra.id")
// ->get();


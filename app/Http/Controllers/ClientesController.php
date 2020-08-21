<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Cliente;
use App\Models\tipoContacto;

class ClientesController extends Controller
{
    public function index(){
        return view('cliente.index');
    }

    public function listar(Request $request){

        //$cliente = Cliente::all();
        //dd($cliente);

        $cliente = Cliente::select("contacto.*","tipocontacto.tipocontacto")
        ->join("tipocontacto", "contacto.idtipocontacto", "=", "tipocontacto.id")
        ->get();

        return DataTables::of($cliente)    
        ->editColumn("estado", function($cliente){ 
            return $cliente->estado == 1 ? "Activo" : "Inactivo";
        })
        ->addColumn('editar', function ($cliente) {
            return '<a class="btn btn-primary btn-sm" href="/cliente/editar/'.$cliente->id.'">Editar</a>';
        })
        ->addColumn('cambiar', function ($cliente) {
            if($cliente->estado == 1)
            {
                return '<a class="btn btn-danger btn-sm" href="/cliente/cambiar/estado/'.$cliente->id.'/0">Inactivar</a>';
            }
            else
            {
                return '<a class="btn btn-success btn-sm" href="/cliente/cambiar/estado/'.$cliente->id.'/1">Activar</a>';
            }
        })
        ->rawColumns(['editar', 'cambiar'])
        ->make(true);
    }

    public function create(){
        
        $tipoContacto = tipoContacto::all();
        $cliente = Cliente::all();
       
        return view('cliente.create', compact("tipoContacto"));
    }



    public function save(Request $request){
          //dd('ruta ok');

          $request->validate(Cliente::$rules);

          $request->validate([
            'idtipocontacto' => 'integer',
            'nombre' =>    'required|string|max:20',
            'apellido1' =>  'required|string|max:20',
            'apellido2' => 'required|string|max:20',
            'documento' => 'numeric|required|digits_between:7,10',
            'estado' => 'in:1,0',
            'telefono1' => 'numeric|required|digits_between:7,13',
            'telefono2' => 'numeric|required|digits_between:7,13',
            'correo1' => 'email:rfc,dns',
            'correo2' => 'email:rfc,dns',
            ]);

          $input = $request->all();
  
          try {
  
              Cliente::create([
                  "idtipocontacto" => $input["idtipocontacto"],
                  "nombre" => $input["nombre"],
                  "apellido1" =>$input["apellido1"],
                  "apellido2" =>$input["apellido2"],
                  "documento" =>$input["documento"],
                  "estado" =>1,
                  "telefono1" =>$input["telefono1"],
                  "telefono2" =>$input["telefono2"],
                  "correo1" =>$input["correo1"],
                  "correo2" =>$input["correo2"],
                
              ]);
  
              Flash::success("Registro éxitoso de contacto");
              return redirect("/cliente");
  
          } catch (\Exception $e ) {
              Flash::error($e->getMessage());
              return redirect("/cliente/crear");
          } 
    }

    
    public function edit($id){
        
        $tipoContacto = tipoContacto::all();
        $cliente = Cliente::find($id);

        if ($cliente==null) {
            
            Flash::error("cliente no encontrado");
            return redirect("/cliente");
        }
        //else{
            return view("cliente.edit", compact("cliente", "tipoContacto"));
        // }
    }

    public function update(Request $request){

        $request->validate(Cliente::$rules);
        $input = $request->all();

        try {

            $cliente = Cliente::find($input["id"]);

            if ($cliente==null) {
                Flash::error("Cliente no encontrado");
                return redirect("/cliente");
            }

            $cliente->update([
                "nombre" => $input["nombre"],
                "apellido1" =>$input["apellido1"],
                "apellido2" =>$input["apellido2"],
                "documento" =>$input["documento"],
                "estado" =>1,
                "telefono1" =>$input["telefono1"],
                "telefono2" =>$input["telefono2"],
                "correo1" =>$input["correo1"],
                "correo2" =>$input["correo2"],
            ]);

            Flash::success("Se modifico el cliente");
            return redirect("/cliente");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/cliente");
        }   
    }

    public function updateState($id, $estado){
        
        $cliente = Cliente::find($id);

        if ($cliente==null) {
            Flash::error("Cliente no encontrado");
            return redirect("/cliente");
        }

        try {
            
            $cliente->update(["estado"=>$estado]);
            Flash::success("Se modifico el estado del cliente");
            return redirect("/cliente");

        } catch (\Exception $e) {
            
            Flash::error($e->getMessage());
            return redirect("/cliente");
        }
    }
   
}

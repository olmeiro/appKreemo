<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;
use Redirect,Response;

use App\Models\Cliente;
use App\Models\Obra;
use App\Models\tipoContacto;

class ClientesController extends Controller
{
    public function index(){

        $obra = Obra::all();

        $cliente = cliente::select("contacto.*","tipocontacto.tipocontacto","obra.id")
        ->join("obra","contacto.idobra","=","obra.id")
        ->join("tipocontacto","contacto.idtipocontacto", "=", "tipocontacto.id")
        ->get();

        $tipoContacto = tipoContacto::all();
        return view('cliente.index', compact('cliente','tipoContacto','obra'));
    }

    public function listar(Request $request){


        $cliente = Cliente::select("contacto.*","tipocontacto.tipocontacto","obra.nombre as obra")
        ->join("obra","contacto.idobra","=","obra.id")
        ->join("tipocontacto", "contacto.idtipocontacto", "=", "tipocontacto.id")
        ->get();

        if ($request->ajax()) {
            $data = Cliente::latest()->get();

        return DataTables::of($cliente)
        ->addIndexColumn()
        // ->editColumn("estado", function($cliente){
        //     return $cliente->estado == 1 ? "Activo" : "Inactivo";
        // })
        ->addColumn('editar', function ($cliente) {
            return '<a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal4" id="editar-Cliente" data-id='.$cliente->id.' ><i class="fas fa-edit"></i></a><meta name="csrf-token" content="{{csrf_token() }}">';

        })
        ->addColumn('eliminar', function ($cliente) {

            return '<a id="delete-cliente"  data-id='.$cliente->id.' class="btn btn-danger delete-cliente btn-lg" href="/cliente/eliminar/'.$cliente->id.'"><i class="fas fa-trash-alt"></i></a>';

        })
        ->rawColumns(['editar', 'cambiar','eliminar'])
        ->make(true);
        }
        return view('cliente/listar');
    }

    public function pasarid($id)
    {
        $tipoContacto = tipoContacto::all();
        $id;
        return view('cliente.create', compact('id',"tipoContacto"));
    }

    public function store(Request $request)
    {
            $cId = $request->cliente_id;
            Cliente::updateOrCreate(['id' => $cId],[
                "idobra" => $request->idobra,
                "idtipocontacto" => $request->idtipocontacto,
                "nombre" => $request->nombre,
                "apellido1" => $request->apellido1,
                "apellido2" => $request->apellido2,
                "documento" => $request->documento,
                "estado" => 1,
                "telefono1" => $request->telefono1,
                "telefono2" => $request->telefono2,
                "correo1" => $request->correo1,
                "correo2" => $request->correo2,
                ]);

                return redirect("/obra");
    }

    public function store1(Request $request)
    {
            $cId = $request->cliente_id;
            Cliente::updateOrCreate(['id' => $cId],[
                "idobra" => $request->cidobra,
                "idtipocontacto" => $request->cidtipocontacto,
                "nombre" => $request->cnombre,
                "apellido1" => $request->capellido1,
                "apellido2" => $request->capellido2,
                "documento" => $request->cdocumento,
                "estado" => 1,
                "telefono1" => $request->ctelefono1,
                "telefono2" => $request->ctelefono2,
                "correo1" => $request->ccorreo1,
                "correo2" => $request->ccorreo2,
                ]);

                return response()->json(["ok"=>true]);
                
    }

    public function store2(Request $request)
    {
            $cId = $request->cliente_id;
            Cliente::updateOrCreate(['id' => $cId],[
                "idobra" => $request->cidobra,
                "idtipocontacto" => $request->cidtipocontacto,
                "nombre" => $request->cnombre,
                "apellido1" => $request->capellido1,
                "apellido2" => $request->capellido2,
                "documento" => $request->cdocumento,
                "estado" => 1,
                "telefono1" => $request->ctelefono1,
                "telefono2" => $request->ctelefono2,
                "correo1" => $request->ccorreo1,
                "correo2" => $request->ccorreo2,
                ]);

                return response()->json(["ok"=>true]);
    }

    public function save(Request $request){

          $input = $request->all();

          try {

              Cliente::create([
                  "idobra" => $input["idobra"],
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

              return response()->json(["ok"=>true]);

          } catch (\Exception $e ) {

              return response()->json(["ok"=>false]);
          }
    }

    public function create(Request $request){

        $input = $request->all();

        try {

            Cliente::create([
                "idobra" => $input["idobra"],
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

            return response()->json(["ok"=>true]);

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return response()->json(["ok"=>false]);
        }
  }

/**
* Show the form for editing the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

    public function edit($id)
    {
        $where = array('id' => $id);
        $cliente = Cliente::where($where)->first();
        return Response::json($cliente);
    }

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

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

    public function destroy($id){
        try
        {
            $cliente = Cliente::find($id);

            if (empty($cliente)) {
                Flash::error('Cliente no encontrado');
                return redirect('/cliente');
            }

            $cliente->delete();
            return response()->json(["ok"=>true]);
        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
        }
    }

}

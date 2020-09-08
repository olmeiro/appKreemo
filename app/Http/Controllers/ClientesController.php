<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;
use Redirect,Response;

use App\Models\Cliente;
use App\Models\tipoContacto;

class ClientesController extends Controller
{
    public function index(){
        $cliente = Cliente::all();
        $tipoContacto = tipoContacto::all();
        return view('cliente.index', compact('cliente','tipoContacto'));
    }

    public function listar(Request $request){

        $cliente = Cliente::all();
        $tipoContacto = tipoContacto::all();
        //dd($cliente);
        $tipoContacto = tipoContacto::all();

        $cliente = Cliente::select("contacto.*","tipocontacto.tipocontacto")
        ->join("tipocontacto", "contacto.idtipocontacto", "=", "tipocontacto.id")
        ->get();

        if ($request->ajax()) {
            $data = Cliente::latest()->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn("estado", function($cliente){
            return $cliente->estado == 1 ? "Activo" : "Inactivo";
        })
        ->addColumn('editar', function ($cliente) {
            return ' <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4">
            <a class="btn btn-primary btn-sm" data-toggle="modal" id="editar-Cliente" data-id='.$cliente->id.' ><i class="fas fa-edit"></i></a><meta name="csrf-token" content="{{csrf_token() }}"></button>';
           
        })
        ->addColumn('cambiar', function ($cliente) {
            if($cliente->estado == 1)
            {
                return '<button type="button" class="btn btn-danger" data-toggle="modal"><a class="btn btn-danger btn-sm" href="/cliente/cambiar/estado/'.$cliente->id.'/0">Inactivar</a></button>';
                
            }
            else
            {
                return  '<button type="button" class="btn btn-success" data-toggle="modal"><a class="btn btn-success btn-sm" href="/cliente/cambiar/estado/'.$cliente->id.'/1">Activar</a></button>';
              
            }
        })
        ->addColumn('eliminar', function ($cliente) {
            return ' <button type="button" class="btn btn-danger">
            <a id="delete-cliente" data-id='.$cliente->id.' class="btn btn-danger delete-cliente" href="/cliente/eliminar/'.$cliente->id.'">Eliminar</a></button>';
           
        })
        ->rawColumns(['editar', 'cambiar','eliminar'])
        ->make(true);
        }   
        return view('cliente/listar');
    }

    // public function create(){

    //     $tipoContacto = tipoContacto::all();
    //     $cliente = Cliente::all();

    //     return view('cliente.create', compact("tipoContacto"));
    // }

    public function store(Request $request)
    {
       //$request->validate(Cliente::$rules);
    //    $r=$request->validate([
    //     'idtipocontacto' => 'required|integer',
    //     'nombre' => 'required|string|max:20',
    //     'apellido1' =>  'required|string|max:20',
    //     'apellido2' => 'string|max:20',
    //     'documento' => 'numeric|required',
    //     'estado' => 'in:1,0',
    //     'telefono1' => 'required|numeric|required',
    //     'telefono2' => 'numeric|required',
    //     'correo1' => 'email:rfc,dns',
    //     'correo2' => 'email:rfc,dns',
        
    //     ]);

        $cId = $request->cliente_id;
        Cliente::updateOrCreate(['id' => $cId],[
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
        if(empty($request->cliente_id))
        {
            $msg = 'Cliente created successfully.';
            return response()->json(["ok"=>true]);
        }
       
        else{
            $msg = 'Client data is updated successfully';
            return redirect('cliente')->with('success',$msg);
            return response()->json(["ok"=>false]);
            
        }
   
    }

    public function save(Request $request){

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
              return response()->json(["ok"=>true]);
              //return redirect("/cliente");

          } catch (\Exception $e ) {
              Flash::error($e->getMessage());
              return response()->json(["ok"=>false]);
              //return redirect("/cliente/crear");
          }
    }


    // public function edit($id){

    //     $tipoContacto = tipoContacto::all();
    //     $cliente = Cliente::find($id);

    //     if ($cliente==null) {

    //         Flash::error("cliente no encontrado");
    //         return redirect("/cliente");
    //     }
    //     //else{
    //         return view("cliente.edit", compact("cliente", "tipoContacto"));
    //     // }
    // }

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
        Flash::success("Se modifico el cliente.");
        return Response::json($cliente);
    }

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

  

    // public function update(Request $request){

    //     $request->validate(Cliente::$rules);
    //     $input = $request->all();

    //     try {

    //         $cliente = Cliente::find($input["id"]);

    //         if ($cliente==null) {
    //             Flash::error("Cliente no encontrado");
    //             return redirect("/cliente");
    //         }

    //         $cliente->update([
    //             "cnombre" => $input["nombre"],
    //             "capellido1" =>$input["apellido1"],
    //             "capellido2" =>$input["apellido2"],
    //             "cdocumento" =>$input["documento"],
    //             "cestado" =>1,
    //             "ctelefono1" =>$input["telefono1"],
    //             "ctelefono2" =>$input["telefono2"],
    //             "ccorreo1" =>$input["correo1"],
    //             "ccorreo2" =>$input["correo2"],
    //         ]);

    //         Flash::success("Se modifico el cliente");
    //         return redirect("/cliente");

    //     } catch (\Exception $e ) {
    //         Flash::error($e->getMessage());
    //         return redirect("/cliente");
    //     }
    // }

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
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            Flash::error('Cliente no encontrado');
            return redirect('/cliente');
        }

        $cliente->delete($id);
        Flash::success('Cliente ('.$cliente->nombre. ') eliminado');
        return redirect('/cliente');
    }

}

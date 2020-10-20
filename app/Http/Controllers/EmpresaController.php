<?php

namespace App\Http\Controllers;
use Flash;
use DataTables;
use Redirect,Response;

use Illuminate\Http\Request;

use App\Models\Empresa;
use Laracasts\Flash\Flash as FlashFlash;

class EmpresaController extends Controller
{
    public function index(){

        $empresa = Empresa::all();

        return view('empresa.index',compact('empresa'));
    }

    public function listar(Request $request){

        $empresa = Empresa::all();

        if ($request->ajax()) {
            $data = Empresa::latest()->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn("estado", function($empresa){
            return $empresa->estado == 1 ? "Activo" : "Pasivo";
        })
        ->addColumn('editar', function ($empresa) {

            return '<a class="btn btn-primary btn-md" data-toggle="modal" id="editar-Empresa" data-id='.$empresa->id.' ><i class="fas fa-edit"></i></a><meta name="csrf-token" content="{{csrf_token() }}">';

        })
        ->addColumn('cambiar', function ($empresa) {
            if($empresa->estado == 1)
            {
                return '<a class="btn btn-primary btn-md" href="/empresa/cambiar/estado/'.$empresa->id.'/0">Inactivar</a>';

            }
            else
            {
                return  '<a class="btn btn-primary btn-md" href="/empresa/cambiar/estado/'.$empresa->id.'/1">Activar</a>';

            }
        })
        ->addColumn('agregar', function ($empresa) {

            return    '<a id="agregar-obra" data-id='.$empresa->id.' class="btn btn-success agregar-obra btn-md" href="/obra/pasarid/'.$empresa->id.'"><i class="fas fa-plus-square"></i></a>';

        })
        ->addColumn('eliminar', function ($empresa) {
            return '
            <a id="delete-empresa" data-id='.$empresa->id.' class="btn btn-danger delete-empresa btn-md" href="/empresa/eliminar/'.$empresa->id.'"><i class="fas fa-trash-alt"></i></a>';

        })
        ->rawColumns(['agregar','editar','cambiar','eliminar'])
        ->make(true);
    }
        return view('empresa/listar');
    }

    public function save(Request $request){

        $request->validate(Empresa::$rules);
        $input = $request->all();

        try {

            Empresa::create([
                "nit" => $input["nit"],
                "nombre" => $input["nombre"],
                "nombrerepresentante" => $input["nombrerepresentante"],
                "direccion" =>$input["direccion"],
                "telefono1" =>$input["telefono1"],
                "correo1" =>$input["correo1"],

            ]);

            Flash::success("Registro éxitoso de empresa");
            return response()->json(["ok"=>true]);
            //return redirect("/empresa");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return response()->json(["ok"=>false]);
            //return redirect("/empresa/crear");
        }
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $empresa = Empresa::where($where)->first();
        Flash::success("Se modifico empresa.");
        return Response::json($empresa);
    }

    public function store(Request $request)
    {
        $eId = $request->empresa_id;
        Empresa::updateOrCreate(['id' => $eId],[
            "nit" => $request->enit,
            "nombre" => $request->enombre,
            "nombrerepresentante" => $request->enombrerepresentante,
            "direccion" => $request->edireccion,
            "telefono1" => $request->etelefono1,
            "correo1" => $request->ecorreo1,
            "estado" => $request->eestado,

        ]);
        return response()->json(["ok"=>true]);
    }


    public function updateState($id, $estado){

        $empresa = Empresa::find($id);

        if ($empresa==null) {
            Flash::error("Empresa o cliente no encontrado");
            return redirect("/empresa");
        }

        try {

            $empresa->update(["estado"=>$estado]);
            Flash::success("Se modifico el estado del cliente o empresa");
            return redirect("/empresa");

        } catch (\Exception $e) {

            Flash::error($e->getMessage());
            return redirect("/empresa");
        }
    }



        /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    // public function destroy($id)
    // {
    //     $empresa = Empresa::where('id',$id)->delete();
    //     return response()->json(["ok"=>true]);
    //     //return Response::json($empresa);
    //     //return redirect()->route('users.index');
    // }

    public function destroy($id){

         try
        {
            $empresa = Empresa::find($id);

            if (empty($empresa)) {
                Flash::error('Empresa no encontrada');
                return redirect('/empresa');
            }

            $empresa->delete();
            return response()->json(["ok"=>true]);
        }
        catch (\Throwable $th) {
            return response()->json(["ok"=>false]);
        }
    }

}


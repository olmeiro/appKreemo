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

            return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4">
            <a class="btn btn-primary btn-sm" data-toggle="modal" id="editar-Empresa" data-id='.$empresa->id.' ><i class="fas fa-edit"></i></a><meta name="csrf-token" content="{{csrf_token() }}"></button>';

        })
        ->addColumn('cambiar', function ($empresa) {
            if($empresa->estado == 1)
            {
                return '<button type="button" class="btn btn-danger" data-toggle="modal"><a class="btn btn-danger btn-sm" href="/empresa/cambiar/estado/'.$empresa->id.'/0">Pasivo</a></button>';

            }
            else
            {
                return  '<button type="button" class="btn btn-success" data-toggle="modal"><a class="btn btn-success btn-sm" href="/empresa/cambiar/estado/'.$empresa->id.'/1">Activo</a></button>';

            }
        })
        ->addColumn('eliminar', function ($empresa) {
            return '
            <a id="delete-empresa" data-id='.$empresa->id.' class="btn btn-danger delete-empresa btn-lg" href="/empresa/eliminar/'.$empresa->id.'"><i class="fas fa-trash-alt"></i></a>';
           
        })
        ->rawColumns(['editar','cambiar','eliminar'])
        ->make(true);
    }
        return view('empresa/listar');
    }

    // public function create(){
    //     $empresa = Empresa::all();

    //     return view('empresa.create', compact('empresa'));
    // }

    public function save(Request $request){
        //dd('ruta ok');

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
            
            $empresa->delete($id);
            Flash::success('Empresa ('.$empresa->nombre. ') eliminada');
            return redirect('/empresa');
        } 
        catch (\Throwable $th) {
            Flash::success('No puedes eliminar este cliente.');
            return redirect("/empresa");
        } 
    }

}


// ->addColumn('eliminar', function ($empresa) {
//     return ' <button type="button" class="btn btn-danger">
//     <a id="delete-empresa" data-id='.$empresa->id.' class="btn btn-danger delete-empresa" href="/empresa/'.$empresa->id.'">Eliminar</a></button>';
   
// })
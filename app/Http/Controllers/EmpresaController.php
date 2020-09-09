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

        return view('empresa.index');
    }

    public function listar(Request $request){

        $empresa = Empresa::all();

        if ($request->ajax()) {
            $data = Empresa::latest()->get();
   
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('editar', function ($empresa) {

            return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4">
            <a class="btn btn-primary btn-sm" data-toggle="modal" id="editar-Empresa" data-id='.$empresa->id.' ><i class="fas fa-edit"></i></a><meta name="csrf-token" content="{{csrf_token() }}"></button>';

        })
        ->addColumn('eliminar', function ($empresa) {
            return '
            <a id="delete-empresa" data-id='.$empresa->id.' class="btn btn-danger delete-empresa" href="/empresa/eliminar/'.$empresa->id.'"><i class="fas fa-trash-alt"></i></a>';
           
        })
        ->rawColumns(['editar','eliminar'])
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
            
        ]);
        if(empty($request->empresa_id))
        {
            //$msg = 'Cliente created successfully.';
            Flash::success("Creación éxitosa de empresa");
            return redirect("/empresa");
            //return response()->json(["ok"=>true]);
        }
       
        else{
            //$msg = 'Client data is updated successfully';
            Flash::success("Actuliazación éxitosa de empresa");
            return redirect("/empresa");
            //return redirect('cliente')->with('success',$msg);
            //return response()->json(["ok"=>false]);
            
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
        $empresa = Empresa::find($id);

        if (empty($empresa)) {
            Flash::error('Empresa no encontrada');
            return redirect('/empresa');
        }

        $empresa->delete($id);
        Flash::success('Empresa ('.$empresa->nombre. ') eliminada');
        return redirect('/empresa');
    }

}


// ->addColumn('eliminar', function ($empresa) {
//     return ' <button type="button" class="btn btn-danger">
//     <a id="delete-empresa" data-id='.$empresa->id.' class="btn btn-danger delete-empresa" href="/empresa/'.$empresa->id.'">Eliminar</a></button>';
   
// })
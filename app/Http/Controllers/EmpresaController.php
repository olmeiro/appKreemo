<?php

namespace App\Http\Controllers;
use Flash;
use DataTables;

use Illuminate\Http\Request;

use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function index(){

        return view('empresa.index');
    }

    public function listar(Request $request){

        $empresa = Empresa::all();

        return DataTables::of($empresa)    
        ->addColumn('editar', function ($empresa) {
            return '<a class="btn btn-primary btn-sm" href="/empresa/editar/'.$empresa->id.'">Editar</a>';
        })
        ->rawColumns(['editar'])
        ->make(true);
    }

    public function create(){
        $empresa = Empresa::all();

        return view('empresa.create', compact('empresa'));
    }

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
            return redirect("/empresa");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/empresa/crear");
        } 
    }

    public function edit($id){
        
      
        $empresa = Empresa::find($id);

        if ($empresa==null) {
            
            Flash::error("Empresa no encontrada");
            return redirect("/empresa");
        }
      
        return view("empresa.edit", compact("empresa"));
      
    }

    public function update(Request $request){

        $request->validate(Empresa::$rules);
        $input = $request->all();

        try {

            $empresa = Empresa::find($input["id"]);

            if ($empresa==null) {
                Flash::error("Empresa no encontrada");
                return redirect("/empresa");
            }

            $empresa->update([
                "nit" => $input["nit"],
                "nombre" => $input["nombre"],
                "nombrerepresentante" => $input["nombrerepresentante"],
                "direccion" =>$input["direccion"],
                "telefono1" =>$input["telefono1"],
                "correo1" =>$input["correo1"],
              
            ]);

            Flash::success("Se modifico la empresa");
            return redirect("/empresa");

        } catch (\Exception $e ) {
            Flash::error($e->getMessage());
            return redirect("/empresa");
        }   
    }
}

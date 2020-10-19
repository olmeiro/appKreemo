<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Redirect,Response;

class UserController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{

    $roles = Roles::All();

    if ($request->ajax()) {
    ///$data = User::latest()->get();

    $data = User::select('users.*','roles.name as rolname')
    ->join('roles','users.rol_id', '=', 'roles.id')
    ->get();

    return Datatables::of($data)
    ->addIndexColumn()
    ->addColumn('action', function($row){

        $action = '
        <a class="btn btn-success" id="show-user" data-toggle="modal" data-id='.$row->id.'><i class="fas fa-eye regular"></i></a>
        <a class="btn btn-primary" id="edit-user" data-toggle="modal" data-id='.$row->id.'><i class="fas fa-edit"></i></a>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <a id="delete-user" data-id='.$row->id.' class="btn btn-danger delete-user"><i class="fas fa-trash-alt"></i></a>';


    return $action;

    })
    ->rawColumns(['action'])
    ->make(true);
    }

    return view('users');
}

public function store(Request $request)
{
    $uId = $request->user_id;
    User::updateOrCreate(['id' => $uId],['name' => $request->name, 'lastname' => $request->lastname,  'email' => $request->email, 'password'=>Hash::make($request->pw), 'rol_id'=>$request->rol]);
    return response()->json(['success'=>'Maquinaria guardada satisfactoriamente']);
}

/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

public function show($id)
{
   $roles = Roles::All();

   $user = User::select('users.*','roles.name as rolname')
   ->join('roles','users.rol_id', '=', 'roles.id')
   ->find($id);
    return Response::json($user);

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
    $user = User::where($where)->first();
    return Response::json($user);
}

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

public function destroy($id)
{
    $user = User::where('id',$id)->delete();
    return Response::json($user);
}
}

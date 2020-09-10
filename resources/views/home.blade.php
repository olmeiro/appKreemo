@extends('layouts.app')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        
            <div class="card" style="margin-top:90px">
               
    
                <div class="card-body" align="center" >
                <h2><b>BIENVENIDO</b></h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="img/logovinicol.jpg"> 

                 <!-- {{ var_dump(Auth::user()->name) }} -->
                </div>
            
       
    </div>
</div>
@endsection


@extends('layouts.app')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vinicol Bombeos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Kreemo app gestiona tu informacio comercial.</h4>
                    <img src="{{ asset('assets/dashboard/public/assets/img/Vinicol.PNG') }}" alt="">

                 <!-- {{ var_dump(Auth::user()->name) }} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


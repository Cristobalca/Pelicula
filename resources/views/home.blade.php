@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
                    @auth
                   <h2> Hola!! Bienvenido Administrador</h2>
                    <br>
                    <br>
                    <a href="{{ url('/peliculas') }}" title="Back">
                        <button class="btn btn-success btn-lx"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ir a portadas</button></a>

                        @else
                      <h2>  {{ __('As Cerrado Seccion Good bye!!') }}</h2>
                    <br>
                    <br>
                    <a href="{{ url('/peliculas') }}" title="Back">
                        <button class="btn btn-success btn-lx"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ir a portadas</button></a>
                    @endauth


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

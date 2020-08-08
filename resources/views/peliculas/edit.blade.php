@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        {{-- @include('admin.sidebar') --}}

            <div class="col-md-10">
                <a href="{{ url('/peliculas') }}" title="Back">
                    <button class="btn btn-warning btn-lg"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                <br />
                <br />
                <div class="card">
                    <div class="card-header">Edit pelicula {{ $pelicula->Titulo }}</div>
                    <div class="card-body">


                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/peliculas/' . $pelicula->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('peliculas.form', ['formMode' => 'editar'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

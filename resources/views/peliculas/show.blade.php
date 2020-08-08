@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}

            <div class="col-md-12 center">

                <iframe width="1106" height="622" src="{{'https://www.youtube.com/embed/'.$pelicula->Link.'?autoplay=1'}}"
                    rel=0 control=0 frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen  ></iframe>


                <div class="card">
                    <div class="card-header">{{ $pelicula->Titulo }}</div>
                    <div class="card-body">
                      <img src="{{ asset('storage').'/'.$pelicula->Portada }}"  width="200" height="300" alt="Foto">
                      <div class="row">
                        <h3>Titulo </h3>{{ $pelicula->Titulo }}
                        <h3>Descripcion </h3>| {{ $pelicula->Descripcion }}
                    </div>
                        <h3>Actions</h3>
                        <a href="{{ url('/peliculas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                @if (Auth::user())
                                <a href="{{ url('/peliculas/' . $pelicula->id . '/edit') }}" title="Edit pelicula"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('peliculas' . '/' . $pelicula->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete pelicula" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

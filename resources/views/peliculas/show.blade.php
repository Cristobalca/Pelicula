@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @include('admin.sidebar') --}}

            <div class="col-md-12 center">

                <iframe width="756" height="400" src="{{$pelicula->Link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <div class="card">
                    <div class="card-header">{{ $pelicula->Titulo }}</div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                    <tr><th> Portada </th><td> <img src="{{ asset('storage').'/'.$pelicula->Portada }}"  width="200" height="300" alt="Foto">
                                    </td></tr><tr><th> Titulo </th><td> {{ $pelicula->Titulo }} </td></tr><tr><th> Descripcion </th><td> {{ $pelicula->Descripcion }} </td></tr>
                               <tr><th>Actions</th><td><a href="{{ url('/peliculas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                @if (Auth::user())
                                <a href="{{ url('/peliculas/' . $pelicula->id . '/edit') }}" title="Edit pelicula"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('peliculas' . '/' . $pelicula->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete pelicula" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                                @endif
                                </td></tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

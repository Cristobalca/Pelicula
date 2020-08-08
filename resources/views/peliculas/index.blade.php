@extends('layouts.app')

@section('content')
    <div class="container">

            {{-- @include('admin.sidebar') --}}
        <div class="row mb-4">
                @if (Auth::user())
                     <a href="{{ url('/peliculas/create') }}" class="btn btn-success btn-lg" title="Add New pelicula">
                    <i class="fa fa-plus" aria-hidden="true"></i> Añadir pelicula
                    </a>

                @endif
                {{-- <form method="GET" action="{{ url('/peliculas') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form> --}}
        </div>
                <div class="row row-cols-md-4">

                     @foreach($peliculas as $item)
                            <div class="mb-3">

                                    <div class="card">
                                            <img src="{{ asset('storage').'/'.$item->Portada }}" class="img-fluid img-thumbnail"  alt="Foto">
                                    <div class="card-body">
                                            <h5 class="card-title"> {{ $item->Titulo }}</h5>
                                            <p class="card-text">{{$item->Descripcion }}</p>
                                    </div>
                                            @if (Auth::user())
                                    <div class="card-footer">
                                            <a href="{{ url('/peliculas/' . $item->id) }}" title="View pelicula"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver Trailer</button></a>

                                            <a href="{{ url('/peliculas/' . $item->id . '/edit') }}" title="Edit pelicula"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            <form method="POST" action="{{ url('/peliculas' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete pelicula" onclick="return confirm(&quot;Seguro que quieres borrar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                            </form>
                                        </div>
                                            @else
                                            <div class="card-footer d-flex justify-content-center">
                                            <a href="{{ url('/peliculas/' . $item->id) }}" title="View pelicula"><button class="btn btn-info btn-lg"><i class="fa fa-eye" aria-hidden="true"></i>Ver Trailer</button></a>
                                              </div>

                                            @endif




                                </div>
                            </div>

                                @endforeach
                 </div>

                            <div class="pagination-wrapper"> {!! $peliculas->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
    </div>
@endsection

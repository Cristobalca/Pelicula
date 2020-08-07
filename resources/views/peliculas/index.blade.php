@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Peliculas</div>
                    <div class="card-body">
                        @if (Auth::user())
                        <a href="{{ url('/peliculas/create') }}" class="btn btn-success btn-sm" title="Add New pelicula">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        @endif

                        <form method="GET" action="{{ url('/peliculas') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>

                                @foreach($peliculas as $item)

                                <div class="card-deck">
                                    <div class="card">
                                        <img src="{{ asset('storage').'/'.$item->Portada }}"  width="200" height="300" alt="Foto">

                                      <div class="card-body">

                                        <h5 class="card-title"> {{ $item->Titulo }}</h5>
                                        <p class="card-text">{{$item->Descripcion }}</p>
                                      </div>
                                      <div class="card-footer">
                                        <a href="{{ url('/peliculas/' . $item->id) }}" title="View pelicula"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        @if (Auth::user())
                                        <a href="{{ url('/peliculas/' . $item->id . '/edit') }}" title="Edit pelicula"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        <form method="POST" action="{{ url('/peliculas' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete pelicula" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                        @endif

                                      </div>
                                    </div>




                                        {{-- <embed  src="{{ $item->Link }}" width="200px" > --}}






                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $peliculas->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

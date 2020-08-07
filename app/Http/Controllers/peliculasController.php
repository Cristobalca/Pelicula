<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\pelicula;
use Illuminate\Http\Request;

class peliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $peliculas = pelicula::where('Portada', 'LIKE', "%$keyword%")
                ->orWhere('Titulo', 'LIKE', "%$keyword%")
                ->orWhere('Descripcion', 'LIKE', "%$keyword%")
                ->orWhere('Link', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $peliculas = pelicula::latest()->paginate($perPage);
        }

        return view('peliculas.index', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('Portada')) {
            $requestData['Portada'] = $request->file('Portada')
                ->store('uploads', 'public');
        }

        pelicula::create($requestData);

        return redirect('peliculas')->with('flash_message', 'pelicula added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pelicula = pelicula::findOrFail($id);

        return view('peliculas.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pelicula = pelicula::findOrFail($id);

        return view('peliculas.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('Portada')) {
            $requestData['Portada'] = $request->file('Portada')
                ->store('uploads', 'public');
        }

        $pelicula = pelicula::findOrFail($id);
        $pelicula->update($requestData);

        return redirect('peliculas')->with('flash_message', 'pelicula updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        pelicula::destroy($id);

        return redirect('peliculas')->with('flash_message', 'pelicula deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genero\StoreRequest;
use App\Http\Requests\Genero\UpdateRequest;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
   
    public function index()
    {
        $generos = Genero::paginate(8);
        return inertia("Genero/Index", compact('generos'));
    }

    
    public function create()
    {
        return inertia("Genero/Create");
    }

   
    public function store(StoreRequest $request)
    {

        Genero::create($request->validated());
        return to_route('genero.index')->with('message', 'REGISTRO CREADO CON EXITO!');
    }

   
    public function show(Genero $genero)
    {
        return inertia("Genero/Show", compact('genero'));
    }

  
    public function edit(Genero $genero)
    {
        return inertia('Genero/Edit', compact('genero'));
    }

   
    public function update(UpdateRequest $request, Genero $genero)
    {
        $genero->update($request->validated());

        return to_route('genero.index')->with('message', 'REGISTRO ACTUALIZADO CON EXITO!');
    }

   
    public function destroy(Genero $genero)
    {
        $genero->delete();
        return redirect()->route('genero.index');
    }
}

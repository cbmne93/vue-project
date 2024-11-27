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
        return redirect()->route('genero.index');
    }

   
    public function show(Genero $genero)
    {
        //
    }

  
    public function edit(Genero $genero)
    {
        return inertia('Genero/Edit', compact('genero'));
    }

   
    public function update(UpdateRequest $request, Genero $genero)
    {
        $genero->update($request->validated());

        return to_route('genero.index')->with('message', 'REGISTRO ACTUALIZADO!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();
        return redirect()->route('genero.index');
    }
}

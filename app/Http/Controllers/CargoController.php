<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cargo\StoreRequest;
use App\Http\Requests\Cargo\UpdateRequest;
use App\Models\Cargo;


class CargoController extends Controller
{

    public function index()
    {
        $cargos = Cargo::paginate(8);
        return inertia("Cargo/Index", compact('cargos'));
    }


    public function create()
    {
        return inertia("Cargo/Create");
    }


    public function store(StoreRequest $request)
    {
        Cargo::create($request->validated());
        return to_route('cargo.index')->with('message', 'REGISTRO CREADO!');
    }

    public function show(Cargo $cargo)
    {
        //
    }


    public function edit(Cargo $cargo)
    {
        return inertia("Cargo/Edit", compact('cargo'));
    }


    public function update(UpdateRequest $request, Cargo $cargo)
    {

        $cargo->update($request->validated());
        return to_route('cargo.index')->with('message', 'REGISTRO ACTUALIZADO!');
    }


    public function destroy(Cargo $cargo)
    {
       /*  $cargo->update(['state' => 'Inactivo']);
        dd($cargo); */
    }
}

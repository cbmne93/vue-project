<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cargo\StoreRequest;
use App\Http\Requests\Cargo\UpdateRequest;
use App\Models\Cargo;


class CargoController extends Controller
{

    public function index()
    {

        $search = request('search');

        $cargos = Cargo::where('id', '>=', 1);

        if (request('search')) {
            $cargos->where(function ($query) {
                $query->orWhere('des_cargo', 'like', "%" . request('search') . "%");
            });
        }

        $cargos = $cargos->orderBy('state')->paginate(8);

        return inertia("Cargo/Index", [
            'cargos' => $cargos,
            'prop_search' => $search,
        ]);
    }


    public function create()
    {
        return inertia("Cargo/Create");
    }


    public function store(StoreRequest $request)
    {
        Cargo::create($request->validated());
        return to_route('cargo.index')->with('message', 'REGISTRO CREADO CON EXITO!');
    }

    public function show(Cargo $cargo)
    {
        return inertia("Cargo/Show", compact('cargo'));
    }


    public function edit(Cargo $cargo)
    {
        return inertia("Cargo/Edit", compact('cargo'));
    }


    public function update(UpdateRequest $request, Cargo $cargo)
    {

        $cargo->update($request->validated());
        return to_route('cargo.index')->with('message', 'REGISTRO ACTUALIZADO CON EXITO!');
    }

}

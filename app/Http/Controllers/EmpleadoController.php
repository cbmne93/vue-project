<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Genero;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\Empleado\StoreRequest;
use App\Http\Requests\Empleado\UpdateRequest;

class EmpleadoController extends Controller
{

    public function index()
    {

        /*   DATA */

        $date_from = request('date_from');
        $date_to = request('date_to');
        $search = request('search');

        /*  $empleados = Empleado::with('cargo', 'genero')->paginate(8); */
        $empleados = Empleado::where('id', '>=', 1);


        if (request('search')) {
            $empleados->where(function ($query) {
                $query->orWhere('cedula', 'like', "%" . request('search') . "%");
                $query->orWhere('nombre', 'like', "%" . request('search') . "%");
            });
        }
        if (request('date_from') && request('date_to')) {
            $empleados->whereBetween('date', [date(request('date_from')), date(request('date_to'))]);
        }

        $empleados = $empleados->with('cargo', 'genero')->paginate(8);

        return inertia("Empleado/Index", [
            'empleados' => $empleados,
            'prop_search' => $search,
            'prop_date_from' => $date_from,
            'prop_date_to' => $date_to
        ]);
    }

    public function create()
    {
        $cargos = Cargo::all();
        $generos = Genero::all();
        return inertia("Empleado/Create", compact('cargos', 'generos'));
    }


    public function store(StoreRequest $request)
    {
        Empleado::create($request->validated());
        return to_route('empleado.index')->with('message', 'REGISTRO CREADO!');
    }


    public function show(Empleado $empleado)
    {
        //
    }


    public function edit(Empleado $empleado)
    {
        $cargos = Cargo::all();
        $generos = Genero::all();
        return inertia('Empleado/Edit', compact('empleado', 'cargos', 'generos'));
    }

    public function update(UpdateRequest $request, Empleado $empleado)
    {
        $empleado->update($request->validated());

        return to_route('empleado.index')->with('message', 'REGISTRO ACTUALIZADO!');
    }

    public function destroy(Empleado $empleado)
    {
        //
    }
}

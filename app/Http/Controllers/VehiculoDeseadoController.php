<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculoDeseadoRequest;
use App\Models\VehiculoDeseado;
use Illuminate\Support\Facades\Auth;

class VehiculoDeseadoController extends Controller
{
    public function index()
    {
        return view('vistas.deseados.index', [
            'deseados' => VehiculoDeseado::where('eliminado', false)
                ->where('usuario_id', Auth::id())
                ->get(),
        ]);
    }

    public function create()
    {
        return view('vistas.deseados.create');
    }

    public function store(VehiculoDeseadoRequest $request)
    {
        $deseado = new VehiculoDeseado();
        $deseado->nombre = $request['nombre'];
        $deseado->codigo = $request['codigo'];
        $deseado->marca = $request['marca'];
        $deseado->serie = $request['serie'];
        $deseado->usuario_id = Auth::id();
        $deseado->save();

        return redirect('deseados')->with(['message' => 'Vehículo deseado agregado exitosamente.']);
    }

    public function edit($id)
    {
        return view('vistas.deseados.edit', [
            'deseado' => VehiculoDeseado::findOrFail($id),
        ]);
    }

    public function update(VehiculoDeseadoRequest $request, $id)
    {
        $deseado = VehiculoDeseado::findOrFail($id);
        $deseado->nombre = $request['nombre'];
        $deseado->codigo = $request['codigo'];
        $deseado->marca = $request['marca'];
        $deseado->serie = $request['serie'];
        $deseado->update();

        return redirect('deseados')->with(['message' => 'Vehículo deseado actualizado exitosamente.']);
    }

    public function destroy($id)
    {
        $deseado = VehiculoDeseado::findOrFail($id);
        $deseado->eliminado = true;
        $deseado->save();

        return redirect('deseados')->with(['message' => 'Vehículo deseado eliminado exitosamente.']);
    }
}

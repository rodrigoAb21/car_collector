<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculoRequest;
use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Serie;
use Illuminate\Support\Facades\Auth;

class VehiculoController extends Controller
{
    public function index()
    {
        $usuarioId = Auth::id();

        return view('vistas.vehiculos.index', [
            'vehiculos' => Vehiculo::where('eliminado', false)
                ->where('usuario_id', $usuarioId)
                ->orderBy('nombre')
                ->get(),
        ]);
    }

    public function create()
    {
        $usuarioId = Auth::id();
        $marcas = Marca::where('eliminado', false)
            ->where('usuario_id', $usuarioId)
            ->orderBy('nombre')
            ->get();

        $series = Serie::where('eliminado', false)
            ->where('usuario_id', $usuarioId)
            ->orderBy('nombre')
            ->get();

        return view('vistas.vehiculos.create', [
            'marcas' => $marcas,
            'series' => $series,
        ]);
    }

    public function store(VehiculoRequest $request)
    {
        $vehiculo = new Vehiculo();
        $vehiculo->nombre = strtoupper($request['nombre']);
        $vehiculo->codigo = strtoupper($request['codigo']);
        $vehiculo->marca_id = $request['marca_id'];
        $vehiculo->serie_id = $request['serie_id'];
        $vehiculo->usuario_id = Auth::id();
        $vehiculo->save();

        return redirect('vehiculos')->with(['message' => 'Vehículo creado exitosamente.']);
    }

    public function edit($id)
    {
        $usuarioId = Auth::id();
        $vehiculo = Vehiculo::findOrFail($id);

        $marcas = Marca::where('eliminado', false)
            ->where('usuario_id', $usuarioId)
            ->orderBy('nombre')
            ->get();

        $series = Serie::where('eliminado', false)
            ->where('usuario_id', $usuarioId)
            ->orderBy('nombre')
            ->get();

        return view('vistas.vehiculos.edit', [
            'vehiculo' => $vehiculo,
            'marcas' => $marcas,
            'series' => $series,
        ]);
    }

    public function update(VehiculoRequest $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->nombre = strtoupper($request['nombre']);
        $vehiculo->codigo = strtoupper($request['codigo']);
        $vehiculo->marca_id = $request['marca_id'];
        $vehiculo->serie_id = $request['serie_id'];
        $vehiculo->save();

        return redirect('vehiculos')->with(['message' => 'Vehículo editado exitosamente.']);
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->eliminado = true; // Marcar como eliminado
        $vehiculo->save();

        return redirect('vehiculos')->with(['message' => 'Vehículo eliminado exitosamente.']);
    }
}

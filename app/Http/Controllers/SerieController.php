<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieRequest;
use App\Models\Serie;
use App\Models\Marca; // Importar el modelo Marca
use Illuminate\Support\Facades\Auth;

class SerieController extends Controller
{
    public function index()
    {
        $usuarioId = Auth::id();

        return view('vistas.series.index', [
            'series' => Serie::where('eliminado', false)
                ->where('usuario_id', $usuarioId)
                ->get(),
        ]);
    }

    public function create()
    {
        $usuarioId = Auth::id();
        $marcas = Marca::where('eliminado', false)
            ->where('usuario_id', $usuarioId)
            ->get(); // Obtener marcas del usuario autenticado

        return view('vistas.series.create', [
            'marcas' => $marcas,
        ]);
    }

    public function store(SerieRequest $request)
    {
        $serie = new Serie();
        $serie->nombre = $request['nombre'];
        $serie->marca_id = $request['marca_id'];
        $serie->usuario_id = Auth::id(); // Asignar usuario autenticado
        $serie->eliminado = $request['eliminado'] ?? 0;
        $serie->save();

        return redirect('series')->with(['message' => 'Serie creada exitosamente.']);
    }

    public function edit($id)
    {
        $usuarioId = Auth::id();
        $marcas = Marca::where('eliminado', false)
            ->where('usuario_id', $usuarioId)
            ->get(); // Obtener marcas del usuario autenticado

        return view('vistas.series.edit', [
            'serie' => Serie::findOrFail($id),
            'marcas' => $marcas,
        ]);
    }

    public function update(SerieRequest $request, $id)
    {
        $serie = Serie::findOrFail($id);
        $serie->nombre = $request['nombre'];
        $serie->marca_id = $request['marca_id'];
        $serie->eliminado = $request['eliminado'] ?? 0;
        $serie->save();

        return redirect('series')->with(['message' => 'Serie editada exitosamente.']);
    }

    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        $serie->eliminado = true; // Marcar como eliminado
        $serie->save();

        return redirect('series')->with(['message' => 'Serie eliminada exitosamente.']);
    }
}

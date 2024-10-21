<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaRequest;
use App\Models\Marca;
use Illuminate\Support\Facades\Auth;

class MarcaController extends Controller
{
    public function index()
    {
        $usuarioId = Auth::id();

        return view('vistas.marcas.index', [
            'marcas' => Marca::where('eliminado', false)
                ->where('usuario_id', $usuarioId)
                ->get(),
        ]);
    }

    public function create()
    {
        return view('vistas.marcas.create');
    }

    public function store(MarcaRequest $request)
    {
        $marca = new Marca();
        $marca->nombre = $request['nombre'];
        $marca->usuario_id = Auth::id();
        $marca->save();

        return redirect('marcas')->with(['message' => 'Marca creada exitosamente.']);
    }

    public function edit($id)
    {
        return view('vistas.marcas.edit', [
            'marca' => Marca::findOrFail($id),
        ]);
    }

    public function update(MarcaRequest $request, $id)
    {
        $marca = Marca::findOrFail($id);
        $marca->nombre = $request['nombre'];
        $marca->save();

        return redirect('marcas')->with(['message' => 'Marca editada exitosamente.']);
    }

    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);
        $marca->eliminado = true; // Marcar como eliminado
        $marca->save();

        return redirect('marcas')->with(['message' => 'Marca eliminada exitosamente.']);
    }
}

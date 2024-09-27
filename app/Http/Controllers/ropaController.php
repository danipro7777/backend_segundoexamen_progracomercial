<?php

namespace App\Http\Controllers;

use App\Models\ropa;
use Illuminate\Http\Request;

class ropaController extends Controller
{
    // GET ALL
    public function getAll()
    {
        $ropas = ropa::all();
        return response()->json($ropas);
    }

    // GET BY ID
    public function getbyId($id)
    {
        $ropa = ropa::find($id);

        if (!$ropa) {
            return response()->json(['message' => 'Prenda no encontrada.'], 404);
        }

        return response()->json($ropa);
    }

    // CREATE
    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'marca' => 'required',
            'talla' => 'required',
            'color' => 'required',
            'precio' => 'required|numeric',
            'existencia' => 'required|integer',
            'estado' => 'required|integer'
        ]);

        $ropa = ropa::create($request->all());

        return response()->json([
            'message' => 'Prenda creada exitosamente.',
            'ropa' => $ropa
        ], 201);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $ropa = ropa::find($id);

        if (!$ropa) {
            return response()->json(['message' => 'Prenda no encontrada.'], 404);
        }

        $request->validate([
            'nombre' => 'nullable|string',
            'marca' => 'nullable|string',
            'talla' => 'nullable|string',
            'color' => 'nullable|string',
            'precio' => 'nullable|numeric',
            'existencia' => 'nullable|integer',
            'estado' => 'nullable|integer',
        ]);

        $ropa->fill($request->only(['nombre', 'marca', 'talla', 'color', 'precio', 'existencia', 'estado']));

        $ropa->save();

        return response()->json([
            'message' => 'Ropa actualizada exitosamente.',
            'ropa' => $ropa
        ]);
    }



    // DELETE
    public function delete($id)
    {
        $ropa = ropa::find($id);

        if (!$ropa) {
            return response()->json(['message' => 'Prenda no encontrada.'], 404);
        }

        $ropa->delete();

        return response()->json(['message' => 'Prenda eliminada exitosamente.']);
    }
}
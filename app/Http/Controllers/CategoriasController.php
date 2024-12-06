<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * @return \Iluminate\Http\Response
     */
    public function index()
    {
        return Categoria::all();
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Iluminate\Http\Resquest
     * @return \Iluminate\Http\Response
     */


     public function show($id)
     {
         $categoria = Categoria::find($id);
     
         if (!$categoria) {
             return response()->json(['error' => 'Categoría no encontrada'], 404);
         }
     
         return response()->json($categoria, 200);
     }

    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return response()->json($categoria, 201);
    }
    
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->save();
        return response()->json($categoria, 200);
    }
    
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
    
        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }
    
        if ($categoria->productos()->exists()) {
            return response()->json(['error' => 'No se puede eliminar la categoría porque tiene productos asociados'], 400);
        }
    
        $categoria->delete();
        return response()->json(['message' => 'Categoría eliminada correctamente'], 200);
    }
    
    
}

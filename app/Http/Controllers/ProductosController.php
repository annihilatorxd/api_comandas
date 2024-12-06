<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * 
     */

     public function show($id)
     {
         $producto = Producto::find($id);
     
         if (!$producto) {
             return response()->json(['error' => 'Producto no encontrado'], 404);
         }
     
         $producto->load('categoria'); 
     
         return response()->json($producto, 200);
     }
     

    public function index()
    {
        $productos = Producto::all();
        foreach($productos as $producto){
            $producto->load('categoria');
        }
        return $productos;
        
    }

    
    public function store(Request $request)
{
    $producto = new Producto();
    $producto->nombre = $request->nombre;
    $producto->ingredientes = $request->ingredientes;
    $producto->precio = $request->precio;
    $producto->categoria_id = $request->categoria_id;
    $producto->save();
    return response()->json($producto, 201);
}

public function update(Request $request, $id)
{
    $producto = Producto::findOrFail($id);
    $producto->nombre = $request->nombre;
    $producto->ingredientes = $request->ingredientes;
    $producto->precio = $request->precio;
    $producto->categoria_id = $request->categoria_id;
    $producto->save();
    return response()->json($producto, 200);
}

public function destroy($id)
{
    $producto = Producto::find($id);

    if (!$producto) {
        return response()->json(['error' => 'Producto no encontrado'], 404);
    }

    $producto->delete();

    return response()->json(['message' => 'Producto eliminado correctamente'], 200);
}






}

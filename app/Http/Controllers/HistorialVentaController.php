<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistorialVenta; 

class HistorialVentaController extends Controller
{
    
    public function index()
    {
        
        return HistorialVenta::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'productos' => 'required',
            'monto_total' => 'required|numeric',
            'fecha_compra' => 'required|date',
        ]);

        $historialVenta = HistorialVenta::create([
            'productos' => $request->productos,
            'monto_total' => $request->monto_total,
            'fecha_compra' => $request->fecha_compra,
        ]);

        return response()->json($historialVenta, 201); 
    }

    
}

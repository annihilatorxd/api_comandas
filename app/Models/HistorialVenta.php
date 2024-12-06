<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialVenta extends Model
{
    use HasFactory;

    protected $table = 'historial_ventas'; 
    protected $fillable = ['productos', 'monto_total', 'fecha_compra']; 
}

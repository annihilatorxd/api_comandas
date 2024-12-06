<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    public $timestamps = false;
    protected $primaryKey = 'id_producto'; 
    protected $keyType = 'int'; 
    public $incrementing = true; 
    public function Categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}


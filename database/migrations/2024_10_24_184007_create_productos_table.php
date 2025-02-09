<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto'); 
            $table->string('nombre',50);
            $table->string('ingredientes',100);
            $table->unsignedInteger('precio'); 
            $table-> unsignedBigInteger ('categoria_id'); 
            $table-> foreign ('categoria_id')->references('id')-> on('categorias'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

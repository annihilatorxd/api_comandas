<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('historial_ventas', function (Blueprint $table) {
            $table->id();
            $table->text('productos'); 
            $table->unsignedInteger('monto_total'); 
            $table->dateTime('fecha_compra'); 
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('historial_ventas');
    }
};

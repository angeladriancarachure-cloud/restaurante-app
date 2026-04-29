<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('mesas', function (Blueprint $table) {
            $table->increments('id_mesa');
            $table->unsignedInteger('numero_mesa');
            $table->integer('capacidad');
            $table->enum('ubicacion', ['Interior','Terraza','VIP','Barra']);
            $table->enum('estado', ['Libre','Ocupada','Reservada','Mantenimiento'])->default('Libre');
        });
    }
    public function down(): void { Schema::dropIfExists('mesas'); }
};

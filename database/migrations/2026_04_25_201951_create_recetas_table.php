<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('recetas', function (Blueprint $table) {
            $table->increments('id_receta');
            $table->unsignedInteger('id_platillo');
            $table->unsignedInteger('id_producto');
            $table->decimal('cantidad_necesaria', 10, 2);
            $table->enum('unidad_medida', ['kg','g','L','ml','pza','caja']);
        });
    }
    public function down(): void { Schema::dropIfExists('recetas'); }
};

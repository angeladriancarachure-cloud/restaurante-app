<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id_producto');
            $table->string('nombre_producto', 100);
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('id_categoria')->nullable();
            $table->enum('unidad_medida', ['kg','g','L','ml','pza','caja']);
            $table->integer('stock_actual')->default(0);
            $table->integer('stock_minimo')->default(0);
            $table->decimal('precio_unitario', 10, 2)->nullable();
            $table->unsignedInteger('id_proveedor')->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
        });
    }
    public function down(): void { Schema::dropIfExists('productos'); }
};

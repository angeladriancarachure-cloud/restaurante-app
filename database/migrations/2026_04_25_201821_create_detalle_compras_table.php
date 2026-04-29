<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->increments('id_detalle_compra');
            $table->unsignedInteger('id_compra');
            $table->unsignedInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);
        });
    }
    public function down(): void { Schema::dropIfExists('detalle_compras'); }
};

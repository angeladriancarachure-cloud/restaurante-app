<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detalle_ordenes', function (Blueprint $table) {
            $table->increments('id_detalle_orden');
            $table->unsignedInteger('id_orden');
            $table->unsignedInteger('id_platillo');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->text('notas_especiales')->nullable();
        });
    }
    public function down(): void { Schema::dropIfExists('detalle_ordenes'); }
};

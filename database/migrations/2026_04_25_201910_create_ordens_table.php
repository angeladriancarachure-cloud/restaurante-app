<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->increments('id_orden');
            $table->unsignedInteger('id_mesa')->nullable();
            $table->unsignedInteger('id_cliente')->nullable();
            $table->dateTime('fecha_orden')->useCurrent();
            $table->enum('tipo_orden', ['Para comer aquí','Para llevar','Delivery']);
            $table->enum('estado', ['En preparación','Lista','Entregada','Cancelada'])->default('En preparación');
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->decimal('impuestos', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->enum('metodo_pago', ['Efectivo','Tarjeta','Transferencia'])->nullable();
            $table->tinyInteger('pagado')->default(0);
            $table->text('notas')->nullable();
        });
    }
    public function down(): void { Schema::dropIfExists('ordenes'); }
};

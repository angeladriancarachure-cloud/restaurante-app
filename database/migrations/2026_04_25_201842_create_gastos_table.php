<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('gastos', function (Blueprint $table) {
            $table->increments('id_gasto');
            $table->string('concepto', 100);
            $table->text('descripcion')->nullable();
            $table->decimal('monto', 10, 2);
            $table->enum('categoria', ['Servicios','Mantenimiento','Sueldos','Compras','Otros']);
            $table->date('fecha_gasto');
            $table->unsignedInteger('id_empleado')->nullable();
            $table->string('comprobante_url', 255)->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
        });
    }
    public function down(): void { Schema::dropIfExists('gastos'); }
};

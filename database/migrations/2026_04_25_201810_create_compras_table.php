<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id_compra');
            $table->unsignedInteger('id_proveedor');
            $table->date('fecha_compra');
            $table->decimal('total', 10, 2);
            $table->unsignedInteger('id_empleado')->nullable();
            $table->text('notas')->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
        });
    }
    public function down(): void { Schema::dropIfExists('compras'); }
};

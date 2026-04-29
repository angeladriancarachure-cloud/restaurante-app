<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id_proveedor');
            $table->string('nombre_empresa', 100);
            $table->string('contacto', 100)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->text('direccion')->nullable();
            $table->string('email', 100)->nullable();
            $table->text('notas')->nullable();
            $table->string('rfc', 13)->nullable();
            $table->tinyInteger('activo')->default(1);
            $table->timestamp('fecha_registro')->useCurrent();
        });
    }
    public function down(): void { Schema::dropIfExists('proveedores'); }
};

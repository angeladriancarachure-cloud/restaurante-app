<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('nombre', 100);
            $table->string('apellido', 100)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('email', 100)->nullable()->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('puntos_lealtad')->default(0);
            $table->timestamp('fecha_registro')->useCurrent();
        });
    }
    public function down(): void { Schema::dropIfExists('clientes'); }
};

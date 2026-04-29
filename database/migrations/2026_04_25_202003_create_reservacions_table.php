<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->increments('id_reservacion');
            $table->unsignedInteger('id_cliente');
            $table->unsignedInteger('id_mesa')->nullable();
            $table->date('fecha_reservacion');
            $table->time('hora_reservacion');
            $table->integer('numero_personas');
            $table->enum('estado', ['Confirmada','Cancelada','Completada','No Show'])->default('Confirmada');
            $table->text('notas')->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
        });
    }
    public function down(): void { Schema::dropIfExists('reservaciones'); }
};

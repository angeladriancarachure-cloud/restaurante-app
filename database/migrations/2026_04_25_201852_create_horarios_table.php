<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id_horario');
            $table->unsignedInteger('id_empleado');
            $table->enum('dia_semana', ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo']);
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->tinyInteger('activo')->default(1);
        });
    }
    public function down(): void { Schema::dropIfExists('horarios'); }
};

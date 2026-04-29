<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('platillos', function (Blueprint $table) {
            $table->increments('id_platillo');
            $table->string('nombre_platillo', 100);
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('id_categoria_platillo')->nullable();
            $table->decimal('precio', 10, 2);
            $table->integer('tiempo_preparacion')->nullable();
            $table->tinyInteger('disponible')->default(1);
            $table->string('imagen_url', 255)->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
        });
    }
    public function down(): void { Schema::dropIfExists('platillos'); }
};

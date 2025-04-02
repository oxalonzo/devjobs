<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            //aqui para agregar las columnas a la tabla de vacantes
            //recuerda string es un varchar mientras que text es para un texto mas grande
            $table->string('titulo');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('empresa');
            $table->date('ultimo_dia');
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            //aqui como la tabla ya esta creada en este caso y le estoy agregando columnnas nuevas el down tiene que especificar columna por columna 
            
            //esto es porque como se creo una relacion en esta columna trate de eliminarla pero primero tengo que eliminar la relacion antes del dropcolumn
            
            $table->dropForeign(['user_id']);
            $table->dropForeign(['salario_id']);
            $table->dropForeign(['categoria_id']);
            //elimina las columnas
            $table->dropColumn(['titulo', 'salario_id', 'categoria_id', 'empresa', 'ultimo_dia', 'descripcion', 'imagen', 'publicado', 'user_id']);
            
        });
    }
};

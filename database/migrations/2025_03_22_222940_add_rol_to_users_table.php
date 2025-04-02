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
        Schema::table('users', function (Blueprint $table) {
            //una migracion para agregar la columna rol a la tabla users 
            $table->integer('rol'); //1 = dev 2 = recruiter integer lo que die es que sera numero entero
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //elimina la columna de rol 
            $table->dropColumn('rol');
        });
    }
};

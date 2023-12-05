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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->unsignedBigInteger('id_persona');  
            $table->string('usuario')->unique();
            $table->integer('habilitado');
            $table->date('fecha');
            $table->unsignedBigInteger('id_rol');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_persona')->references('id_persona')->on('personas');
            $table->foreign('id_rol')->references('id_rol')->on('rols'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_persona']); 
            $table->dropForeign(['id_rol']); 
            //$table->dropColumn('perfil_id'); // Elimina la columna de la llave foránea
        });
        Schema::dropIfExists('users');
    }
};

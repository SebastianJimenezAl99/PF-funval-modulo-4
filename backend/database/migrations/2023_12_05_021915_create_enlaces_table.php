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
        Schema::create('enlaces', function (Blueprint $table) {
            $table->id('id_enlase');
            $table->string('descripcion');
            $table->unsignedBigInteger('id_pagina');
            $table->unsignedBigInteger('id_rol');  
            $table->timestamps();

            $table->foreign('id_pagina')->references('id_pagina')->on('paginas');
            $table->foreign('id_rol')->references('id_rol')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('enlaces', function (Blueprint $table) {
            $table->dropForeign(['id_pagina']); 
            $table->dropForeign(['id_rol']); 
            //$table->dropColumn('perfil_id'); // Elimina la columna de la llave foránea
        });
        Schema::dropIfExists('enlaces');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ovas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('idioma');
            $table->string('palabras_Clave');
            $table->string('autor');
            $table->string('entidad');
            $table->string('version');
            $table->date('fecha');
            $table->string('formato');
            $table->text('instrucciones');
            $table->text('requerimientos');
            $table->string('costo');
            $table->string('derechos');
            $table->string('uso');
            $table->foreignId('are_id')->constrained('areas')->onDelete('restrict');
            $table->foreignId('nuc_id')->constrained('nucleos')->onDelete('restrict');
            $table->foreignId('use_id')->constrained('users')->onDelete('restrict');
            $table->string('archivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ovas');
    }
}

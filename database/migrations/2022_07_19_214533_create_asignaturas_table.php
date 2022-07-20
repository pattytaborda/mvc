<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id('semestre',40);
            $table->string('nombre',50);
            $table->string('creditos',10);
            $table->string('docente',50);
            $table->string('prerrequisito',50);
            $table->string('horas_trabajo_autonomo',10);
            $table->string('Horas_trabajo_dirigido',10);
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
        Schema::dropIfExists('asignaturas');
    }
}

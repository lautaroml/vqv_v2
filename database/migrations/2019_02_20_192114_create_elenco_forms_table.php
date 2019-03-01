<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElencoFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elenco_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->text('group_name');
            $table->char('location', 255);
            $table->text('group_history');
            $table->text('ficha_de_inscripcion')->nullable();
            $table->text('obra_title')->nullable();
            $table->char('obra_duration',255)->nullable();
            $table->text('sinopsis_2');
            $table->char('director',255)->nullable();
            $table->char('autor',255)->nullable();
            $table->char('video_duration',255)->nullable();
            $table->text('video_link')->nullable();
            $table->text('photos_link')->nullable();
            $table->text('planta_de_luces')->nullable();
            $table->text('sonido')->nullable();
            $table->text('proyector')->nullable();
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
        Schema::dropIfExists('elenco_forms');
    }
}
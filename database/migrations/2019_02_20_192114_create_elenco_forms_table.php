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
            $table->text('ficha_de_inscripcion');
            $table->text('obra_title');
            $table->char('obra_duration',255);
            $table->text('sinopsis_2');
            $table->char('director',255);
            $table->char('autor',255);
            $table->char('video_duration',255);
            $table->text('video_link');
            $table->text('photos_link');
            $table->text('planta_de_luces');
            $table->text('sonido');
            $table->text('proyector');
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
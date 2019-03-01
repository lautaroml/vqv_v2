<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnElencoFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('elenco_forms', function($table)
        {
            $table->text('otros_requerimientos')->nullable();
            $table->text('adulto_responsable');
            $table->text('adulto_responsable_dni');
            $table->text('adulto_responsable_relacion');
            $table->text('adulto_responsable_telefono');
            $table->text('adulto_responsable_email');
            $table->text('lo_que_mas_me_gusta')->nullable();
            $table->text('momento_especial')->nullable();
            $table->text('como_se_enteraron')->nullable();
            $table->text('estrategia_de_viaje')->nullable();
            $table->boolean('bases')->default(0)->nullable();
            $table->unsignedInteger('user_id')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('elenco_forms', function($table)
        {
            $table->dropColumn('sinopsis');
        });
    }
}

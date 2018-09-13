<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table)
        {
            /*$table->string('last_name');
            $table->string('document');
            $table->integer('age');
            $table->date('birthday');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('state_id');
            $table->string('elenco');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('users', function($table)
        {
            $table->dropColumn('new_col_name');
        });*/
    }
}

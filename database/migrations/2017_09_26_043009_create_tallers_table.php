<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTallersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tallers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('professor');
            /*$table->integer('day_one');
            $table->integer('day_two');
            $table->integer('day_three');*/
            $table->integer('cupo');

            $table->char('disponibility', 250);

            $table->unsignedInteger('inscription_id');
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
        Schema::dropIfExists('tallers');
    }
}

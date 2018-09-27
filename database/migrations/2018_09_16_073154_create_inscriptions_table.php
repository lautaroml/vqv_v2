<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->char('title', 255)->unique();
            $table->char('slug', 255)->unique();
            $table->text('description')->nullable();
            $table->integer('min_age')->default(0);
            $table->integer('max_age')->default(100);
            $table->integer('max_subscriptions');
            $table->boolean('status')->default(0);
            $table->char('disponibility', 255);
            $table->dateTimeTz('available_from')->nullable();
            $table->dateTimeTz('available_to')->nullable();
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
        Schema::dropIfExists('inscriptions');
    }
}

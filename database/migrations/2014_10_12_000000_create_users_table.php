<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('type')->default(0);
            $table->string('document');
            $table->integer('age');
            $table->date('birthday');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('state_id');
            $table->string('elenco');
            $table->string('other_state')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

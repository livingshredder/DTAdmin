<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Members extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('members', function(Blueprint $table) {
          $table->increments('id');
          $table->string('user', 30);
          $table->string('password', 255);
          $table->string('remember_token', 100);
          $table->string('permissionlevel', 30);
          $table->string('firstname', 30);
          $table->string('lastname', 30);
          $table->string('email', 40);
          $table->boolean('disabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('members');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLngTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
            Schema::create('user_lng', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('lng',2);
            $table->string('name');
            $table->string('cim');
            $table->string('intro');
            $table->text('txt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('user_lng');
    }
  }

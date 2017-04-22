<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMediaLngTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('user_media_lng', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_media_id');
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
       Schema::dropIfExists('user_media_lng');
    }
  }

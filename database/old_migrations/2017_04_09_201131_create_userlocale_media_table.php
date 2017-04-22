<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserlocaleMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
            Schema::create('userlocale_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userlocale_id');
            $table->string('tip',10);
            $table->string('src');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('userlocale_media');
    }
  }
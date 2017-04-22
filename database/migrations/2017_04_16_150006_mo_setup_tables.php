<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ikon')->nullable();
            $table->string('memo')->nullable();

			//$table->primary(['user_id']);
        });

        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso3')->nullable();
            $table->string('iso2');
            $table->string('name');
           $table->string('flag')->nullable();
        });
 Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso2');
            $table->string('iso3')->nullable();
            $table->string('name');
             $table->string('flag')->nullable();
           
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('languages');
 Schema::dropIfExists('contacts');
 Schema::dropIfExists('countries');

    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlacesSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           
            Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('friends_id');
            $table->integer('country_id');
            $table->decimal('lat',17,14);
            $table->decimal('long',17,14);
            $table->timestamps('created_at');
    
        });
           
           Schema::create('places_lng', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('places_id');
            $table->string('lng',2);
            $table->string('name');
            $table->string('intro');
            $table->text('txt');
        });

            Schema::create('places_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('places_id');
            $table->string('tip',10);
            $table->string('src');
        });


           Schema::create('places_media_lng', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('places_media_id');
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
        //
    }
}

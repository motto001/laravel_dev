<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MomediaSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        	if (!Schema::hasTable('medias')) {
		Schema::create('medias', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			//könyvtárszerkezetet helyettesít
            $table->integer('mediacat_id')->unsigned();
			//video image stb
			$table->string('tip',20)->nullable();
			$table->string('src');
            $table->integer('pub')->default(0);
            $table->string('licence')->nullable();
			//hash kód duplikációk kiszűrésére
            $table->string('hash')->nullable();
            $table->timestamps();
			$table->softDeletes();
			$table->foreign('user_id')->references('id')->on('users')
			->onUpdate('cascade')->onDelete('cascade');
				$table->foreign('mediacat_id')->references('id')->on('mediacats')
			->onUpdate('cascade')->onDelete('cascade');
			
			//$table->primary(['friend_id']);
		});
     } 

	if (!Schema::hasTable('mediaslng')) {
		Schema::create('mediaslng', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('media_id')->unsigned();
		    $table->string('lang',2);
			$table->string('name');
			$table->string('cim')->nullable();
            $table->string('label')->nullable();
			$table->string('intro')->nullable();
			$table->text('txt')->nullable();
			
			$table->foreign('media_id')->references('id')->on('medias')
			->onUpdate('cascade')->onDelete('cascade');
		
			
			//$table->primary(['friendmedia_id','languages_id']);
			
		}
			);}
	if (!Schema::hasTable('gallery_media')) {
		Schema::create('gallery_media', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('media_id')->unsigned();
            $table->integer('gallery_id')->unsigned();
            $table->integer('pub')->default('0');
            $table->integer('order')->default('110');
            $table->timestamps();
			$table->foreign('media_id')->references('id')->on('medias')
			->onUpdate('cascade')->onDelete('cascade');
				$table->foreign('gallery_id')->references('id')->on('galleries')
			->onUpdate('cascade')->onDelete('cascade');
			
			//$table->primary(['friend_id']);
		});

    }
	if (!Schema::hasTable('galleries')) {
		Schema::create('galleries', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('mediacat_id')->unsigned();
			$table->string('image')->nullable();
            $table->integer('pub')->default('0');
            $table->integer('order')->default('110');
            $table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')
			->onUpdate('cascade')->onDelete('cascade');
				$table->foreign('mediacat_id')->references('id')->on('mediacats')
			->onUpdate('cascade')->onDelete('cascade');
			
			//$table->primary(['friend_id']);
		});

    }
	if (!Schema::hasTable('mediacats')) {
		Schema::create('mediacats', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id')->unsigned();
			$table->string('image')->nullable();
            $table->integer('pub')->default('0');
            $table->integer('order')->default('110');
            $table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')
			->onUpdate('cascade')->onDelete('cascade');

			//$table->primary(['friend_id']);
		});

    }
if (!Schema::hasTable('mediacatslng')) {
		Schema::create('mediacatslng', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('mediacat_id')->unsigned();
             $table->string('lang',2);
			$table->string('name');
			$table->string('cim')->nullable();
            $table->string('label')->nullable();
			$table->string('intro')->nullable();
		
			//$table->text('txt');
            $table->timestamps();
			$table->foreign('mediacat_id')->references('id')->on('mediacats')
			->onUpdate('cascade')->onDelete('cascade');
			
			
			//$table->primary(['friend_id']);
		});
}
if (!Schema::hasTable('gallerieslng')) {
		Schema::create('gallerieslng', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('gallery_id')->unsigned();
             $table->string('lang',2);
			$table->string('name');
			$table->string('cim')->nullable();
            $table->string('label')->nullable();
			$table->string('intro')->nullable();
			//$table->text('txt');
            $table->timestamps();
			$table->foreign('gallery_id')->references('id')->on('galleries')
			->onUpdate('cascade')->onDelete('cascade');
			
			
			//$table->primary(['friend_id']);
		});
}

}

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medias');
        Schema::drop('mediaslng');
		Schema::drop('media_gallery');
		Schema::drop('gallerieslng');
		Schema::drop('galleries');
    }
}

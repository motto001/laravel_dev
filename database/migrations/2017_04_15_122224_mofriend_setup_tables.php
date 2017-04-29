<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MofriendSetupTables extends Migration
{
	
	/**
	* @return  void
		*/
	public function up()
	{
	if (!Schema::hasTable('friends')) {	
		Schema::create('friends', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('foto');
			$table->integer('pub');
			$table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users')
			->onUpdate('cascade')->onDelete('cascade');
			
			//$table->primary(['user_id']);
			
		}
		);}
	if (!Schema::hasTable('friendslng')) {	
		Schema::create('friendslng', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('friend_id')->unsigned();
			$table->string('lang')->default('hu');
			$table->string('name');
			$table->string('cim')->nullable();
			$table->string('intro')->nullable();
			$table->text('txt')->nullable();
			
			$table->foreign('friend_id')->references('id')->on('friends')
			->onUpdate('cascade')->onDelete('cascade');
		/*	$table->foreign('languages_id')->references('id')->on('languages')
			 ->onUpdate('cascade')->onDelete('cascade');*/
			
			//$table->primary(['friend_id','languages_id']);
			
		}
			);}

		if (!Schema::hasTable('friend_media')) {
		Schema::create('friend_media', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('media_id')->unsigned();
			$table->integer('friend_id')->unsigned();
			$table->integer('order')->default(100);
			$table->foreign('friend_id')->references('id')->on('friends')
			->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('media_id')->references('id')->on('medias')
			->onUpdate('cascade')->onDelete('cascade');
			
			//$table->primary(['friend_id']);
		}
			);}
	
		
	}
	
	public function down()
	{
		Schema::drop('friends');	
		Schema::drop('friendlng');
		Schema::drop('friend_languages');	
		Schema::drop('friend_media');			    
	
	}
}

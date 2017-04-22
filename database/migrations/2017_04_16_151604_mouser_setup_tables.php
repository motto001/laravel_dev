<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MouserSetupTables extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        //pivot elérhetőségeket kapcsol felhasználókhoz skype plusz email stb
        //az elérhetőségek paraméterei név ikon a contacts táblában van
          Schema::create('users_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->string('val');
            $table->string('memo')->nullable();

            	$table->foreign('user_id')->references('id')->on('users')
			    ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('contact_id')->references('id')->on('contacts')
			    ->onUpdate('cascade')->onDelete('cascade');
			
			//$table->primary(['user_id']);
        });
;


		if (!Schema::hasTable('userspeaks')) {
		Schema::create('userspeaks', function (Blueprint $table) {
			$table->integer('user_id')->unsigned();
			 $table->string('lang',2);
			$table->string('grade',10);
			$table->foreign('user_id')->references('id')->on('users')
			->onUpdate('cascade')->onDelete('cascade');
			
			
			//$table->primary(['friend_id','languages_id']);
		}
			);}



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('users'); 
       Schema::dropIfExists('userspeaks');  
       Schema::dropIfExists('users_contact');
    }
}

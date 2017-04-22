<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserlocaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('userlocale', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('country_id');
            $table->decimal('lat',17,14);
            $table->decimal('long',17,14);
            $table->timestamps('created_at');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('userlocale');
    }
}

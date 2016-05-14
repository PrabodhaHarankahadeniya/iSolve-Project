<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlourstockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flourstock', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->String('Type');
            $table->bigInteger('QuantityinKg');
            $table->rememberToken();
        });//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flourstock');
    }
}

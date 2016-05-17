<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('customer_id')->unsigned()->index();
            $table->date('date');
            $table->integer('number_of_items');
            $table->string('transaction_method');
            $table->double('cash_amount');
            $table->double('total_price');
            $table->boolean('settle_status');
            $table->boolean('is_rice');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}

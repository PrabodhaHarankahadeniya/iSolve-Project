<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('supplier_id')->unsigned()->index();
            $table->date('date');
            $table->string('purchase_item');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->string('transaction_method');
            $table->integer('cash_amount');
            $table->boolean('is_paddy');
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
        Schema::drop('purchases');
    }
}

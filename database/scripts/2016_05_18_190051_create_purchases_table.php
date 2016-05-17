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
            $table->double('unit_price');
            $table->string('transaction_method');
            $table->double('total_price');
            $table->double('cash_amount');
            $table->boolean('is_paddy');
            $table->boolean('settle_status');
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

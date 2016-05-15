<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheques', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('purchase_id')->unsigned()->index();
            $table->integer('cheque_no');
            $table->integer('amount');
            $table->string('bank');
            $table->string('branch');
            $table->date('date');
            $table->date('due_date');
            $table->boolean('payable_status');
            $table->boolean('settled_status');
            $table->boolean('returned_status');
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
        Schema::drop('cheques');
    }
}

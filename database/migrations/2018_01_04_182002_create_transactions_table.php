<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total_transaction');
            $table->integer('type_transaction_id')->unsigned();
            $table->integer('lend_id')->unsigned();
            $table->integer('bank_account_id_from')->unsigned();
            $table->integer('bank_account_id_to')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('type_transaction_id')->references('id')->on('type_transactions');
            $table->foreign('lend_id')->references('id')->on('lends');
            $table->foreign('bank_account_id_from')->references('id')->on('bank_accounts');
            $table->foreign('bank_account_id_to')->references('id')->on('bank_accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}

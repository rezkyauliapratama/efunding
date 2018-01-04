<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankAccountsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_number');
            $table->integer('bank_id')->unsigned();
            $table->integer('campaign_id')->unsigned();
            $table->integer('lend_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->foreign('lend_id')->references('id')->on('lends');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bank_accounts');
    }
}

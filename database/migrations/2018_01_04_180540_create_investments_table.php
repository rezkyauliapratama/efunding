<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvestmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total_investment');
            $table->integer('lend_id')->unsigned();
            $table->integer('campaign_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('lend_id')->references('id')->on('lends');
            $table->foreign('campaign_id')->references('id')->on('campaigns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('investments');
    }
}

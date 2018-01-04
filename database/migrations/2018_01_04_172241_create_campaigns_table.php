<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estimated_return');
            $table->string('time_range', 10);
            $table->dateTime('started_at');
            $table->dateTime('deadline');
            $table->integer('target_investment');
            $table->string('description', 190);
            $table->string('long_description', 255);
            $table->string('image', 20);
            $table->integer('akad_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('borrower_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('akad_id')->references('id')->on('akads');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('borrower_id')->references('id')->on('borrowers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaigns');
    }
}

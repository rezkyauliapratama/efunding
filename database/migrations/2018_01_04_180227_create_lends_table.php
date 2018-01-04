<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLendsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->timestamp('birth_date');
            $table->string('birth_place', 20);
            $table->string('gender', 10);
            $table->string('last_education', 20);
            $table->string('married_status', 10);
            $table->string('religion', 10);
            $table->string('phone_number', 20);
            $table->string('facebook_url', 51);
            $table->string('instagram_twitter_url', 20);
            $table->string('website_url', 50);
            $table->string('address', 50);
            $table->string('identity_number', 20);
            $table->string('identity_image', 20);
            $table->string('npwp_number', 20);
            $table->string('npwp_image', 20);
            $table->string('work', 20);
            $table->string('field_work', 20);
            $table->string('heir', 20);
            $table->string('heir_phone_number', 20);
            $table->string('relation_with_heir', 20);
            $table->integer('user_id')->unsigned();
            $table->integer('identity_type_id')->unsigned();
            $table->integer('range_salary_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('sub_district_id')->unsigned();
            $table->integer('urban_village_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('identity_type_id')->references('id')->on('identity_types');
            $table->foreign('range_salary_id')->references('id')->on('range_salaries');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('sub_district_id')->references('id')->on('sub_districts');
            $table->foreign('urban_village_id')->references('id')->on('urban_villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lends');
    }
}

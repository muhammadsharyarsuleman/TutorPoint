<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->id('tutor_id');
            $table->string('tutor_username')->unique();
            $table->string('tutor_firstname');
            $table->string('tutor_lastname');
            $table->string('tutor_password');
            $table->string('tutor_phone_number');
            $table->string('tutor_year_of_experience');
            $table->string('tutor_age');
            $table->string('tutor_gender');           
            $table->string('tutor_designation');
            $table->string('tutor_prefer_location');
            $table->string('tutor_subject');
            $table->string('tutor_class');
            $table->string('tutor_qualification');
            $table->string('tutor_city_name');
            $table->string('tutor_email');
            $table->string('tutor_fees');
            $table->longText('tutor_profile_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutors');
    }
}

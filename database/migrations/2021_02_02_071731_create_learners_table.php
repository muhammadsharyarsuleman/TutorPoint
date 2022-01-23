<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learners', function (Blueprint $table) {
            $table->id('learner_id');
            $table->string('learner_username')->unique();
            $table->string('learner_firstname');
            $table->string('learner_lastname');
            $table->string('learner_password');
            $table->string('learner_phone_number');
            $table->string('learner_class');
            $table->string('learner_age');
            $table->string('learner_gender');           
            $table->string('learner_institude');
            $table->string('learner_address');
            $table->string('learner_prefer_location');
            $table->string('learner_parent_phone_number');
            $table->string('learner_city_name');
            $table->string('learner_email');
            $table->longText('learner_profile_image')->nullable();
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
        Schema::dropIfExists('learners');
    }
}

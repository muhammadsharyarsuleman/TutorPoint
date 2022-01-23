<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_ratings', function (Blueprint $table) {
            $table->id('rating_id');
            $table->foreignId('rating_tutor_id')->references('tutor_id')->on('tutors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('rating_learner_id')->references('learner_id')->on('learners')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('rating_value');
            $table->longText('Comment')->nullable();
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
        Schema::dropIfExists('tutor_ratings');
    }
}

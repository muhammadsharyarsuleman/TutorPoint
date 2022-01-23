<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learner_requests', function (Blueprint $table) {
            $table->id('request_id');
            $table->foreignId('request_tutor_id')->references('tutor_id')->on('tutors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('request_learner_id')->references('learner_id')->on('learners')->onUpdate('cascade')->onDelete('cascade');
            $table->mediumText('message')->nullable();
            $table->mediumText('reply_message')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('learner_requests');
    }
}

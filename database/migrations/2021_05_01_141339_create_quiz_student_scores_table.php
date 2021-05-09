<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizStudentScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_student_scores', function (Blueprint $table) {
            $table->integer('score');
            $table->integer('student_id')->unsigned();
            $table->integer('quiz_event_id')->unsigned();
            $table->timestamp('recorded_on');
        });

        Schema::table('quiz_student_scores', function(Blueprint $table){
            $table->foreign('student_id')->references('usr_id')->on('users');
            $table->foreign('quiz_event_id')->references('quiz_event_id')->on('quiz_events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_student_scores');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->string('question_name');
            $table->integer('question_type');
            $table->string('choices')->nullable();
            $table->string('answer')->nullable();
            $table->integer('points')->default(1);
            $table->integer('questionnaire_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('questions', function(Blueprint $table){
            $table->foreign('questionnaire_id')->references('questionnaire_id')->on('questionnaires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}

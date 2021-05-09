<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->string('class_id');
            $table->primary('class_id');
            $table->string('course_sec');
            $table->boolean('class_active');
            $table->integer('instructor_id')->unsigned();   //instructor_id comes from users table - usr_id
            $table->integer('subject_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('classes', function(Blueprint $table){
            $table->foreign('instructor_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('subject_id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}

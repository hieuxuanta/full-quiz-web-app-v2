<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->integer('usr_id')->unsigned();
            $table->bigInteger('usr_identification_numb'); // only student get identification number, if teacher -> no assign or set to 0 ???
            $table->string('full_name'); // family_name
            $table->string('ext_name')->nullable();
            $table->timestamps();
        });

        Schema::table('user_profiles', function(Blueprint $table){
            $table->foreign('usr_id')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}

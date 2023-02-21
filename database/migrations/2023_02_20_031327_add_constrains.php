<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add foreign in User from roles
        Schema::table('User', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('Role');
        });

        // add foreign in UserCourse from user, course
        Schema::table('UserCourse', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('User');
            $table->foreign('course_id')->references('id')->on('Course');
        });

        // add foreign in StudyClass from class, course
        Schema::table('StudyClass', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('Course');
        });

        // add foreign in ClassUser from class, user
        Schema::table('ClassUser', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('StudyClass');
            $table->foreign('user_id')->references('id')->on('User');
        });

        // add foreign in Record from user, game
        Schema::table('Record', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('User');
            $table->foreign('game_id')->references('id')->on('Game');
        });

        Schema::table('Game', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('User');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop foreign in User from roles
        Schema::table('User', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        // drop foreign in UserCourse from user, course
        Schema::table('UserCourse', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['course_id']);
        });

        // drop foreign in StudyClass from class, course
        Schema::table('StudyClass', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
        });

        // drop foreign in ClassUser from class, user
        Schema::table('ClassUser', function (Blueprint $table) {
            $table->dropForeign(['class_id']);
            $table->dropForeign(['user_id']);
        });

        // add foreign in Record from user, game
        Schema::table('Record', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['game_id']);
        });

        Schema::table('Game', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

    }
};

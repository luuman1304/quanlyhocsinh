<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirstMigrate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table
        Schema::defaultStringLength(191);
        Schema::create('classes', function (Blueprint $table){
            $table->increments('id');
            $table->string('class_name');
        });

        Schema::create('students', function (Blueprint $table){
            $table->increments('id');
            $table->integer('class_id');
            $table->string('full_name');
            $table->boolean('gender');
            $table->date('birthday');
            $table->string('address');
            $table->string('email')->unique();
        });

        Schema::create('scores', function (Blueprint $table){
            $table->increments('id');
            $table->integer('student_id');
            $table->boolean('semester');
            $table->integer('subject_type');
            $table->float('fifteenmin_exam_score');
            $table->float('fortyfivemin_exam_score');
        });

        Schema::create('configurations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('max_student_per_class');
            $table->integer('max_student_age');
            $table->integer('min_student_age');
            $table->float('pass_condition_score');
            $table->integer('numb_of_subject');
        });

        Schema::create('roles',function (Blueprint $table){
           $table->increments('id');
           $table->string('role_name');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop table
        Schema::dropIfExists('users');
        Schema::dropIfExists('classes');
        Schema::dropIfExists('students');
        Schema::dropIfExists('configurations');
        Schema::dropIfExists('scores');
        Schema::dropIfExists('roles');
    }
}

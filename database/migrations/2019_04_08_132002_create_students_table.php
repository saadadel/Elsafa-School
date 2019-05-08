<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->integer('level_id')->nullable();
            $table->integer('classroom')->nullable();
            $table->date('birthdate');
            $table->string('academic_year');
            $table->string('monthly_evaluation')->nullable();
            $table->string('religion')->nullable();
            $table->string('national_id');
            $table->string('parent_national_id');
            $table->string('parent_phone');
            $table->string('parent_email')->nullable();
            $table->string('parent_social_status')->nullable();
            $table->string('parent_qualification')->nullable();
            $table->string('parent_job')->nullable();
            $table->string('parent_name');
            $table->string('fees');
            $table->string('nationality');
            $table->string('residence_status');
            $table->string('section');
            $table->string('gender');
            $table->unsignedInteger('seatno')->nullable();
            $table->unsignedInteger('committeeno')->nullable();
            $table->string('enrollment_status');
            $table->date('school_enrollment_date')->nullable();
            $table->string('the_health')->nullable();
            $table->string('birthcertificate_enrollment_no')->nullable();
            $table->integer('building_num')->nullable();
            $table->string('st_name')->nullable();
            $table->string('region')->nullable();
            $table->char('city')->nullable();
            });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}

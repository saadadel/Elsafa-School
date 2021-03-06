<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('national_id');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->date('birthdate');
            $table->string('social_status')->nullable();
            $table->string('qualification');
            $table->string('religion')->nullable();
            $table->string('job');
            $table->integer('salary');
            $table->string('yearly_bonus')->nullable();
            $table->string('st_name')->nullable();
            $table->integer('building_num')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('workers');
    }
}

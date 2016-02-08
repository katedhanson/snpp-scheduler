<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manager_id')->unsigned();
            $table->integer('employee_id')->unsigned()->nullable();
            $table->float('break')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamps();
            $table->foreign('manager_id')->references('id')->on('users');
            $table->foreign('employee_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shifts');
    }
}

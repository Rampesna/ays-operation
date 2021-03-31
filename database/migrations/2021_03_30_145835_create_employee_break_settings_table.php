<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeBreakSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_break_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('guid')->unsigned();
            $table->integer('daily_total_break_duration')->unsigned();
            $table->integer('daily_total_food_break_duration')->unsigned();
            $table->integer('daily_total_need_break_duration')->unsigned();
            $table->integer('for_once_food_break_duration')->unsigned();
            $table->integer('for_once_need_break_duration')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_break_settings');
    }
}

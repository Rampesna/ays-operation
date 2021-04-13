<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitingStepSubStepChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruiting_step_sub_step_checks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('recruiting_id')->unsigned();
            $table->bigInteger('recruiting_step_id')->unsigned();
            $table->bigInteger('recruiting_step_sub_step_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->boolean('check')->default(0);
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
        Schema::dropIfExists('recruiting_step_sub_step_checks');
    }
}

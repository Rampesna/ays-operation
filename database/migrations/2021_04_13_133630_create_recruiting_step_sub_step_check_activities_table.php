<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitingStepSubStepCheckActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruiting_step_sub_step_check_activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('recruiting_step_sub_step_check_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('recruiting_step_sub_step_check_activities');
    }
}

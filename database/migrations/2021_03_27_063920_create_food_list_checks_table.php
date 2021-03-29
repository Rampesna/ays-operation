<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodListChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_list_checks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('food_list_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->boolean('checked')->nullable();
            $table->boolean('locked')->default(0);
            $table->boolean('ate')->default(0);
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
        Schema::dropIfExists('food_list_checks');
    }
}

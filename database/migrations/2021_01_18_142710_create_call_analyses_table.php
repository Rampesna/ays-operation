<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_analyses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->date('date');
            $table->smallInteger('total_success_call')->nullable()->unsigned();
            $table->smallInteger('total_error_call')->nullable()->unsigned();
            $table->time('total_ring_time')->nullable();
            $table->time('total_wait_time')->nullable();
            $table->time('total_call_time')->nullable();
            $table->tinyInteger('operational_productivity_rate')->nullable()->unsigned();
            $table->smallInteger('incoming_success_call')->nullable()->unsigned();
            $table->smallInteger('incoming_error_call')->nullable()->unsigned();
            $table->time('incoming_total_call_time')->nullable();
            $table->smallInteger('outgoing_success_call')->nullable()->unsigned();
            $table->smallInteger('outgoing_error_call')->nullable()->unsigned();
            $table->time('outgoing_total_call_time')->nullable();
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
        Schema::dropIfExists('call_analyses');
    }
}

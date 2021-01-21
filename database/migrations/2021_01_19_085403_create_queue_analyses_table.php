<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueueAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queue_analyses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('queue_id')->unsigned();
            $table->date('date');
            $table->smallInteger('total_incoming_call')->nullable()->unsigned();
            $table->smallInteger('total_incoming_success_call')->nullable()->unsigned();
            $table->smallInteger('total_incoming_error_call')->nullable()->unsigned();
            $table->smallInteger('total_incoming_abandoned_call')->nullable()->unsigned();
            $table->smallInteger('total_incoming_in_of_company_call')->nullable()->unsigned();
            $table->smallInteger('total_incoming_out_of_company_call')->nullable()->unsigned();
            $table->smallInteger('total_outgoing_call')->nullable()->unsigned();
            $table->smallInteger('total_outgoing_success_call')->nullable()->unsigned();
            $table->smallInteger('total_outgoing_error_call')->nullable()->unsigned();
            $table->smallInteger('total_outgoing_in_of_company_call')->nullable()->unsigned();
            $table->smallInteger('total_outgoing_out_of_company_call')->nullable()->unsigned();
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
        Schema::dropIfExists('queue_analyses');
    }
}

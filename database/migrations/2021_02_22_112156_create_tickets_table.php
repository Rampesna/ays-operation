<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('relation_id')->unsigned();
            $table->string('relation_type');
            $table->bigInteger('creator_id')->unsigned();
            $table->string('creator_type');
            $table->string('title');
            $table->text('description');
            $table->tinyInteger('priority_id')->unsigned();
            $table->tinyInteger('status_id')->unsigned();
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
        Schema::dropIfExists('tickets');
    }
}

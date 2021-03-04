<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_reminders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('relation_id')->unsigned();
            $table->string('relation_type');
            $table->dateTime('date');
            $table->string('title');
            $table->text('note')->nullable();
            $table->boolean('mail');
            $table->boolean('notification');
            $table->boolean('sms');
            $table->boolean('reminded')->default(0);
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
        Schema::dropIfExists('calendar_reminders');
    }
}

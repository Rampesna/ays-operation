<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_personal_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned();
            $table->date('birth_date')->nullable();
            $table->boolean('civil_status')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->tinyInteger('blood_group_id')->unsigned();
            $table->string('education')->nullable();
            $table->string('identification_number', 11)->nullable();
            $table->boolean('wife_working_status')->nullable();
            $table->tinyInteger('degree_of_obstacle')->unsigned();
            $table->tinyInteger('number_of_child')->unsigned()->nullable();
            $table->boolean('education_status')->unsigned();
            $table->string('last_completed_school')->nullable();
            $table->text('address')->nullable();
            $table->string('home_phone_number')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_type')->nullable();
            $table->string('account_number')->nullable();
            $table->string('iban')->nullable();
            $table->string('emergency_person')->nullable();
            $table->string('emergency_person_degree')->nullable();
            $table->string('emergency_person_phone_number')->nullable();
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
        Schema::dropIfExists('employee_personal_information');
    }
}

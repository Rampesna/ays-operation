<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('salary_id')->unsigned();
            $table->string('year');
            $table->string('month');
            $table->double('gross_wage')->unsigned();
            $table->double('net_wage')->unsigned();
            $table->double('minimum_living_allowance')->unsigned();
            $table->double('income_tax_base')->unsigned();
            $table->double('income_tax')->unsigned();
            $table->double('cumulative_income_tax')->unsigned();
            $table->double('ssk_employee_premium')->unsigned();
            $table->double('unemployment_employee_premium')->unsigned();
            $table->double('ssk_employer_premium')->unsigned();
            $table->double('unemployment_employer_premium')->unsigned();
            $table->double('stamp_duty')->unsigned();
            $table->double('total_permit_hour')->unsigned();
            $table->double('permit_interruption_net')->unsigned();
            $table->double('permit_interruption_gross')->unsigned();
            $table->double('worked_day')->unsigned();
            $table->double('not_worked_day')->unsigned();
            $table->double('worked_day_net_wage')->unsigned();
            $table->double('not_worked_day_net_wage')->unsigned();
            $table->double('worked_day_gross_wage')->unsigned();
            $table->double('not_worked_day_gross_wage')->unsigned();
            $table->double('total_deduction')->unsigned();
            $table->double('net_gain')->unsigned();
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
        Schema::dropIfExists('payrolls');
    }
}

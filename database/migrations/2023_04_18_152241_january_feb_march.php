<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bursary_march_payroll', function (Blueprint $table) {
            $table->id();

             //March
             $table->string('staffNo')->nullable();
             $table->string('name')->nullable();
             $table->string('gradeLevel')->nullable();
             $table->string('designation')->nullable();
             $table->string('department')->nullable();
             $table->string('basicSalary')->nullable();
             $table->string('allowance')->nullable();
             $table->string('tax')->nullable();
             $table->string('pension')->nullable();
             $table->string('bonus')->nullable();
             $table->string('otherDeductions')->nullable();
             $table->string('bank')->nullable();
             $table->string('branch')->nullable();
             $table->string('year')->nullable();
             
            $table->timestamps();
        });

        Schema::create('bursary_february_payroll', function (Blueprint $table) {
            $table->id();
            //February
            $table->string('staffNo')->nullable();
            $table->string('name')->nullable();
            $table->string('gradeLevel')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('basicSalary')->nullable();
            $table->string('allowance')->nullable();
            $table->string('tax')->nullable();
            $table->string('pension')->nullable();
            $table->string('bonus')->nullable();
            $table->string('otherDeductions')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
        });

        Schema::create('bursary_january_payroll', function (Blueprint $table) {
            $table->id();
            //January
            $table->string('staffNo')->nullable();
            $table->string('name')->nullable();
            $table->string('gradeLevel')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('basicSalary');
            $table->string('allowance')->nullable();
            $table->string('healthInsurance')->nullable();
            $table->string('tax')->nullable();
            $table->string('pension')->nullable();
            $table->string('bonus')->nullable();
            $table->string('otherDeductions')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

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
        Schema::create('bursary_september_payroll', function (Blueprint $table) {
            $table->id();

            $table->string('staffNo')->nullable();
            $table->string('name')->nullable();
            $table->string('gradeLevel')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('basicSalary')->nullable();
            $table->string('allowance')->nullable();
            $table->string('healthInsurance')->nullable();
            $table->string('tax')->nullable();
            $table->string('pension')->nullable();
            $table->string('bonus')->nullable();
            $table->string('otherDeductions')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();

            $table->timestamps();
        });

        
        Schema::create('bursary_august_payroll', function (Blueprint $table) {
            $table->id();
            $table->string('staffNo')->nullable();
            $table->string('name')->nullable();
            $table->string('gradeLevel')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('basicSalary')->nullable();
            $table->string('allowance')->nullable();
            $table->string('healthInsurance')->nullable();
            $table->string('tax')->nullable();
            $table->string('pension')->nullable();
            $table->string('bonus')->nullable();
            $table->string('otherDeductions')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->timestamps();
        });

        Schema::create('bursary_july_payroll', function (Blueprint $table) {
            $table->id();

            $table->string('staffNo')->nullable();
            $table->string('name')->nullable();
            $table->string('gradeLevel')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('basicSalary')->nullable();
            $table->string('allowance')->nullable();
            $table->string('healthInsurance')->nullable();
            $table->string('tax')->nullable();
            $table->string('pension')->nullable();
            $table->string('bonus')->nullable();
            $table->string('otherDeductions')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
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

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
        Schema::create('bursary_salary_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('gradeLevel');
            $table->string('basicSalary');
            $table->string('allowance');
            $table->string('tax');
            $table->string('pension');
            $table->string('designation');
            $table->string('bonus');
            $table->string('otherDeductions');
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
        Schema::dropIfExists('bursary_salary_definitions');
    }
};

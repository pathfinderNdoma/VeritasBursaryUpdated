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
                $table->string('gradeLevel')->nullable();
                $table->string('basicSalary')->nullable();
                $table->string('allowance')->nullable();
                $table->string('tax')->nullable();
                $table->string('pension')->nullable();
                $table->string('designation')->nullable();
                $table->string('bonus')->nullable();
                $table->string('otherDeductions')->nullable();
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

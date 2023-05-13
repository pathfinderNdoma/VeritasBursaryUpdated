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
        Schema::create('bursary_otherDeductions', function (Blueprint $table) {
            $table->id();
            $table->string('staffNo');
            $table->string('name');
            $table->string('department');
            $table->string('designation');
            $table->string('amount');
            $table->string('nha');
            $table->string('nhf');
            $table->string('university_loan');
            $table->string('cooperative_loan');
            $table->string('commodity_loan');
            $table->string('cooperative_contribution');
            $table->string('school_fees');
            $table->string('span');
            $table->string('currentMonth');
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

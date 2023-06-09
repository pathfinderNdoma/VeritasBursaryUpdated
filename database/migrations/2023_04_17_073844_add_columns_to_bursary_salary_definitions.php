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
        Schema::table('bursary_salary_definitions', function (Blueprint $table) {
            $table->string('designation')->after('pension')->nullable();
            $table->string('bonus')->after('pension')->nullable();
            $table->string('otherDeductions')->after('pension')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_salary_definitions', function (Blueprint $table) {
            //
        });
    }
};

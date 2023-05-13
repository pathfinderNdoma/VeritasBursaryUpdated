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
        Schema::table('bursary_financial_years', function (Blueprint $table) {
            $table->string('status')->after('id')->nullable();
            $table->date('endDate')->after('id')->nullable();
            $table->date('startDate')->after('id')->nullable();
            $table->string('year')->after('id')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_financial_years', function (Blueprint $table) {
            //
        });
    }
};

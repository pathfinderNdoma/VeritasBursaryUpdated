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
            $table->string('initial_acount')->after('status')->nullable();
            $table->string('income')->after('status')->nullable();
            $table->string('expenditure')->after('status')->nullable();
            $table->string('final_account')->after('status')->nullable();
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

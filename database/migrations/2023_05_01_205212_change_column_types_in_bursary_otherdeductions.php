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
        Schema::table('bursary_otherdeductions', function (Blueprint $table) {
            $table->string('nha')->nullable()->change();
            $table->string('nhf')->nullable()->change();    

            $table->string('university_loan')->nullable()->change();
            $table->string('cooperative_loan')->nullable()->change(); 

            $table->string('commodity_loan')->nullable()->change();
            $table->string('cooperative_contribution')->nullable()->change(); 

            $table->string('school_fees')->nullable()->change(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_otherdeductions', function (Blueprint $table) {
            //
        });
    }
};

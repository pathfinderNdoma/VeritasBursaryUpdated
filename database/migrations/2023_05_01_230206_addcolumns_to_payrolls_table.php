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
    { Schema::table('bursary_january_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
        
    });

    Schema::table('bursary_february_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
        
    });

    Schema::table('bursary_march_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
        
    });

    Schema::table('bursary_april_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
        
    });

    Schema::table('bursary_may_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
        
    });

    Schema::table('bursary_june_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
        
    });

    Schema::table('bursary_july_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
        
    });

    Schema::table('bursary_august_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
        
    });

    Schema::table('bursary_september_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
        
    });

    Schema::table('bursary_october_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
        
    });

    Schema::table('bursary_november_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
        
    });

    Schema::table('bursary_december_payroll', function (Blueprint $table) {
        $table->string('nhia')->after('otherDeductions')->nullable();
        $table->string('nhf')->after('otherDeductions')->nullable();
        $table->string('university_loan')->after('otherDeductions')->nullable();

        $table->string('cooperative_loan')->after('otherDeductions')->nullable();
        $table->string('commodity_loan')->after('otherDeductions')->nullable();
        $table->string('cooperative_contribution')->after('otherDeductions')->nullable();
        $table->string('school_fees')->after('otherDeductions')->nullable();
    });

    Schema::table('bursary_otherdeductions', function (Blueprint $table) {
        $table->renameColumn('nha', 'nhia');
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
            $table->renameColumn('nhia', 'nha');
        });
    }
};

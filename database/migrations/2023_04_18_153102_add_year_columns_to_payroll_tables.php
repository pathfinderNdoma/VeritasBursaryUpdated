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
        Schema::table('bursary_april_payroll', function (Blueprint $table) {
            $table->string('year')->after('branch')->nullable();
        });

        Schema::table('bursary_may_payroll', function (Blueprint $table) {
            $table->string('year')->after('branch')->nullable();
        });

        Schema::table('bursary_june_payroll', function (Blueprint $table) {
            $table->string('year')->after('branch')->nullable();
        });

        Schema::table('bursary_july_payroll', function (Blueprint $table) {
            $table->string('year')->after('branch')->nullable();
        });

        Schema::table('bursary_august_payroll', function (Blueprint $table) {
            $table->string('year')->after('branch')->nullable();
        });

        Schema::table('bursary_september_payroll', function (Blueprint $table) {
            $table->string('year')->after('branch')->nullable();
        });

        Schema::table('bursary_october_payroll', function (Blueprint $table) {
            $table->string('year')->after('branch')->nullable();
        });

        Schema::table('bursary_november_payroll', function (Blueprint $table) {
            $table->string('year')->after('branch')->nullable();
        });

        Schema::table('bursary_december_payroll', function (Blueprint $table) {
            $table->string('year')->after('branch')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_april_payroll', function (Blueprint $table) {
            $table->dropColumn('year');
        });

        Schema::table('bursary_may_payroll', function (Blueprint $table) {
            $table->dropColumn('year');
        });

        Schema::table('bursary_june_payroll', function (Blueprint $table) {
            $table->dropColumn('year');
        });

        Schema::table('bursary_july_payroll', function (Blueprint $table) {
            $table->dropColumn('year');
        });

        Schema::table('bursary_august_payroll', function (Blueprint $table) {
            $table->dropColumn('year');
        });

        Schema::table('bursary_september_payroll', function (Blueprint $table) {
            $table->dropColumn('year');
        });

        Schema::table('bursary_october_payroll', function (Blueprint $table) {
            $table->dropColumn('year');
        });

        Schema::table('bursary_november_payroll', function (Blueprint $table) {
            $table->dropColumn('year');
        });


        Schema::table('bursary_december_payroll', function (Blueprint $table) {
            $table->dropColumn('year');
        });
    }
};

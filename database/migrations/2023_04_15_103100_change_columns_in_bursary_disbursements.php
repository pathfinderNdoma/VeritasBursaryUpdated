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
        Schema::table('bursary_disbursements', function (Blueprint $table) {
            //Rename Existing Columns
           
            $table->renameColumn('date_time', 'date');
            $table->renameColumn('financial_year', 'purpose');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_disbursements', function (Blueprint $table) {
            $table->renameColumn('date', 'date_time');
            $table->renameColumn('purpose', 'financial_year');
        });
    }
};

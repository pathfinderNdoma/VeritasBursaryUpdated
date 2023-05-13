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
        Schema::table('bursary_process_refunds', function (Blueprint $table) {
            $table->string('vcApproval')->after('transactionCode')->nullable();
            $table->string('bursarApproval')->after('transactionCode')->nullable();
            $table->string('applicationLetter')->after('transactionCode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_process_refunds', function (Blueprint $table) {
            //
        });
    }
};

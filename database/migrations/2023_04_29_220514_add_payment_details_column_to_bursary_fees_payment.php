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
        Schema::table('bursary_feespayment', function (Blueprint $table) {
            Schema::table('bursary_feespayment', function (Blueprint $table) {
                $table->string('semester')->afer('transactionID')->nullable();
                $table->string('amountBilled')->afer('transactionID')->nullable();
                $table->string('amountPaid')->afer('transactionID')->nullable();
                $table->string('balance')->afer('transactionID')->nullable();
                
                
                  
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_fees_payment', function (Blueprint $table) {
            //
        });
    }
};

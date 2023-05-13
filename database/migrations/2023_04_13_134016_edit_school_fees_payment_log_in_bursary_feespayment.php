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
            $table->renameColumn('amountPaid', 'paymentCategory');
            $table->renameColumn('description', 'hostel');
            $table->renameColumn('dateTime', 'transactionID');
            $table->renameColumn('balance', 'rrr');

            //Drop a column
            $table->dropColumn('advancePayment');
            //Add new columns
            $table->string('amount');
            $table->string('status');
            $table->date('paymentDate');
            $table->string('paymentSession');
            $table->string('currentLevel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_feespayment', function (Blueprint $table) {
            $table->renameColumn('paymentCategory', 'amountPaid');
            $table->renameColumn('hostel', 'description');
            $table->renameColumn('transactionID', 'dateTime');
            $table->renameColumn('rrr', 'balance');
            $table->renameColumn('paymentCategory', 'amountPaid');
            $table->renameColumn('paymentCategory', 'amountPaid');
            $table->renameColumn('paymentCategory', 'amountPaid');
            //
            $table->string('advancePayment');

            $table->dropColumn('amount');
            $table->dropColumn('status')->after('rrr');
            $table->dropColumn('paymentDate');
            $table->dropColumn('paymentSession');
            $table->dropColumn('currentLevel');
        });
    }
};

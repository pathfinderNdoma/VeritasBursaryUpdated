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
            $table->string('paymentReceipt')->after('balance')->nullable();
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
            $table->dropColumn('paymentReceipt');
        });
    }
};

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
        Schema::create('pledges', function (Blueprint $table) {
            $table->id();
            $table->string('donor');
            $table->string('address');
            $table->string('email');
            $table->string('contact_no');
            $table->string('amount_item');
            $table->string('purpose');
            $table->timestamp('pledgeDate');
            $table->time('redemptionDate');
            $table->string('pledgeNote');
            $table->string('pledgeStatus');
            $table->string('paymentReceipt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pledges');
    }
};

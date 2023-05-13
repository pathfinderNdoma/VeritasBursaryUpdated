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
        Schema::create('outgoing_donations', function (Blueprint $table) {
            $table->id();
            $table->string('beneficiary');
            $table->string('address');
            $table->string('email');
            $table->string('contact_no');
            $table->string('amount_item');
            $table->string('purpose');
            $table->timestamp('donationDate');
            $table->string('donationLetter');
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
        Schema::dropIfExists('outgoing_donations');
    }
};

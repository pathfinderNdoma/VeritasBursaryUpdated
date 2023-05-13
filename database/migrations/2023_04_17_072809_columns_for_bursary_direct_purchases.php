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
        Schema::create('bursary_direct_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('itemName');
            $table->string('itemNature');
            $table->string('quantity');
            $table->string('unitPrice');
            $table->string('totalPrice');
            $table->date('datePurchased');
            $table->string('purchaseBy');
            $table->string('staffNumber');
            $table->string('designation');
            $table->string('receipt');
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
        //
    }
};

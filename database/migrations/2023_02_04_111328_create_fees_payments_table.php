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
        Schema::create('feesPayment', function (Blueprint $table) {
            $table->id();
            $table->string('matricNo');
            $table->string('department');
            $table->string('faculty');
            $table->string('academic_year');
            $table->string('name');
            $table->string('amountPaid');
            $table->string('description');
            $table->string('dateTime');
            $table->string('balance');
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
        Schema::dropIfExists('fees_payments');
    }
};

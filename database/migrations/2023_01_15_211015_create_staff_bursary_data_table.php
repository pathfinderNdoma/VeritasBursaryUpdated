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
        Schema::create('staff_bursary_data', function (Blueprint $table) {
            $table->id();
            $table->string('staffNo')->unique();;
            $table->string('accountNo')->unique();
            $table->string('bankName');
            $table->string('branchAdd');
            $table->string('sortCode');
            $table->string('PFA');
            $table->string('rsaPIN')->unique();
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
        Schema::dropIfExists('staff_bursary_data');
    }
};

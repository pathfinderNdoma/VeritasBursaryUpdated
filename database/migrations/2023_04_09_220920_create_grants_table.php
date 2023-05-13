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
        Schema::create('bursary_grants', function (Blueprint $table) {
            $table->id();
            $table->string('awardingBody');
            $table->string('amount');
            $table->date('awardingDate');
            $table->string('awardLetter');
            $table->string('PIName');
            $table->string('PIStaffNo');
            $table->string('coInvestigators');
            $table->string('grantProcessingFee');
            $table->string('status');
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
        Schema::dropIfExists('bursary_grants');
    }
};

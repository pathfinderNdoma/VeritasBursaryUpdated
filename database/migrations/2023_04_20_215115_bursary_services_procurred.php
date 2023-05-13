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
        Schema::create('bursary_servicesProcurred', function (Blueprint $table) {
            $table->id();
            $table->string('serviceType')->nullable();
            $table->string('description')->nullable();
            $table->string('amount')->nullable();
            $table->date('dateofCommmencement')->nullable();
            $table->date('dateofCompletion')->nullable();
            $table->string('receipt')->nullable();
            $table->string('supervisedby')->nullable();
            $table->string('designation')->nullable();
            $table->string('sightedby')->nullable();
            $table->string('sightedbyDesignation')->nullable();
            $table->date('dateofSightation')->nullable();
            $table->string('serviceID')->nullable();
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

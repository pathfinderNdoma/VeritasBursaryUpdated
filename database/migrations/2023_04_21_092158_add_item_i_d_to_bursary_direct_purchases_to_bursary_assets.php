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
        Schema::table('bursary_direct_purchases', function (Blueprint $table) {
            $table->string('sightedby')->after('receipt')->nullable();
            $table->string('sightedByDesignation')->after('receipt')->nullable();
            $table->date('dateofSightation')->after('receipt')->nullable();
            $table->string('itemID')->after('id')->nullable();
        });

        Schema::table('bursary_assets', function (Blueprint $table) {
            $table->string('assetID')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_direct_purchases_to_bursary_assets', function (Blueprint $table) {
            //
        });
    }
};

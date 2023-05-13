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
        Schema::table('bursary_assets', function (Blueprint $table) {
            $table->renameColumn('landReceipt', 'landReceipt')->nullable();
            $table->renameColumn('buildingReceipt', 'buildingReceipt')->nullable();
            $table->renameColumn('equipmentReceipt', 'equipmentReceipt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_assets', function (Blueprint $table) {
            $table->renameColumn('landReceipt', 'landReceipt')->nullable();
            $table->renameColumn('buildingReceipt', 'buildingReceipt')->nullable();
            $table->renameColumn('equipmentReceipt', 'equipmentReceipt')->nullable();
        });
    }
};

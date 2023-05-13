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
        Schema::create('bursary_assets', function (Blueprint $table) {
            $table->id();
            $table->string('assetType')->nullable();
            // land
            $table->string('landSize')->nullable();
            $table->string('landAmout')->nullable();
            $table->string('landLocation')->nullable();
            $table->date('land_datePurchased')->nullable();

            //Building
            $table->string('buildingName')->nullable();
            $table->string('buildingLocation')->nullable();
            $table->string('constructed_donatedBy')->nullable();
            $table->string('buildingAmount')->nullable();
            $table->date('dateofCompletion')->nullable();
            $table->string('buildingSupervisedBy')->nullable();

            //Equipments
            $table->string('equipmentName')->nullable();
            $table->string('quantity')->nullable();
            $table->string('equipmentUnitCost')->nullable();
            $table->date('datePurchased_constructed')->nullable();
            $table->string('purchased_supervisedBy')->nullable();
            $table->string('designation')->nullable();
            $table->string('staffnumber')->nullable();
            $table->string('controlBy')->nullable();
            $table->string('inUseAt')->nullable();

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

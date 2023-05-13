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
            $table->string('landReceipt')->after('land_datePurchased');
            $table->string('buildingReceipt')->after('buildingSupervisedBy');
            $table->string('equipmentReceipt')->after('inUseAt');

            //Rename Columns
            $table->renameColumn('landAmout', 'landAmount');
             $table->renameColumn('datePurchased_constructed', 'datePurchased');
             $table->renameColumn('purchased_supervisedBy', 'purchaseBy');
        

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
            $table->dropColumn('landReceipt');
            $table->dropColumn('buildingReceipt');
            $table->dropColumn('equipmentReceipt');

            //Rename Columns
            $table->renameColumn('landAmount', 'landAmout');
            $table->renameColumn('datePurchased', 'datePurchased_constructed');
            $table->renameColumn('purchaseBy', 'purchase_supervisedBy');

        });

    }
};

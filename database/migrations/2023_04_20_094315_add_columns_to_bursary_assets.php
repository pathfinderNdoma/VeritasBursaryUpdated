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
            $table->string('sightedBy')->after('equipmentReceipt')->nullable();
            $table->string('sighteby_designation')->after('equipmentReceipt')->nullable();
            $table->date('dateofSightation')->after('equipmentReceipt')->nullable();
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
            $table->dropColumn('sightedBy');
            $table->dropColumn('designation');
            $table->dropColumn('dateofSightation');
        });
    }
};

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
        Schema::table('bursary_otherdeductions', function (Blueprint $table) {
            
                $table->date('startDate')->after('span')->nullable();
                $table->date('endDate')->after('span')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_otherdeductions', function (Blueprint $table) {
            $table->dropColumn('startDate');
            $table->dropColumn('endDate');
        });
    }
};

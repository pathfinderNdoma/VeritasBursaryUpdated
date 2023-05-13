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
        Schema::table('bid_submitteds', function (Blueprint $table) {
            $table->string('financial_year');
            $table->string('message');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bid_submitteds', function (Blueprint $table) {
            $table->dropColumn('financial_year');
            $table->dropColumn('message');
        });
    }
};

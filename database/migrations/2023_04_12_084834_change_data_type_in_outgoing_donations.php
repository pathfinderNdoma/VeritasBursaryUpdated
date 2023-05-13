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
        Schema::table('bursary_outgoing_donations', function (Blueprint $table) {
            $table->date('donationDate')->default(null)->change();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outgoing_donations', function (Blueprint $table) {
            $table->time('donationDate')->default(null)->change();   
        });
    }
};

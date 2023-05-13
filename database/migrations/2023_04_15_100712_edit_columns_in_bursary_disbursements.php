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
        Schema::table('bursary_disbursements', function (Blueprint $table) {
            //Create new tables
            $table->string('name')->after('date_time');
            $table->string('status')->after('date_time');
            $table->string('message')->after('date_time');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_disbursements', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('message');

            
        });
    }
};

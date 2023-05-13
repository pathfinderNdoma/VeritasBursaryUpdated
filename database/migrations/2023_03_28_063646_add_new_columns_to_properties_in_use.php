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
        Schema::table('properties_in_uses', function (Blueprint $table) {
            $table->string('applicant_name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties_in_uses', function (Blueprint $table) {
            $table->dropColumn('applicant_name');
            $table->dropColumn('address');
            $table->dropColumn('phone_number');
            $table->dropColumn('email_address');
        });
    }
};

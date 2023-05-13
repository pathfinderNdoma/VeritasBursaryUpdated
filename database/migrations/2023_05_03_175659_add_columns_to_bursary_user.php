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
        Schema::table('bursary_users', function (Blueprint $table) {
            $table->string('assumptionDate')->after('grade_level')->nullable();
            $table->string('appointmentDate')->after('grade_level')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bursary_user', function (Blueprint $table) {
            //
        });
    }
};

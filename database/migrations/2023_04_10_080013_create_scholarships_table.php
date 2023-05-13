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
        Schema::create('bursary_scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('studentName');
            $table->string('matricNo');
            $table->string('department');
            $table->string('amount');
            $table->date('awardDate');
            $table->string('award_letter');
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
        Schema::dropIfExists('bursary_scholarships');
    }
};

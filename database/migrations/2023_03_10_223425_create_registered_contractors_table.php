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
        Schema::create('registered_contractors', function (Blueprint $table) {
            $table->id();
            $table->string('contractorID');
            $table->string('companyName');
            $table->string('companyAddress');
            $table->string('accountNumber');
            $table->string('bankName');
            $table->string('branchAddress');
            $table->string('sortCode');
            $table->string('email');
            $table->string('phone');
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
        Schema::dropIfExists('registered_contractors');
    }
};

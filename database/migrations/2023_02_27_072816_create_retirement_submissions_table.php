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
        Schema::create('retirement_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('faculty');
            $table->integer('amount');
            $table->integer('expenditure');
            $table->string('financial_year');
            $table->string('receipt_id');
            $table->string('status');
            $table->string('message');
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
        Schema::dropIfExists('retirement_submissions');
    }
};

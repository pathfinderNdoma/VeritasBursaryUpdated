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
        Schema::create('refund_apps', function (Blueprint $table) {
            $table->id();
            $table->string('matricNo');
            $table->string('department');
            $table->string('faculty');
            $table->string('amount');
            $table->string('transactionCode');
            $table->string('message');
            $table->string('academic_session');
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
        Schema::dropIfExists('refund_apps');
    }
};

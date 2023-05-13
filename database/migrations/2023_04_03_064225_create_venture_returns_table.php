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
        Schema::create('venture_returns', function (Blueprint $table) {
            $table->id();
            $table->string('ventureID');
            $table->string('ventureName');
            $table->string('location');
            $table->string('director');
            $table->string('initial_runnningCapital');
            $table->string('profit');
            $table->string('returns');
            $table->string('present_runningCapital');
            $table->string('receiptID');
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
        Schema::dropIfExists('venture_returns');
    }
};

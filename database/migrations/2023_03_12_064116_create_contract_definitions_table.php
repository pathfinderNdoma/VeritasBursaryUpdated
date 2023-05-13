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
        Schema::create('contract_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('contract');
            $table->string('contractID');
            $table->string('dateCreated');
            $table->string('financial_year');
            $table->string('product_serviceName');
            $table->string('quantity');
            $table->string('description');
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
        Schema::dropIfExists('contract_definitions');
    }
};

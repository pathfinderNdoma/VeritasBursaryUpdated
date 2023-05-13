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
        if(Schema::hasTable('registered_contractors') && !Schema::hasTable('bursary_registered_contractors')){
            Schema::rename('registered_contractors', 'bursary_registered_contractors');
        }
        
        if(Schema::hasTable('users') && !Schema::hasTable('bursary_users')){
            Schema::rename('users', 'bursary_users');
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('bursary_registered_contractors') && !Schema::hasTable('registered_contractors')){
            Schema::rename('bursary_registered_contractors', 'registered_contractors');
        }

        if(Schema::hasTable('bursary_users') && !Schema::hasTable('users')){
            Schema::rename('bursary_users', 'users');
        }
    }
};

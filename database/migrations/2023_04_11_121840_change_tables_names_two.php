<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('assign_properties') && !Schema::hasTable('bursary_assign_properties')){
            Schema::rename('assign_properties', 'bursary_assign_properties');
        }

        if(Schema::hasTable('available_properties') && !Schema::hasTable('bursary_available_properties')){
            Schema::rename('available_properties', 'bursary_available_properties');
        }

        if(Schema::hasTable('bid_submitteds') && !Schema::hasTable('bursary_bid_submitteds')){
            Schema::rename('bid_submitteds', 'bursary_bid_submitteds');
        }

        if(Schema::hasTable('contracts') && !Schema::hasTable('bursary_contracts')){
            Schema::rename('contracts', 'bursary_contracts');
        }

        if(Schema::hasTable('contract_definitions') && !Schema::hasTable('bursary_contract_definitions')){
            Schema::rename('contract_definitions', 'bursary_contract_definitions');
        }

        if(Schema::hasTable('disbursements') && !Schema::hasTable('bursary_disbursements')){
            Schema::rename('disbursements', 'bursary_disbursements');
        }

        if(Schema::hasTable('donations') && !Schema::hasTable('bursary_donations')){
            Schema::rename('donations', 'bursary_donations');
        }

        if(Schema::hasTable('faculties') && !Schema::hasTable('bursary_faculties')){
            Schema::rename('faculties', 'bursary_faculties');
        }

        if(Schema::hasTable('failed_jobs') && !Schema::hasTable('bursary_failed_jobs')){
            Schema::rename('failed_jobs', 'bursary_failed_jobs');
        }

        if(Schema::hasTable('feespayment') && !Schema::hasTable('bursary_feespayment')){
            Schema::rename('feespayment', 'bursary_feespayment');
        }

        if(Schema::hasTable('financial_years') && !Schema::hasTable('bursary_financial_years')){
            Schema::rename('financial_years', 'bursary_financial_years');
        }
           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('bursary_assign_properties') && !Schema::hasTable('assign_properties')){
            Schema::rename('bursary_aassign_properties', 'assign_properties');
        }

        if(Schema::hasTable('bursary_available_properties') && !Schema::hasTable('available_properties')){
            Schema::rename('bursary_available_properties', 'available_properties');
        }

        if(Schema::hasTable('bursary_bid_submitteds') && !Schema::hasTable('bid_submitteds')){
            Schema::rename('bursary_bid_submitteds', 'bid_submitteds');
        }

        if(Schema::hasTable('bursary_contracts') && !Schema::hasTable('contracts')){
            Schema::rename('bursary_contracts', 'contracts');
        }

        if(Schema::hasTable('bursary_contract_definitions') && !Schema::hasTable('contract_definitions')){
            Schema::rename('bursary_contract_definitions', 'contract_definitions');
        }

        if(Schema::hasTable('bursary_disbursements') && !Schema::hasTable('disbursements')){
            Schema::rename('bursary_disbursements', 'disbursements');
        }

        if(Schema::hasTable('bursary_donations') && !Schema::hasTable('donations')){
            Schema::rename('bursary_donations', 'donations');
        }

        if(Schema::hasTable('bursary_faculties') && !Schema::hasTable('faculties')){
            Schema::rename('bursary_faculties', 'faculties');
        }

        if(Schema::hasTable('bursary_failed_jobs') && !Schema::hasTable('failed_jobs')){
            Schema::rename('bursary_failed_jobs', 'failed_jobs');
        }

        if(Schema::hasTable('bursary_feespayment') && !Schema::hasTable('feespayment')){
            Schema::rename('bursary_feespayment', 'feespayment');
        }

        if(Schema::hasTable('bursary_financial_years') && !Schema::hasTable('financial_years')){
            Schema::rename('bursary_financial_years', 'financial_years');
        }
    }
};

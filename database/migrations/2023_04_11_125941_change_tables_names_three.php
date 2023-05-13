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
        if(Schema::hasTable('outgoing_donations') && !Schema::hasTable('bursary_outgoing_donations')){
            Schema::rename('outgoing_donations', 'bursary_outgoing_donations');
        }

        if(Schema::hasTable('payslips') && !Schema::hasTable('bursary_payslips')){
            Schema::rename('payslips', 'bursary_payslips');
        }


        if(Schema::hasTable('pledges') && !Schema::hasTable('bursary_pledges')){
            Schema::rename('pledges', 'bursary_pledges');
        }


        if(Schema::hasTable('process_refunds') && !Schema::hasTable('bursary_process_refunds')){
            Schema::rename('process_refunds', 'bursary_process_refunds');
        }

        if(Schema::hasTable('properties_in_uses') && !Schema::hasTable('bursary_properties_in_uses')){
            Schema::rename('properties_in_uses', 'bursary_properties_in_uses');
        }

        if(Schema::hasTable('refund_apps') && !Schema::hasTable('bursary_refund_apps')){
            Schema::rename('refund_apps', 'bursary_refund_apps');
        }

        if(Schema::hasTable('retirement_submissions') && !Schema::hasTable('bursary_retirement_submissions')){
            Schema::rename('retirement_submissions', 'bursary_retirement_submissions');
        }
        if(Schema::hasTable('salary_definitions') && !Schema::hasTable('bursary_salary_definitions')){
            Schema::rename('salary_definitions', 'bursary_salary_definitions');
        }

        if(Schema::hasTable('school_fees_definitions') && !Schema::hasTable('bursary_school_fees_definitions')){
            Schema::rename('school_fees_definitions', 'bursary_school_fees_definitions');
        }

        if(Schema::hasTable('staff_bursary_data') && !Schema::hasTable('bursary_staff_bursary_data')){
            Schema::rename('staff_bursary_data', 'bursary_staff_bursary_data');
        }
        
        if(Schema::hasTable('ventures') && !Schema::hasTable('bursary_ventures')){
            Schema::rename('ventures', 'bursary_ventures');
        }

        if(Schema::hasTable('venture_returns') && !Schema::hasTable('bursary_venture_returns')){
            Schema::rename('venture_returns', 'bursary_venture_returns');
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('bursary_venture_returns') && !Schema::hasTable('venture_returns')){
            Schema::rename('bursary_venture_returns', 'venture_returns');
        }

        if(Schema::hasTable('bursary_ventures') && !Schema::hasTable('ventures')){
            Schema::rename('bursary_ventures', 'ventures');
        }

        if(Schema::hasTable('bursary_users') && !Schema::hasTable('users')){
            Schema::rename('bursary_users', 'users');
        }

        if(Schema::hasTable('bursary_staff_bursary_data') && !Schema::hasTable('staff_bursary_data')){
            Schema::rename('bursary_staff_bursary_data', 'staff_bursary_data');
        }

        if(Schema::hasTable('bursary_school_fees_definitions') && !Schema::hasTable('school_fees_definitions')){
            Schema::rename('bursary_school_fees_definitions', 'school_fees_definitions');
        }

        if(Schema::hasTable('bursary_salary_definitions') && !Schema::hasTable('salary_definitions')){
            Schema::rename('bursary_salary_definitions', 'salary_definitions');
        }

        if(Schema::hasTable('bursary_retirement_submissions') && !Schema::hasTable('retirement_submissions')){
            Schema::rename('bursary_retirement_submissions', 'retirement_submissions');
        }

        if(Schema::hasTable('bursary_registered_contractors') && !Schema::hasTable('registered_contractors')){
            Schema::rename('bursary_registered_contractors', 'registered_contractors');
        }

        if(Schema::hasTable('bursary_refund_apps') && !Schema::hasTable('refund_apps')){
            Schema::rename('bursary_refund_apps', 'refund_apps');
        }

        if(Schema::hasTable('bursary_properties_in_uses') && !Schema::hasTable('properties_in_uses')){
            Schema::rename('bursary_properties_in_uses', 'properties_in_uses');
        }

        if(Schema::hasTable('bursary_process_refunds') && !Schema::hasTable('process_refunds')){
            Schema::rename('bursary_process_refunds', 'process_refunds');
        }

        if(Schema::hasTable('bursary_pledges') && !Schema::hasTable('pledges')){
            Schema::rename('bursary_pledges', 'pledges');
        }

        if(Schema::hasTable('bursary_payslips') && !Schema::hasTable('payslips')){
            Schema::rename('bursary_payslips', 'payslips');
        }

        if(Schema::hasTable('bursary_outgoing_donations') && !Schema::hasTable('outgoing_donations')){
            Schema::rename('bursary_outgoing_donations', 'outgoing_donations');
        }

    }
};

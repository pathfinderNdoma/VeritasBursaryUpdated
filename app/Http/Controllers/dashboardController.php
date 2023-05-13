<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\staffBursaryData;
use App\Models\User;
use App\Models\Asset;
use Illuminate\Support\Facades\DB;
use App\Models\Budget;
use App\Models\IncomePlan;
use App\Models\financial_year;
use App\Models\Donations;
use App\Models\pledge;
use App\Models\OutgoingDonations;
use crypt;
use Session;
use PDF;
use Illuminate\Http\Request;

class dashboardController extends Controller

    {
    
        public function dashboard(Request $request)
    {

            //Get active financial year
            $fyear = DB::table('bursary_financial_years')
            ->where('status', '=', 'active')
            ->value('year');

                         
              // FETCH INCOME SOURCE FROM SCHOOL FEES
              $totalSchoolFees = DB::table('bursary_feespayment')
              ->where('academic_year', '=', $fyear)
              ->sum('amount');

          
              // FETCH INCOME SOURCE FROM ENTERPRISES/VENTURES RETURNS 
              $totalreturns = DB::table('bursary_venture_returns')
              ->where('financial_year', '=', $fyear)
              ->sum('returns');

              // FETCH INCOME SOURCE FROM RENTS/LEASE RETURNS 
              $totalrents = DB::table('bursary_assign_properties')
              ->whereYear('start_date', '=', $fyear)
              ->sum('amount');
                //Get summation of total enterprises
              $totalenterprises =$totalreturns+ $totalrents; 


             

            //Fetching total for donations
            $totalDonations = Donations::whereYear('donationDate', $fyear)
            ->get()
            ->filter(function ($donation) {
                return is_numeric($donation->amount_item);
            })
            ->sum('amount_item');

            //Fetching total for pledges
            $totalPledge = Pledge::whereYear('pledgeDate', $fyear)
            ->get()
            ->filter(function ($pledge) {
                return is_numeric($pledge->amount_item);
            })
            ->sum('amount_item');

            // FETCH INCOME SUMMARY FOR THE DASHBOAR
            $totalgrants = DB::table('bursary_grants')
            ->whereYear('awardingDate', '=', $fyear)
            ->sum('amount');

           //Get total income for the financial year
           $totalIncome = $totalSchoolFees + $totalenterprises + $totalDonations + $totalPledge + $totalgrants;
// ********************************************************************EXPENDITURES**********************************************************
            

            //Fetching total outgoing donations
            $totalOutDonations = OutgoingDonations::whereYear('donationDate', $fyear)
            ->get()
            ->filter(function ($outgoing) {
                return is_numeric($outgoing->amount_item);
            })
            ->sum('amount_item');

            // Fetch income for scholarships
            $totalscholarships = DB::table('bursary_scholarships')
            ->where('awardDate', '=', $fyear)
            ->sum('amount');

            // Fetch income for impress/disbursement
            $totaldisbursment = DB::table('bursary_disbursements')
            ->whereYear('date', '=', $fyear)
            ->sum('amount');

             // Fetch income for services procurred
            //  $totalbursary_servicesprocurred = DB::table('bursary_servicesprocurred')
            //  ->whereYear('dateofCommmencement', '=', $fyear)
            //  ->sum('amount');

             // Fetch income for Approved Contracts
             $totalbidSuvbmitted = DB::table('bursary_bid_submitteds')
             ->where('financial_year', '=', $fyear)
             ->where('status', '=', 'Approve')
             ->sum('totalAmount');
             

             // Fetch income for direct purchases
            $totaldirectpurchase = DB::table('bursary_direct_purchases')
            ->whereYear('datePurchased', '=', $fyear)
            ->orwhere('datePurchased', '=', $fyear)
            ->sum('totalPrice');

             // Fetch income for services procurred
             $totalserviceProcurred = DB::table('bursary_servicesprocurred')
            ->whereYear('dateofCommmencement', '=', $fyear)
            ->orwhere('dateofCommmencement', '=', $fyear)
            ->sum('amount');

            //Salaries
            // Fetch income for january salary
            $totalsalaryjan = DB::table('bursary_january_payroll')
            ->whereYear('year', '=', $fyear)
            ->orwhere('year', '=', $fyear)
            ->sum('grosspay');

            // Fetch income for february salary
            $totalsalaryfeb = DB::table('bursary_february_payroll')
            ->whereYear('year', '=', $fyear)
            ->orwhere('year', '=', $fyear)
            ->sum('grosspay');

             // Fetch income for march salary
             $totalsalarymarch = DB::table('bursary_march_payroll')
             ->whereYear('year', '=', $fyear)
             ->orwhere('year', '=', $fyear)
             ->sum('grosspay');

             // Fetch income for april salary
             $totalsalaryapril = DB::table('bursary_april_payroll')
             ->whereYear('year', '=', $fyear)
             ->orwhere('year', '=', $fyear)
             ->sum('grosspay');

             // Fetch income for may salary
             $totalsalarymay = DB::table('bursary_may_payroll')
             ->whereYear('year', '=', $fyear)
             ->orwhere('year', '=', $fyear)
             ->sum('grosspay');

             // Fetch income for june salary
             $totalsalaryjune = DB::table('bursary_june_payroll')
             ->whereYear('year', '=', $fyear)
             ->orwhere('year', '=', $fyear)
             ->sum('grosspay');

             // Fetch income for july salary
             $totalsalaryjuly = DB::table('bursary_july_payroll')
             ->whereYear('year', '=', $fyear)
             ->orwhere('year', '=', $fyear)
             ->sum('grosspay');

              // Fetch income for august salary
              $totalsalaryaug = DB::table('bursary_august_payroll')
              ->whereYear('year', '=', $fyear)
              ->orwhere('year', '=', $fyear)
              ->sum('grosspay');


              // Fetch income for september salary
              $totalsalarysept = DB::table('bursary_september_payroll')
              ->whereYear('year', '=', $fyear)
              ->orwhere('year', '=', $fyear)
              ->sum('grosspay');

              // Fetch income for october salary
              $totalsalaryoctober = DB::table('bursary_october_payroll')
              ->whereYear('year', '=', $fyear)
              ->orwhere('year', '=', $fyear)
              ->sum('grosspay');


              // Fetch income for november salary
              $totalsalarynov= DB::table('bursary_november_payroll')
              ->whereYear('year', '=', $fyear)
              ->orwhere('year', '=', $fyear)
              ->sum('grosspay');


              // Fetch income for december salary
              $totalsalarydec= DB::table('bursary_december_payroll')
              ->whereYear('year', '=', $fyear)
              ->orwhere('year', '=', $fyear)
              ->sum('grosspay');

              $totalSalaries = $totalsalaryjan+$totalsalaryfeb+$totalsalarymarch+$totalsalarymay+$totalsalaryjune+
                                $totalsalaryjuly+$totalsalaryaug+$totalsalarysept+$totalsalaryoctober+$totalsalarynov+$totalsalarydec;





            
             //Sum total procurrment made
             $totalProcurrment =  $totalbidSuvbmitted + $totaldirectpurchase + $totalserviceProcurred;
            //Sum total expenditure
         $totalExpenditure =  $totalOutDonations+$totalscholarships+$totaldisbursment+ $totalProcurrment+$totalSalaries;


         //Budget
            // Fetch Budget income
            $totalBudgetIncome = DB::table('bursary_incomeplans')
            ->where('financial_year', '=', $fyear)
            ->sum('amount');

             // Fetch Budget Expenditure
             $totalBudgetExpenditure = DB::table('bursary_budgets')
             ->where('financial_year', '=', $fyear)
             ->sum('amount');
            //End of Budget


        //Update the financial tabel after this

        //Get initial account for previous year
        $previousYear = $fyear - 1;
        $intialAccount = DB::table('bursary_financial_years')
            ->where('year', '=', $previousYear)
            ->value('final_account');

        //Get Initial Account Start Date
        $initiaAccountStartDate = DB::table('bursary_financial_years')
        ->where('status', '=', 'active')
        ->value('startDate');

        //final account
        $finalAccount = $intialAccount+ $totalIncome-$totalExpenditure;

        //Save to database
        $addDonations                                =   financial_year::where('year', $fyear)->first();
        $addDonations->initial_account               =    $request->input('update_beneficiary');
        $addDonations->address                      =     $request->input('update_address');
        
        //Expected B/CD
        $expectBCd = $intialAccount+$totalBudgetIncome-$totalBudgetExpenditure;

        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        return view('/dashboard')
        ->with('data1', $data1)
        //Initial Account Start Date: note this initial account is also used for the budget summary in the balance brought forward
        ->with('initiaAccountStartDate', $initiaAccountStartDate)
        

        // Income
        ->with('intialAccount', $intialAccount)
        ->with('totalIncome', $totalIncome)
        ->with('finalAccount', $finalAccount)
        ->with('totalExpenditure', $totalExpenditure)
        ->with('totalSchoolFees', $totalSchoolFees)
        ->with('totalenterprises',  $totalenterprises)
        ->with('totalDonations',  $totalDonations)
        ->with('totalPledge',  $totalPledge)
        ->with('totalgrants',  $totalgrants)

        // Expenditures
        ->with('totalOutDonations',  $totalOutDonations)
        ->with('totalscholarships',  $totalscholarships)
        ->with('totaldisbursment',  $totaldisbursment)
        ->with('totalProcurrment',   $totalProcurrment)
        ->with('totalProcurrment',   $totalProcurrment)

        //Budget
        ->with('totalBudgetIncome',   $totalBudgetIncome)
        ->with('totalBudgetExpenditure',   $totalBudgetExpenditure)
        ->with('expectBCd',   $expectBCd)
        ;
    }


    /*********************************************************************************************************************888888888888888888****************** */ 
}

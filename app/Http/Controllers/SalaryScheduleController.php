<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\staffBursaryData;
use App\Models\User;
use App\Models\SalarySchedule;
use App\Models\januaryPayroll;
use App\Models\februaryPayroll;
use App\Models\marchPayroll;
use App\Models\aprilPayroll;
use App\Models\mayPayroll;
use App\Models\junePayroll;
use App\Models\julyPayroll;
use App\Models\augustPayroll;
use App\Models\septemberPayroll;
use App\Models\octoberPayroll;
use App\Models\novemberPayroll;
use App\Models\decemberPayroll;
use App\Models\OtherDeductions;
use DateTime;
use Illuminate\Support\Facades\DB;
use crypt;
use Session;
use PDF;
use Carbon\Carbon;

class SalaryScheduleController extends Controller
{

    function salarySchedule()
    {
       

        $data = DB::table('burasry_salary_schedules')
        ->select(DB::raw('DISTINCT month'))
        ->get();

            $months = '<select name="month" id="month" class="form-control lineColor"><option>Select Month</option>';

            foreach ($data as $data) {

                if($data->month=='jan'){
                    $data->month='january';
                }
                elseif($data->month=='feb'){
                    $data->month='february';
                }

                $months .= '<option value="'.$data->month.'">'.$data->month.'</option>';
            }

            $months .= '</select>';

            $data1 = User::where('staffNo', session()->get('staffNo'))->first();
            
           //Get active financial year
           $fyear = DB::table('bursary_financial_years')
           ->where('status', '=', 'active')
           ->value('year');

            return view('/staffACC.salarySchedule')
            ->with('data1', $data1)
            ->with('financial_year', $fyear)
            ->with('monthSchedlued', $months);
    }
    


    public function addSchedule(Request $request)
{
    $data1 = User::where('staffNo', session()->get('staffNo'))->first();

    /** Fetch staffs information from user table */
    $staffInfo = DB::table('bursary_users')
        ->where('status', '=', 'active')
        ->get();
    
    //Creating a white list to ensure the data send is free of sql injection
    $allowedTables = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']; 
    if (!in_array($request->month, $allowedTables)) {
        return redirect()->route('payroll')->with('error', 'Invalid data');
        }


    else{ //IF it is free
    $tableName = 'bursary_'.$request->month.'_payroll';

    //Check if salary has been scheduled for the current month and year
    $check =  DB::table($tableName)
            ->where('year', '=', $request->year)
            ->count();

    if ($check > 0) {
        return redirect()->route('salarySchedule')
            ->with('data1', $data1)
            ->with('error', 'Salary has already been scheduled for this month');
    } 
    else {

        $addschedule = new SalarySchedule();
        $addschedule->year = $request->input('year');
        $addschedule->month = $request->input('month');

        if ($addschedule->save()) {

// *******************************************************************************************************************************************************

    // Get the first query results
                        $payrollData = DB::table('bursary_users')
                        ->join('bursary_salary_definitions', function ($join) {
                            $join->on('bursary_users.grade_level', '=', 'bursary_salary_definitions.gradeLevel')
                                ->on('bursary_users.designation', '=', 'bursary_salary_definitions.designation');
                        })
                        ->join('bursary_staff_bursary_data', 'bursary_users.staffNo', '=', 'bursary_staff_bursary_data.staffNo')
                        ->select('bursary_users.*', 'bursary_salary_definitions.*', 'bursary_staff_bursary_data.accountNo', 'bursary_staff_bursary_data.bankName', 
                            'bursary_staff_bursary_data.branchAdd', 'bursary_staff_bursary_data.sortCode', 'bursary_staff_bursary_data.PFA',  DB::raw("CONCAT(fname, ' ', lname, ' ', oname) AS name"))
                        ->get();

                        // Define the list of columns to insert into the new table
                        $insertColumns = ['staffNo', 'name', 'gradeLevel', 'designation', 'department', 'basicSalary', 'otherAllowance', 'bank',
                                             'year', 'nhia', 'nhf', 'university_loan', 'cooperative_loan', 'commodity_loan', 
                                            'cooperative_contribution', 'school_fees', 'branch', 'netpay', 'grosspay', 'houseAllowance',
                                             'tax', 'pension', 'otherAllowance', 'year', 'created_at', 'updated_at'];
         // Loop through each row in the first query results
          foreach ($payrollData as $data) 
          {

                        // Run the second query to get deductions data for this staff member
                        $fetchDeductions = DB::table('bursary_otherdeductions')
                            ->select('staffNo', 'endDate', 'currentMonth', 'span', 'financial_year', 
                                DB::raw('SUM(nhia) as nhia'), 
                                DB::raw('SUM(nhf) as nhf'), 
                                DB::raw('SUM(university_loan) as university_loan'),
                                DB::raw('SUM(cooperative_loan) as cooperative_loan'),
                                DB::raw('SUM(commodity_loan) as commodity_loan'),
                                DB::raw('SUM(cooperative_contribution) as cooperative_contribution'),
                                DB::raw('SUM(school_fees) as school_fees'))
                            ->where('financial_year', $request->year)
                            ->where('staffNo', $data->staffNo)
                            ->groupBy('staffNo', 'endDate', 'currentMonth', 'span', 'financial_year')
                            ->first();
                           
                        // Determine the deduction amounts based on the end date of the deduction
                        if ($fetchDeductions && ($fetchDeductions->endDate == '' || is_null($fetchDeductions->endDate))) {
                           
                            $nhiaAmount                             =  $fetchDeductions->nhia ?? '';
                            $nhfAmount                              =  $fetchDeductions->nhf ?? '';
                            $universityLoanAmount                   =  $fetchDeductions->university_loan ?? '';
                            $coooperativeLoanAmount                 =  $fetchDeductions->coooperative_loan ?? '';
                            $commodityLoanAmount                    =  $fetchDeductions->commodity_loan ?? '';
                            $coooperativeContributionAmount         =  $fetchDeductions->coooperative_contribution ?? '';
                            $schoolFeesAmount                       =  $fetchDeductions->school_fees ?? '';
                        } else {
                            
                            
                            //CONDITION 3: Check if deduction is still active 
                            if($fetchDeductions && ($fetchDeductions->span !='0' ||  $fetchDeductions->span !=0))
                             { 
                                 
                                 //Get current year to insert to
                                 $year = floor($fetchDeductions->currentMonth/12);
                                 $currentYear = date('Y', strtotime($fetchDeductions->financial_year. ' +'.$year.'  year'));
         
                                 //CONDITION 4: Check if the current month is the same with the month on the deduction table
         
                                 //Get the month of the year, 
                                 $month = DateTime::createFromFormat('!m', $fetchDeductions->currentMonth)->format('F');
                                    
                                //Then check
                               if(strtolower($month)==$request->month)
                               { 
                                
                                  //if the months are the same 
                                        $nhiaAmount                             =  $fetchDeductions->nhia ?? '';
                                        $nhfAmount                              =  $fetchDeductions->nhf ?? '';
                                        $universityLoanAmount                   =  $fetchDeductions->university_loan ?? '';
                                        $coooperativeLoanAmount                 =  $fetchDeductions->coooperative_loan ?? '';
                                        $commodityLoanAmount                    =  $fetchDeductions->commodity_loan ?? '';
                                        $coooperativeContributionAmount         =  $fetchDeductions->coooperative_contribution ?? '';
                                        $schoolFeesAmount                       =  $fetchDeductions->school_fees ?? '';

                               }else{
                                
                                $nhiaAmount                             = '';
                                $nhfAmount                              = '';
                                $universityLoanAmount                   =  '';
                                $coooperativeLoanAmount                 = '';
                                $commodityLoanAmount                    = '';
                                $coooperativeContributionAmount         =  '';
                                $schoolFeesAmount                       =  '';
                               }// END OF CHECKING IF THE MONTH AND YEAR ARE THE SAME


                              }

                              else{   //CONDITION 3 : Check if deduction is still active 
                                 //Get current year to insert to
                                // return $fetchDeductions->span;
                                $currentYear = $request->year;
                                $nhiaAmount                             = '';
                                $nhfAmount                              = '';
                                $universityLoanAmount                   =  '';
                                $coooperativeLoanAmount                 = '';
                                $commodityLoanAmount                    = '';
                                $coooperativeContributionAmount         =  '';
                                $schoolFeesAmount                       =  'this';
                                
                              }//END OF  CONDITION 3 : Check if deduction is still active 

                            } // Determine the deduction amounts based on the end date of the deduction


                        // Combine the data from the two queries into an array
                        $allowance              =        (($data->allowance)/100)*($data->basicSalary);
                        $grosspay               =        $data->basicSalary + $allowance + $data->bonus;  
                        $tax                    =        ($data->tax/100)*($grosspay);
                        $pension                =         ($data->pension/100)*($grosspay);

                        $deductions             =    intval($nhiaAmount) +  intval($nhfAmount) +  intval($universityLoanAmount) + 
                                                     intval($coooperativeLoanAmount) + intval($coooperativeContributionAmount) + 
                                                     intval($schoolFeesAmount) +  intval($tax) + intval($pension);

                        $insertData = array_merge((array)$data, (array)$fetchDeductions, [
                            'nhia'                             => $nhiaAmount,
                            'nhf'                              => $nhfAmount,
                            'university_loan'                  => $universityLoanAmount,
                            'cooperative_loan'                 =>  $coooperativeLoanAmount,
                            'commodity_loan'                   => $commodityLoanAmount,
                            'cooperative_contribution'         => $coooperativeContributionAmount,
                            'school_fees'                      => $schoolFeesAmount,
                            'tax'                              => $tax,
                            'pension'                          => $pension,
                            'grosspay'                         => $grosspay,
                            'netpay'                           => $grosspay-$deductions,
                            'houseAllowance'                   => $allowance,
                            'otherAllowance'                   => $data->bonus,
                            'bank'                             => $data->bankName,
                            'branch'                           => $data->branchAdd,
                            'year'                             => $request->year,
                            'created_at'                       => Carbon::now(),
                            'updated_at'                       => Carbon::now(),

                            ]);

                        // Select only the columns we want to insert into the new table
                        $selectedData = array_intersect_key($insertData, array_flip($insertColumns));
                        
                        // Insert the selected data into the new table
                        if(DB::table($tableName)->insert($selectedData)){
                            
                            
                            //CHECK AGAIN IF THE  DEDUCTION WAS CARRIED OUT THEN UPDATE THE ACTIVE DEDUCTION
                            if($fetchDeductions && ($fetchDeductions->span !='0' ||  $fetchDeductions->span !=0)){

                                //Update the bursary_otherdeductions table and subtract one from span, add one to currentMonth
                               $updateDeductionsTable = OtherDeductions::where('financial_year', $request->year)
                               ->where('staffNo', $data->staffNo)
                               ->first();
       
                                   if($updateDeductionsTable) {
                                           $updateDeductionsTable->span                = $updateDeductionsTable->span - 1;
                                           $updateDeductionsTable->currentMonth        = $updateDeductionsTable->currentMonth + 1;
                                           $updateDeductionsTable->financial_year      = $currentYear;
                                           $updateDeductionsTable->save(); 
                                   }
                            } 
                             //CHECK AGAIN IF THE  DEDUCTION WAS CARRIED OUT THEN UPDATE THE ACTIVE DEDUCTION
                            
                                  
                        }

                       
        }
                                                                    

                        return redirect()->route('salarySchedule')
                        ->with('data1', $data1)
                        ->with('success', 'Salary has been schedule for the of '. $request->month .  $request->year);

                        
    // ****************************************************************************************************************************************************
            
            }
        }

    }// End of check condition

}//End of checking if the table name sent is free of sql injection
}
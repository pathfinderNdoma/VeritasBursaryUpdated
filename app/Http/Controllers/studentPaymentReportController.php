<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\feesPayment;
use Illuminate\Support\Facades\DB;
use PDO;

class studentPaymentReportController extends Controller
{

    public function paymentReport()
    {
        $academic_session   =       DB::table('bursary_feespayment')->distinct()->pluck('academic_year');
        $data1              =       User::where('staffNo', session()->get('staffNo'))->first();
        $faculties          =       DB::table('bursary_faculties')->distinct()->get();
        return view('/studentAcc.paymentReport')->with('data1', $data1)
        ->with('faculties', $faculties)
        ->with('academic_session', $academic_session);
    }


    

    public function report(Request $request)
{
    $dept_faculty = $request->dept_faculty;
    $year = $request->year;

    $data1 = User::where('staffNo', session()->get('staffNo'))->first();

    if ($dept_faculty == 'Faculty') {
        // Get bursary counts for the given year
        $counts = DB::table(function ($query) use ($year) {
                $query->select('matricNo', 'academic_year', 'faculty',  
                        DB::raw('SUM(amountPaid) as totalPaid'), 
                        DB::raw('MAX(amountBilled) as amountBilled'))
                    ->from('bursary_feespayment')
                    ->where('academic_year', '=', $year)
                    ->groupBy('matricNo', 'academic_year',  'faculty');
                }, 'sub')
                ->select('sub.faculty', 
                        DB::raw('SUM(sub.totalPaid) as totalAmountPaid'),
                        DB::raw('COUNT(DISTINCT CASE WHEN sub.totalPaid >= sub.amountBilled THEN sub.matricNo END) AS totalnumPaid'),
                        DB::raw('COUNT(DISTINCT CASE WHEN sub.totalPaid < sub.amountBilled THEN sub.matricNo END) AS totalOwing'),
                        DB::raw('COUNT(DISTINCT sub.matricNo) AS totalDistinctStudents'))
                ->groupBy('sub.faculty')
                ->get();
                        
            $level = 'Faculty';
        } 


        else if ($dept_faculty == 'Department') {
            $counts = DB::table(function ($query) use ($year) {
                $query->select('matricNo', 'academic_year', 'faculty', 'department', 
                        DB::raw('SUM(amountPaid) as totalPaid'), 
                        DB::raw('MAX(amountBilled) as amountBilled'))
                    ->from('bursary_feespayment')
                    ->where('academic_year', '=', $year)
                    ->groupBy('matricNo', 'academic_year', 'faculty', 'department');
            }, 'sub')
            ->select('sub.faculty', 'sub.department',
                    DB::raw('SUM(sub.totalPaid) as totalAmountPaid'),
                    DB::raw('COUNT(DISTINCT CASE WHEN sub.totalPaid >= sub.amountBilled THEN sub.matricNo END) AS totalnumPaid'),
                    DB::raw('COUNT(DISTINCT CASE WHEN sub.totalPaid < sub.amountBilled THEN sub.matricNo END) AS totalOwing'),
                    DB::raw('COUNT(DISTINCT sub.matricNo) AS totalDistinctStudents'))
            ->groupBy('sub.department', 'sub.faculty')
            ->get();
            
            $level = 'Department';
        }
        
    $academic_session = DB::table('bursary_feespayment')->distinct()->pluck('academic_year');
    
    return view('/studentAcc.paymentReport')
        ->with('data1', $data1)
        ->with('report', $counts)
        ->with('dept_faculty', $dept_faculty)
        ->with('year', $year)
        ->with('level', $level)
        ->with('academic_session', $academic_session);
}


    //*********************************ADVANCE DEPOSIT SECTION */


    public function advanceDepositIndex()
    {
        $year = '2022/2023';
        // $results = DB::table('feespayment')
        // ->select('matricNo', 'department', 'faculty', 'academic_year',
        // DB::raw('SUM(CASE WHEN advancePayment = "Yes" THEN amountPaid ELSE 0 END) as total_advancePay'), 
        // DB::raw('SUM(CASE WHEN advancePayment = "No" THEN amountPaid ELSE 0 END) as total_feesPaid'),
        // DB::raw('(SUM(CASE WHEN advancePayment = "Yes" THEN amountPaid ELSE 0 END) - SUM(CASE WHEN advancePayment = "No" THEN amountPaid ELSE 0 END)) as balance')
        //     )
        //     ->groupBy('matricNo', 'department', 'faculty', 'academic_year' )
        //     ->havingRaw('balance > 0')
        //     ->get();
        $results = DB::table('bursary_feesPayment')
            ->where('academic_year', '!=', $year)
            ->get();
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        return view('/studentAcc.advanceDeposit')->with('data1', $data1)->with('advancedeposit', $results);
    }


    public function viewdeposits(Request $request)
    {

        $matricNo = $request->id;
        $name = DB::table('feespayment')
            ->where('matricNo', $matricNo)
            ->first(['name'])
            ->name;


        $deposits = DB::table('bursary_feespayment')
            ->where('advancePayment', '=', 'Yes')
            ->where('matricNo', '=', $matricNo)
            ->get();

        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        return view('/studentAcc.viewAdvanceDeposits')->with('data1', $data1)
            ->with('data', $deposits)
            ->with('name', $name);
    }

    //***********************STATEMENT OF ACCOUNT */
    public function soaIndex()
    {

        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $faculties = DB::table('bursary_faculties')->distinct()->pluck('faculty');
        
        // return $faculties;
        return view('/studentAcc.statementofAccount')->with('data1', $data1)->with('faculties', $faculties);
    }

    public function viewstudents(Request $request)
    {
        $faculty = $request->faculty;

        $students =  DB::table('bursary_feespayment')
            ->select('matricNo', 'name', 'department', 'faculty',)
            ->where('faculty', '=', $faculty)
            ->distinct()
            ->get();


        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $faculties = DB::table('bursary_faculties')->distinct()->pluck('faculty');
        return view('/studentAcc.statementofAccount')->with('data1', $data1)
            ->with('students', $students)
            ->with('faculties', $faculties);
    }

    public function viewsoa(Request $request)
    {
       
        $matricNo = $request->id;

        $studentinfo = DB::table('bursary_feespayment')
            ->where('matricNo', '=', $matricNo)
            ->first();


        $soa = DB::table('bursary_feespayment')
            ->where('matricNo', '=', $matricNo)
            ->get();

        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        return view('/studentAcc.viewsoa')->with('data1', $data1)
            ->with('soa', $soa)
            ->with('studentinfo', $studentinfo);
    }
// *****************************************************************************DEBT RECOVERY****************************************************************
        public function debtRecoveryIndex()
            {
                $academic_session   =       DB::table('bursary_feespayment')->distinct()->pluck('academic_year');
                $data1              =       User::where('staffNo', session()->get('staffNo'))->first();
                $faculties          =       DB::table('bursary_faculties')->distinct()->get('faculty');
                $department          =      DB::table('bursary_faculties')->distinct()->get('department');

                return view('/studentAcc.debtRecovery')->with('data1', $data1)
                ->with('faculties', $faculties)
                ->with('department', $department)
                ->with('academic_session', $academic_session);
            }


            // *****************************************************************************DEBT RECOVERY****************************************************************
 public function debtRecovery(Request $request)
    {
                $year                       = $request->year;
                $facultyOrDepartment        = $request->dept;
                //if Debt Status is not owing
        if($request->debtStatus=='owing'){

            $records = DB::table('bursary_feespayment')
            ->select(DB::raw('*'), 
                    DB::raw('SUM(amountPaid) as totalPaid'),
                    DB::raw('MAX(amountBilled) as maxBilled'))
            ->where('academic_year', $year)
            ->where('department', $facultyOrDepartment)
            ->groupBy('matricNo', 'department', 'amountBilled')
            ->havingRaw('SUM(amountBilled - amountPaid) > 0')
            ->havingRaw('(amountBilled -totalPaid) > 0')
            ->get();



         }

        if($request->debtStatus=='not_owing'){

            $records = DB::table('bursary_feespayment')
            ->select(DB::raw('*'), 
                    DB::raw('SUM(amountPaid) as totalPaid'),
                    DB::raw('MAX(amountBilled) as maxBilled'))
            ->where('academic_year', $year)
            ->where('department', $facultyOrDepartment)
            ->groupBy('matricNo', 'department', 'amountBilled')
            ->havingRaw('SUM(amountBilled - amountPaid) > 0')
            ->havingRaw('(amountBilled -totalPaid) <= 0')
            ->get();
        }


                $academic_session   =       DB::table('bursary_feespayment')->distinct()->pluck('academic_year');
                $data1              =       User::where('staffNo', session()->get('staffNo'))->first();
                $faculties          =       DB::table('bursary_faculties')->distinct()->get('faculty');
                $department          =      DB::table('bursary_faculties')->distinct()->get('department');

                return view('/studentAcc.debtRecovery')->with('data1', $data1)
                ->with('faculties', $faculties)
                ->with('department', $department)
                ->with('currentdepartment', $facultyOrDepartment)
                ->with('academic_session', $academic_session)
                ->with('year', $year)
                ->with('debtors_creditors', $records)
                ->with('debtStatus', $request->debtStatus);
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\retirementSubmission;
use App\Http\Controllers\IncludesController;
use Illuminate\Support\Facades\Storage;
use App\Models\staffBursaryData;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use crypt;
use Session;
use PDF;

class retirementController extends Controller
{
    public function retirementSubmissionIndex()
    {
        
        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
        $submissionlog = DB::table('bursary_retirement_submissions')
            ->where('department', '=', $data1->department)
            ->get();

        return view('/impress.retirement_submission')
                ->with('data1', $data1)
                ->with('departments', $department)
                ->with('faculties', $faculties)
                ->with('financial_year', $f_year)
                ->with('submissionlog', $submissionlog);;
    }


    public function fetchsubmission(Request $request)
    {
        $fyear = $request->fyear;
        $dept = $request->dept;
        

        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();

        
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');

        $submissionlog = DB::table('bursary_retirement_submissions')
            ->where('department', '=', $data1->department)
            ->where('financial_year', '=', $fyear)
            ->get();
        
        return view('/impress.retirement_submission')
                ->with('data1', $data1)
                ->with('departments', $department)
                ->with('faculties', $faculties)
                ->with('financial_year', $f_year)
                ->with('submissionlog', $submissionlog);
    }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitRetirement(Request $request)
        {   
            
            
            if($request->hasFile('receiptID')){
                $extension = $request->file('receiptID')->getClientOriginalExtension();
                $filenameToStore = time().'.'.$extension;
                
                //************************** IF THE FILE IS UPLOADED *****************************
                if($request->file('receiptID')->storeAs('public/retirements', $filenameToStore)){


                    $submitRetirement                       =    new retirementSubmission();
                    $submitRetirement->department           =    $request->input('dept');
                    $submitRetirement->faculty              =    $request->input('faculty');
                    $submitRetirement->amount               =    $request->input('amount');
                    $submitRetirement->expenditure          =    $request->input('expenditure');
                    $submitRetirement->financial_year       =    $request->input('fyear');
                    $submitRetirement->receipt_id           =    $filenameToStore;
                    $submitRetirement->status               =    'Pending';
                    
             
                    if($submitRetirement->save()){
                     
                     $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                     $department = DB::table('bursary_faculties')->distinct()->get('department');
                     $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
                     return redirect('retirement_submission')->with('data1', $data1)->with('success', 'Retirement Submitted')
                        ->with('departments', $department)
                        ->with('faculties', $faculties);
                    } 
                }
                // ****************************IF THE FILE IS UPLOADED ENDS*************************************
                {
                    return 'some error there';
                }
            }
            else{
                return 'no';
            }

            }


            public function updateRetirementSubmission(Request $request)
    {   
        
        // Generate a unique token for this request
        $token = md5(uniqid());
        // Store the token in the session
        session(['token' => $token]);

        if($request->hasFile('receiptID')){
            $extension = $request->file('receiptID')->getClientOriginalExtension();
            $filenameToStore = time().'.'.$extension;
            //************************** UPLOAD THE FILE *****************************
            $request->file('receiptID')->storeAs('public/retirements', $filenameToStore);
        }
        else{
            $filenameToStore = $request->receipts_id;  
        }
                 
                    $update                        =        retirementSubmission::where('id', $request->datas_id)->first();  
                    $update ->department           =        $request->input('department');
                    $update->faculty               =        $request->input('faculty');
                    $update->amount                =        $request->input('amount');
                    $update->expenditure           =        $request->input('expenditure');
                    $update->financial_year        =        $request->input('financial_year');
                    $update->receipt_id            =        $filenameToStore;
                    $update->Status                =        'Pending';
                    $update->message               =        'Your Submission is been processed';

                    if($update->save()){
                    return redirect()->route('fetchsubmission', ['dept' => $request->department, 'fyear' => $request->financial_year, ])
                    ->with('success', 'Retirement Submission Update Successfully');  
                    } 
    }

    public function deleteRetirementSubmission(Request $request)
    {   
        $id = $request->id;
        $delete = retirementSubmission::where('id', $id)->first();
        if($delete->delete()){
        return redirect()->route('fetchsubmission', ['dept' => $request->department, 'fyear' => $request->financial_year, ])
                        ->with('success', 'Retirement Submission Deleted Successfully');            
        }
                
        
    }

// ********************************************PROCESS RETIREMENTS CONTROLLERS
public function processRetirementIndex()
{
    
    $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
    
    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
    $department = DB::table('bursary_faculties')->distinct()->get('department');
    $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
    $submissionlog = DB::table('bursary_retirement_submissions')
                        ->where('status', '!=', 'Approved')
                         ->get();
    
    return view('/impress.processRetirements')
            ->with('data1', $data1)
            ->with('departments', $department)
            ->with('faculties', $faculties)
            ->with('financial_year', $f_year)
            ->with('submissionlog', $submissionlog);;
}

public function fetchProcessSubmission(Request $request)
    {
        $fyear = $request->fyear;
        $dept = $request->dept;
        
        $f_year = DB::table('bursary_retirement_submissions')->distinct()->pluck('financial_year');
        
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');

        $submissionlog = DB::table('bursary_retirement_submissions')
            ->where('financial_year', '=', $fyear)
            ->where('status', '!=', 'Approved')
            ->get();
        
        return view('/impress.processRetirements')
                ->with('data1', $data1)
                ->with('departments', $department)
                ->with('faculties', $faculties)
                ->with('financial_year', $f_year)
                ->with('submissionlog', $submissionlog);
    }


    public function processsRetirement(Request $request)
    {
        // Generate a unique token for this request
        $token = md5(uniqid());
        // Store the token in the session
        session(['token' => $token]);
        $message =  htmlspecialchars($request->del_message);
            
            $update                        =        retirementSubmission::where('id', $request->del_ids)->first();  
            $update ->status               =        $request->input('del_status');
            $update->message               =        $message;

                    if($update->save()){
                    return redirect()->route('processRetirementIndex', ['dept' => $request->del_department, 'fyear' => $request->del_financial_year, ])
                    ->with('success', 'Retirement Submission was '. $request->del_status);  
                    } 
    }



    public function approvedRetirement()
{
    
    $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
    
    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
    $department = DB::table('bursary_faculties')->distinct()->get('department');
    $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
    $submissionlog = DB::table('bursary_retirement_submissions')
                        ->where('status', '=', 'Approved')
                         ->get();
  
    return view('/impress.approvedRetirements')
            ->with('data1', $data1)
            ->with('departments', $department)
            ->with('faculties', $faculties)
            ->with('financial_year', $f_year)
            ->with('submissionlog', $submissionlog);;
}

public function fetchapprovedRetirement(Request $request)
{
  

    $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
    
    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
    $department = DB::table('bursary_faculties')->distinct()->get('department');
    $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
    
    $approvedlog = DB::table('bursary_retirement_submissions')
                        ->where('status', '=', 'Approved')
                        ->where('department', '=', $request->dept)
                        ->where('financial_year', '=', $request->fyear)
                         ->get();
    

    return view('/impress.approvedRetirements')
            ->with('data1', $data1)
            ->with('departments', $department)
            ->with('faculties', $faculties)
            ->with('financial_year', $f_year)
            ->with('approvedlog', $approvedlog);
}
// **************************************** RETIREMENT REPORT
public function retirementReportIndex(Request $request)
{
  
    $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
    
    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
    $department = DB::table('bursary_faculties')->distinct()->get('department');
    $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');    

    return view('/impress.impressReports')
            ->with('data1', $data1)
            ->with('departments', $department)
            ->with('faculties', $faculties)
            ->with('financial_year', $f_year);
}
public function retirementReport(Request $request)
{
        $dept = $request->dept;
        $fyear = $request->fyear;
    $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
    
    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
    $department = DB::table('bursary_faculties')->distinct()->get('department');
    $faculties = DB::table('bursary_faculties')->distinct()->get('faculty'); 
    
    // $report = DB::table('disbursements')
    // ->join('retirement_submissions', function($join) {
    //     $join->on('disbursements.department', '=', 'retirement_submissions.department')
    //         ->on('disbursements.financial_year', '=', 'retirement_submissions.financial_year');
    // })
    // ->select('disbursements.department', 'disbursements.financial_year', 'disbursements.faculty', 
    //          DB::raw('SUM(disbursements.amount) as disbursement_total'), 
    //          DB::raw('SUM(retirement_submissions.amount) as amount_retired'))
    //         ->groupBy('disbursements.department', 'disbursements.financial_year', 'disbursements.faculty')
    //         ->where('disbursements.financial_year', '=', $fyear )
    //         ->get();
    $report = DB::table('bursary_disbursements')
    ->leftJoinSub(function($query) {
        $query->select('department', 'financial_year', DB::raw('SUM(amount) as amount_retired'))
            ->from('bursary_retirement_submissions')
            ->groupBy('department', 'financial_year');
                }, 'retirement_subquery', function($join) {
                    $join->on('bursary_disbursements.department', '=', 'retirement_subquery.department')
                        ->on('bursary_disbursements.financial_year', '=', 'retirement_subquery.financial_year');
                })
                ->select('bursary_disbursements.department', 'bursary_disbursements.financial_year', 'bursary_disbursements.faculty', 
                        DB::raw('SUM(bursary_disbursements.amount) as disbursement_total'), 
                        DB::raw('COALESCE(amount_retired, 0) as amount_retired'))
                ->groupBy('bursary_disbursements.department', 'bursary_disbursements.financial_year', 'bursary_disbursements.faculty', 'amount_retired')
                ->where('bursary_disbursements.financial_year', '=', $fyear)
                ->get();





  
    return view('/impress.impressReports')
            ->with('data1', $data1)
            ->with('departments', $department)
            ->with('faculties', $faculties)
            ->with('financial_year', $f_year)
            ->with('report', $report);
}



}

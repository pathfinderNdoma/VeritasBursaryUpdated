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
use crypt;
use Session;
use PDF;


use Illuminate\Http\Request;

class budgetController extends Controller
{
    public function expenditurePlanIndex()
                {
                    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                    $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');


                    return view('/budget.expenditurePlan')
                            ->with('data1', $data1)
                            ->with('financial_year', $f_year);

                }
/*********************************************************************************************************************888888888888888888****************** */
public function fetchExpenditure(Request $request)
{
$data1 = User::where('staffNo', session()->get('staffNo'))->first();
$f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
$budget = Budget::where('financial_year', '=', $request->year)->get();



return view('/budget.expenditurePlan')
        ->with('data1', $data1)
        ->with('budget', $budget)
        ->with('financial_year', $f_year);

 }

            
/*********************************************************************************************************************888888888888888888****************** */


    
    /*********************************************************************************************************************888888888888888888****************** */

                        public function addExpenditure(Request $request)
                        {

                                
                                //Save to database
                                $adddBudget                        =     new Budget();
                                $adddBudget->financial_year        =     $request->input('year');
                                $adddBudget->startDate             =     $request->input('startDate');
                                $adddBudget->endDate               =     $request->input('endDate');
                                $adddBudget->description           =     $request->input('description');
                                $adddBudget->amount                =     $request->input('amount');  
                               


                                if($adddBudget->save()){

                                    return redirect()->route('fetchExpenditure', ['year'=>$request->year])
                                            ->with('success', 'Expenditure Plan Added');

                                }

                        }


/*********************************************************************************************************************888888888888888888****************** */
    public function updateExpenditure(Request $request)
                {
                
                         //Save to database
                         $updateBudget                        =     Budget::where('id', '=', $request->update_id)->first();
                         $updateBudget->financial_year        =     $request->input('update_year');
                         $updateBudget->startDate             =     $request->input('update_startDate');
                         $updateBudget->endDate               =     $request->input('update_endDate');
                         $updateBudget->description           =     $request->input('update_description');
                         $updateBudget->amount                =     $request->input('update_amount'); 
               
                        if($updateBudget->save()){
                                return redirect()->route('fetchExpenditure', ['year'=>$request->update_year])
                                ->with('success', 'Expenditure Plan Updated');
                        }

                 }
        
  
/*********************************************************************************************************************888888888888888888****************** */
public function deleteExpenditure(Request $request)
{
    // Retrieve the budget record to delete
    $budget = Budget::find($request->id);

    // Check if the budget record was found
    if (!$budget) {
        return redirect()->back()->with('error', 'Budget record not found');
    }

    // Delete the budget record
    $budget->delete();

    // Redirect to the expenditure page with a success message
    return redirect()->route('fetchExpenditure', ['year' => $request->year])
        ->with('success', 'Expenditure Plan Deleted');
}


/*********************************************************************************************************************888888888888888888****************** */

public function incomePlanIndex()
                {
                    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                    $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');


                    return view('/budget.incomePlan')
                            ->with('data1', $data1)
                            ->with('financial_year', $f_year);

                }
/*********************************************************************************************************************888888888888888888****************** */

                public function fetchincomePlan(Request $request)
                {
                $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
                $incomePlan = IncomePlan::where('financial_year', '=', $request->year)->get();



                return view('/budget.incomePlan')
                        ->with('data1', $data1)
                        ->with('incomePlan', $incomePlan)
                        ->with('financial_year', $f_year);

                }

/*********************************************************************************************************************888888888888888888****************** */

public function addincomePlan(Request $request)
{

        
        //Save to database
        $addincomePlan                         =     new IncomePlan();
        $addincomePlan ->financial_year        =     $request->input('year');
        $addincomePlan ->source                =     $request->input('source');
        $addincomePlan ->amount                =     $request->input('amount');     

        if($addincomePlan ->save()){

            return redirect()->route('fetchincomePlan', ['year'=>$request->year])
                    ->with('success', 'Income Plan Added');

        }

}

// ************************************************************************************************************************************************* */
    public function updateIncomePlan(Request $request)
                {
                
                         //Save to database
                         $updateIncomePlan                        =     IncomePlan::where('id', '=', $request->update_id)->first();
                         $updateIncomePlan ->financial_year        =     $request->input('update_year');
                         $updateIncomePlan ->source            =     $request->input('update_source');
                         $updateIncomePlan ->amount               =     $request->input('update_amount');
               
                        if($updateIncomePlan ->save()){
                                return redirect()->route('fetchincomePlan', ['year'=>$request->update_year])
                                ->with('success', 'Income Plan Updated');
                        }

                 }
        
/******************************************************************************************************************************************************** */
public function deleteIncomePlan(Request $request)
{
    // Retrieve the income plan record to delete
    $incomeplan = IncomePlan::find($request->id);

    // Check if the income plan record was found
    if (!$incomeplan) {
        return redirect()->back()->with('error', 'Income Plan record not found');
    }

    // Delete the income record
    $incomeplan->delete();

    // Redirect to the expenditure page with a success message
    return redirect()->route('fetchincomePlan', ['year' => $request->year])
        ->with('success', 'Income Plan Deleted');
}
/******************************************************************************************************************************************************** */
                                                        //FINANCIAL YEAR
/******************************************************************************************************************************************************** */
                public function financialYearIndex()
                {
                $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                $f_year = DB::table('bursary_financial_years')->get();
               
                return view('/budget.financial_year')
                        ->with('data1', $data1)
                        ->with('financial_year', $f_year);
                }
/*********************************************************************************************************************888888888888888888****************** */

public function addFinancialYear(Request $request)
{
        if($request->status=='active'){
                //set all other rows status to be inactive
                 DB::table('bursary_financial_years')
                    ->where('status', '=', 'active') // Set all other rows to inactive
                    ->update(['status' => 'inactive']);

        }
        
        //Save to database
        $addincomePlan                         =     new financial_year();
        $addincomePlan ->year                   =     $request->input('year');
        $addincomePlan ->startDate             =     $request->input('startDate');
        $addincomePlan ->endDate               =     $request->input('endDate');
        $addincomePlan ->status                =     $request->input('status');     

        if($addincomePlan ->save()){
                

            return redirect()->route('financialYearIndex')
                    ->with('success', 'Financial Year Added');

        }

}

/******************************************************************************************************************************************************** */
        public function deleteFinancialYear(Request $request)
        {
        // Retrieve the income plan record to delete
        $fyear = financial_year::find($request->id);

        // Check if the financial year plan record was found
        if (!$fyear) {
                return redirect()->back()->with('error', 'Financial Year record not found');
        }

        // Delete the financial Year record
        $fyear->delete();
        // if($fyear->delete()){
        //         //If the financial year is deleted, set new active financial_year
        // }

        // Redirect to the expenditure page with a success message
        return redirect()->route('financialYearIndex', ['year' => $request->year])
                ->with('success', 'Financial Year Deleted');
        }

        // ************************************************************************************************************************************************* */
    public function updateFinancialYear(Request $request)
    {
    
             //Save to database
             $updateincomePlan                         =     financial_year::where('id', '=', $request->update_id)->first();
             $updateincomePlan ->year                  =     $request->input('update_year');
             $updateincomePlan ->startDate             =     $request->input('update_startDate');
             $updateincomePlan ->endDate               =     $request->input('update_endDate');    
     
             if($updateincomePlan ->save()){
                
                if($request->update_status=='active'){
                        //set all other rows status to be inactive
                        DB::table('bursary_financial_years')
                            ->where('status', '=', 'active') // Set all other rows to inactive
                            ->update(['status' => 'inactive']);

                        //Set this row now to active
                        $updatestatus                   =     financial_year::where('id', '=', $request->update_id)->first();
                        $updatestatus->status           =     $request->input('update_status');
                        $updatestatus->save();
                    }
                    
                 return redirect()->route('financialYearIndex')
                         ->with('success', 'Financial Year updated');
     
             }

     }
}


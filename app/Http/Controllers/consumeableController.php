<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\staffBursaryData;
use App\Models\User;
use App\Models\Asset;
use Illuminate\Support\Facades\DB;
use App\Models\consumeables;
use App\Models\DirectPurchase;
use crypt;
use Session;
use PDF;


use Illuminate\Http\Request;

class consumeableController extends Controller
{
    public function consumeablesIndex(Request $request)
                {
                    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                    $department = DB::table('bursary_faculties')->distinct()->get('department');
                    $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
                    $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');


                    return view('/audit.consumeables')
                            ->with('data1', $data1)
                            ->with('departments', $department)
                            ->with('financial_year', $f_year)
                            ->with('faculties', $faculties);

                }
/*************************************************************************************************************************************************** */
 //************************************************************************************************************************************************ */
 public function fetchConsumables(Request $request)
 {
                $consumeables = DB::table('bursary_direct_purchases')
                ->whereYear('datePurchased', $request->year)
                ->where('itemNature', 'Consumeable')
                ->get();

                $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                $department = DB::table('bursary_faculties')->distinct()->get('department');
                $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
                $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');


     return view('/audit.consumeables')
             ->with('consumeables', $consumeables)
             ->with('data1', $data1)
             ->with('departments', $department)
             ->with('financial_year', $f_year)
             ->with('faculties', $faculties);

 }

/****************************************************************************************************************************************************** */
public function updateConsumeables(Request $request)
{
        
        $update_consumeables                                        =    DirectPurchase::where('id', $request->update_id)->first();
        $update_consumeables->sightedBy                             =    $request->input('sightedBy');
        $update_consumeables->sightedByDesignation                 =     $request->input('sightedByDesignation');
        $update_consumeables->dateofSightation                      =     $request->input('dateofSightation');
        if($update_consumeables->save()){
                
            return redirect()->route('fetchConsumables')
                   ->with('year', $request->year)
                    ->with('success', 'Information updated successfully');
            
        }
        

    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\staffBursaryData;
use App\Models\User;
use App\Models\ventures;
use Illuminate\Support\Facades\DB;
use App\Models\ventureReturn;
use crypt;
use Session;
use PDF;

class venturesController extends Controller
{
/*************************************************************************************************************************************** */
//                                                              VENTURES METHODS STARTS HERE
/*************************************************************************************************************************************** */
    public function venturesIndex()
    {
        {
            // Generate a unique token for this request
            $token = md5(uniqid());
            // Store the token in the session
            session(['token' => $token]);
            $data1 = User::where('staffNo', session()->get('staffNo'))->first();
            $ventures = DB::table('bursary_ventures')->get();
            // $ventures = DB::table('ventures')->orderByAsc('created_at')->get();
            $ventures = DB::table('bursary_ventures')
             ->join('bursary_venture_returns', 'bursary_ventures.id', '=', 'bursary_venture_returns.ventureID')
             ->select('bursary_ventures.*', 'bursary_venture_returns.present_runningCapital', DB::raw('MAX(bursary_venture_returns.created_at) AS created_at'))
             ->groupBy('bursary_ventures.id', 'bursary_ventures.businessName', 'bursary_ventures.location', 
             'bursary_ventures.director', 'bursary_ventures.runningCapital', 'bursary_ventures.runningCapital', 
             'bursary_ventures.updated_at',   'bursary_ventures.created_at', 'bursary_venture_returns.present_runningCapital')
              ->get();


                
            return view('/ventures.ventures')
                    ->with('ventures', $ventures)
                    ->with('data1', $data1);
                    
        }   
    }
/********************************************************************************************************************************************* */

    public function addVenture(Request $request)
        {
            
            $addProperty                           =    new ventures();
            $addProperty->businessName             =    $request->input('businessName');
            $addProperty->location                 =    $request->input('business_location');
            $addProperty->director                 =   $request->input('director');
            $addProperty->runningCapital           =    $request->input('runingCapital');  
            

            if($addProperty->save()){
            

                return redirect()->route('venturesIndex')
                        ->with('success', 'Enterprise added successfully');
                
            }
        }
/********************************************************************************************************************************************* */
public function updateVenture(Request $request)
    {
        
        $update                             =    ventures::where('id', $request->id)->first();  
        $update ->businessName              =    $request->input('venture_name');
        $update ->location                  =    $request->input('location');
        $update->director                   =    $request->input('venture_director');
        $update ->runningCapital            =    $request->input('running_capital');
               

        if($update->save()){
            

            return redirect()->route('venturesIndex')
            ->with('success', 'Enterprise Information Updated successfully');
        }
    }
/********************************************************************************************************************************************** */
public function deleteventure(Request $request)
    {
      $id = $request->id;
      $created_at = $request->created_at;
      $delete = ventures::where('id', $id)->first();
        if($delete->delete()){
           
            return redirect()->route('venturesIndex')
                        ->with('success', 'Enterprise Deleted Successfully');
                    
        } 
    }
/*************************************************************************************************************************************** */
                                                        // VENTURES METHODS ENDS HERE
/*************************************************************************************************************************************** */



/*************************************************************************************************************************************** */
                                            // RETURNS METHODS STARTS HERE
/*************************************************************************************************************************************** */
            public function returnsIndex(Request $request)
                {
                    {
                        // Generate a unique token for this request
                        $token = md5(uniqid());
                        // Store the token in the session
                        session(['token' => $token]);
                        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                        $ventures = DB::table('bursary_ventures')->get();

                        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
                            
                        return view('/ventures.returns')
                                // ->with('returns', $returns)
                                ->with('ventures', $ventures)
                                ->with('financial_year', $f_year)
                                ->with('data1', $data1);
                                
                    }   
                }
 /*************************************************************************************************************************************** */
 
public function fetchreturns(Request $request)
{
    {
        // Generate a unique token for this request
        $token = md5(uniqid());
        // Store the token in the session
        session(['token' => $token]);
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();

        $ventures = DB::table('bursary_ventures')->get();

        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        
        $returns = DB::table('bursary_venture_returns')
        ->where('financial_year', $request->fyear)->get();
            
        return view('/ventures.returns')
                ->with('returns', $returns)
                ->with('ventures', $ventures)
                ->with('financial_year', $f_year)
                ->with('data1', $data1);
                
    }   
}

public function submitReturns(Request $request)
        {
             
        

        //*************************************************** */
            if($request->hasFile('receipt')){
            
            $extension              =   $request->file('receipt')->getClientOriginalExtension();
            $receiptID       =   'return_receipt'.time().'.'.$extension;
            
            //************************** UPLOAD THE FILE *****************************
            $request->file('receipt')->storeAs('public/returns_receipts', $receiptID );
            }
            else{
                $receiptID         = '';  
            }
        // *************************************************** */
            $ventures = DB::table('bursary_ventures')
            ->where('id', $request->ventureID)->get()->first();

            //Get infomration for the present running capital
            $venturesCount = DB::table('bursary_venture_returns')
            ->where('ventureID', $request->ventureID)
            ->count();
            if($venturesCount==0){
                $present_runningCapital = $ventures->runningCapital + $request->input('profit') - $request->input('returns');
                $initial_capital = $ventures->runningCapital;
            }
            
            else{
                $lastestCapital = DB::table('bursary_venture_returns')
                ->where('ventureID', $request->ventureID) 
                ->latest('created_at')->first();
                $initial_capital = $lastestCapital ->present_runningCapital;
                $present_runningCapital = $lastestCapital ->present_runningCapital + $request->input('profit') - $request->input('returns');
            }

             

            $submitreturns                                  =    new ventureReturn();
            $submitreturns->ventureID                       =    $ventures->id;
            $submitreturns ->ventureName                    =    $ventures->businessName;
            $submitreturns ->location                       =    $ventures->location;
            $submitreturns ->director                       =    $ventures->director;
            $submitreturns ->initial_runnningCapital        =    $initial_capital;  
            $submitreturns ->profit                         =    $request->input('profit');
            $submitreturns ->returns                        =    $request->input('returns');
            $submitreturns ->financial_year                 =    $request->input('financial_year');
            $submitreturns ->present_runningCapital         =    $present_runningCapital; 
            $submitreturns ->receiptID                      =    $receiptID;
            

            if($submitreturns->save()){
                $returns = DB::table('bursary_venture_returns')
                ->where('ventureID', $request->ventureID)->get()
                ->first();
    
                return redirect()->route('fetchreturns', ['fyear'=>Date('Y', strtotime($returns->created_at))])
                        ->with('success', 'Returns Submitted successfully');
                
            }
        }
/*************************************************************************************************************************************** */

/********************************************************************************************************************************************* */
public function updateReturns(Request $request)
    {

        $returns = DB::table('bursary_venture_returns')
            ->where('id', $request->id)->get()
            ->first();


        //*************************************************** */
        if($request->hasFile('update_receipt')){
            
            $extension              =   $request->file('update_receipt')->getClientOriginalExtension();
            $receiptID              =   'return_receipt'.time().'.'.$extension;
            
            //************************** UPLOAD THE FILE *****************************
            $request->file('update_receipt')->storeAs('public/returns_receipts', $receiptID );
            }
            else{
                $receiptID         = $request->update_receiptID;  
            }
           

        $update                                  =    ventureReturn::where('id', $request->id)->first();  
        $update ->profit                         =    $request->input('update_profit');
        $update ->receiptID                      =    $request->input('update_receiptID');
        $update->returns                         =    $request->input('update_returns');
        $update->financial_year                  =    $request->input('update_fyear');
        $update->receiptID                       =    $receiptID;
        $update->present_runningCapital          =    $request->initial_runningCapital + $request->update_profit - $request->update_returns; 
               

        if($update->save()){
            
            $returns = DB::table('bursary_venture_returns')
            ->where('id', $request->id)->get()
            ->first();

            return redirect()->route('fetchreturns', ['fyear'=>Date('Y', strtotime($returns->created_at))])
            ->with('success', 'Returns Updated Successfully');
        }
    }



/*************************************************************************************************************************************** */
    public function deleteReturns(Request $request)
    {
       
        

      $id = $request->id;
      $created_at = $request->created_at;
      $delete = ventureReturn::where('id', $id)->first();
        if($delete->delete()){

            $file_path = 'public/returns_receipts/'.$request->receiptID;

               //IF the file exists
            if (Storage::exists($file_path)) {

                //Delete the file
                Storage::delete($file_path);

                return redirect()->route('fetchreturns', ['fyear'=> $request->financial_year])
                        ->with('success', 'Returns Deleted Successfully');
            }
            else{
        return redirect()->route('fetchreturns', ['fyear'=> $request->financial_year])
                        ->with('error', 'Returns Not Deleted');
            }
              
            
                    
        } 
    }
/*************************************************************************************************************************************** */


}

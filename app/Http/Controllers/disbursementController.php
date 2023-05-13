<?php

namespace App\Http\Controllers;

use App\Models\disbursement;
use Illuminate\Http\Request;
use App\Models\staffBursaryData;
use App\Models\User;
use App\Models\disbursementApplication;
use Illuminate\Support\Facades\DB;
use crypt;
use Session;
use PDF;

class disbursementController extends Controller
{
    public function disbursementIndex()
    {
        // Generate a unique token for this request
        $token = md5(uniqid());
        // Store the token in the session
        session(['token' => $token]);

        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        // $f_year;
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');

        //Fetch all disbursments and dump in the make disbursment modal
        $disbursment_applications = DB::table('bursary_disbursementapplication')
        ->where('status', '=', 'Pending')->get();
        
            
        return view('/impress.disbursement')
                ->with('data1', $data1)
                ->with('disbursment_applications', $disbursment_applications)
                ->with('departments', $department)
                ->with('faculties', $faculties)
                ->with('financial_year', $f_year);
    }


//********************************************************************************************************************************************************** */
public function disbursement_applyIndex()
    {
        
       // $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $disbursment_application = DB::table('bursary_disbursementapplication')->get();
        
            
        return view('/impress.disbursment_apply')
                ->with('data1', $data1)
                ->with('disbursments', $disbursment_application)
                ->with('departments', $department);
    }
//**************************************************************************************************************************************************** */
                    public function disbursementApplication(Request $request)
                    {
                        
                        $apply                       =    new disbursementApplication();
                        $apply->name                 =    $request->input('apply_name');
                        $apply->designation          =    $request->input('apply_designation');
                        $apply->amount               =    $request->input('apply_amount');
                        $apply->purpose              =    $request->input('apply_purpose');
                        $apply->department           =    $request->input('apply_department');
                        $apply->date                 =    $request->input('apply_date');
                        $apply->status               =    'pending';

        

                    if($apply->save()){

                        
                        return redirect()->route('disbursement_applyIndex')
                                ->with('success', 'You"ve Successfully applied for Disbursment');
                        
                    }
                            }        

                    

// **********************************************************************************************************************************************************
public function editDisbursementApplication(Request $request)
    {
        
                $update                       =   disbursementApplication::where('id', $request->edit_id)->first();  
                $update->name                 =    $request->input('edit_name');
                $update->designation          =    $request->input('edit_designation');
                $update->amount               =    $request->input('edit_amount');
                $update->purpose              =    $request->input('edit_purpose');
                $update->department           =    $request->input('edit_department');
                $update->date                 =    $request->input('edit_date');
                $update->status               =    'pending';
               

        if($update->save()){
            

            return redirect()->route('disbursement_applyIndex')
            ->with('success', 'Application Updated successfully');
        }
    }
// **********************************************************************************************************************************************************

        public function deleteDisbursementApplication(Request $request)
            {
                    $id = $request->id;
                    $delete = disbursementApplication::where('id', $id)->first();
                    if($delete->delete()){
                
                    return redirect()->route('disbursement_applyIndex')
                    ->with('success', 'Application Deleted Successfully');
                            
                } 
            }

// ***********************************************************************************************************************************************************
    public function fetch(Request $request)
        {
       
            
                $disbursementslog = DB::table('bursary_disbursements')
                    ->where('department', '=', $request->dept)
                    ->whereYear('date', '=', $request->fyear)
                    ->get();

                    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                    $department = DB::table('bursary_faculties')->distinct()->get('department');
                    $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
                    $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
                    //Fetch all disbursments and dump in the make disbursment modal
                    $disbursment_applications = DB::table('bursary_disbursementapplication')
                    ->where('status', '=', 'Pending')->get();

                //return redirect()->route('disbursementIndex')
                return view('/impress.disbursement')
                    ->with('faculties', $faculties)
                    ->with('financial_year', $f_year)
                    ->with('data1', $data1)
                    ->with('departments', $department)
                    ->with('disbursment_applications', $disbursment_applications)
                    ->with('disbursements', $disbursementslog );
                    

                        
            }
// *************************************************************************************************************************************************************

    public function updateDisbursementView(Request $request)
    {   
        $id =$request->id;
        $updatedata = DB::table('bursary_disbursements')
            ->where('id', '=', $id)
            ->get()
            ->first();
            //return $updatedata;
                $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                return view('/impress.updateDisbursement')
                ->with('data1', $data1)
                ->with('data', $updatedata);
    }

    public function updateDisbursement(Request $request)
    {   
        // Generate a unique token for this request
        $token = md5(uniqid());
        // Store the token in the session
        session(['token' => $token]);

        $update                     =    disbursement::where('id', $request->id)->first();  
        $update ->amount            =    $request->input('amount');
        $update->financial_year     =    $request->input('financial_year');
               

        if($update->save()){
            $disbursementslog = DB::table('bursary_disbursements')
            ->where('department', '=', $request->department)
            ->where('financial_year', '=', $request->financial_year)
            ->get();

            //$data1 = User::where('staffNo', session()->get('staffNo'))->first();
            
            return redirect()->route('fetch', ['dept'=>$request->department
            , 'fyear'=>$request->financial_year])
            ->with('success', 'Disbursement information Updated successfully');

            // return redirect('disbursement')->with('data1', $data1)
            // ->with('success', 'Disbursement information Updated successfully')
            // ->with('disbursements', $disbursementslog);
        }
                   
        
    }

    public function deleteDisbursement(Request $request)
    {   
        $id = $request->id;

                    

        $delete = disbursement::where('id', $id)->first();
        if($delete->delete()){
           
            return redirect()->route('fetch', ['dept' => $request->department, 'fyear' => $request->financial_year, ])
                        ->with('success', 'Disbursement Deleted Successfully');
                    
        }
                
        
    }
  
    public function addDisbursement(Request $request)
    {  
        
        $fetchApplication =  DB::table('bursary_disbursementapplication')
        ->where('id', '=', $request->application)
        ->first();
        if($request->status=='Approve'){
        $addDisbursement                    =    new disbursement();
        $addDisbursement->name              =    $fetchApplication->name;
        $addDisbursement->department        =    $fetchApplication->department;
        $addDisbursement->designation       =    $fetchApplication->designation;
        $addDisbursement ->amount           =    $fetchApplication->amount;
        $addDisbursement ->date             =    $fetchApplication->date;
        $addDisbursement ->purpose          =    $fetchApplication->purpose;
        $addDisbursement ->message          =    $request->input('message');
        $addDisbursement ->status           =    $request->input('status');

        if($addDisbursement->save()){

            
             $update                       =   disbursementApplication::where('id', $request->application)->first();  
            $update->status               =    $request->input('status');
            $update->message              =    $request->input('message');

                $update->save();
            return redirect()->route('fetch', ['dept' => $fetchApplication->department, 'fyear' => $fetchApplication->date, ])
                    ->with('success', 'Disbursement has been '.$request->status);
            
        }
        }
        //If the Disbursement is Declined

        else{
            $update                       =   disbursementApplication::where('id', $request->application)->first();  
            $update->status               =    $request->input('status');
            $update->message              =    $request->input('message');

                $update->save();
            return redirect()->route('fetch', ['dept' => $fetchApplication->department, 'fyear' => $fetchApplication->date, ])
                    ->with('success', 'Disbursement has been '.$request->status);

        }
    }
  
       
        
       
        
    }
    


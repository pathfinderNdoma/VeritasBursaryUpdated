<?php

namespace App\Http\Controllers;

use App\Models\bidSubmitted;
use App\Models\contracts;
use Illuminate\Http\Request;
use App\Models\staffBursaryData;
use App\Models\User;
use App\Models\registeredContractors;
use App\Models\ServicesProcurred;
use App\Models\contractDefinition;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use crypt;
use Session;
use PDF;

class procurmentController extends Controller
{

    
    
    public function registeredContractors()
    {
        // Generate a unique token for this request
        $token = md5(uniqid());
        // Store the token in the session
        session(['token' => $token]);
        $contractors = DB::table('bursary_registered_contractors')->orderByDesc('created_at')->get();

        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
        
            
        return view('/procurment.registeredContractors')
                ->with('data1', $data1)
                ->with('contractors', $contractors)
                ->with('departments', $department)
                ->with('faculties', $faculties);
    }



    public function createContractsIndex(Request $request)
    {
        // Generate a unique token for this request
        $token = md5(uniqid());
        // Store the token in the session
        session(['token' => $token]);
        $contractors = DB::table('bursary_registered_contractors')->orderByDesc('created_at')->get();

        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        
            
        return view('/procurment.createContracts')
                ->with('data1', $data1)
                ->with('contractors', $contractors)
                ->with('departments', $department)
                ->with('financial_year', $f_year)
                ->with('faculties', $faculties);
    }       


    public function fetchContracts(Request $request)
    {
        $fyear = $request->financial_year;
        
        $contracts = DB::table('bursary_contracts')
            ->whereYear('financial_year',  $fyear)
            ->orderByDesc('created_at')
            ->get();
        
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        
            
        return view('/procurment.createContracts')
                ->with('data1', $data1)
                ->with('contracts', $contracts)
                ->with('departments', $department)
                ->with('financial_year', $f_year)
                ->with('faculties', $faculties);
    }




    public function viewdefinedContracts(Request $request)
    {
        $contractID = $request->contract_id;
        
        $definedcontracts = DB::table('bursary_contract_definitions')
            ->where('contractID', '=', $contractID)
            ->orderByDesc('created_at')
            ->get();
        
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        $contracts= DB::table('bursary_contracts')
        ->where('status', 'open')
        ->orderByDesc('created_at')->get();
            
        return view('/procurment.viewContractsDefinition')
                ->with('data1', $data1)
                ->with('contracts', $contracts)
                ->with('definedcontracts', $definedcontracts)
                ->with('departments', $department)
                ->with('financial_year', $f_year)
                ->with('faculties', $faculties);
    }









    public function createContract(Request $request)
    {  
    
        $numinput = '0123456789';
        $numstrength = 5;
        $input_length = strlen($numinput);
        $num = '';
        for($i = 0; $i < $numstrength; $i++) {
            $random_num = $numinput[mt_rand(0, $input_length - 1)];
            $num.= $random_num;
        }
    
        //Generating character
        $charinput = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charstrength = 4;
        $input_length = strlen($charinput);
        $char = '';
        for($i = 0; $i < $charstrength; $i++) {
            $random_char = $charinput[mt_rand(0, $input_length - 1)];
            $char.= $random_char;
        }
       
        $unique_id = $num.$char;
        
        $createContracts                           =    new contracts();
        $createContracts->contractName             =    $request->input('contractName');
        $createContracts->financial_year           =    $request->input('fyear');
        $createContracts->contractID               =   $unique_id;
        $createContracts->status                   =    "Open";

        

        if($createContracts->save()){
           

            return redirect()->route('fetchContracts', [
                    'financial_year' => $request->fyear, ])
                    ->with('success', 'Contract Added Successfully');
            
        }
        }

 //*******************************************CONTRACT DEFINITION */  
 public function contractsDefinitionIndex(Request $request)
    {
        // Generate a unique token for this request
        $token = md5(uniqid());
        session(['token' => $token]);


        $contracts = DB::table('bursary_contracts')
        ->where('status', 'open')
        ->where(function ($query) {
            $query->where('approval_status', '!=', 'Approve')
                  ->orWhereNull('approval_status');
        })
        ->orderByDesc('created_at')
        ->get();


        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        
            
        return view('/procurment.contractsDefinition')
                ->with('data1', $data1)
                ->with('contracts', $contracts)
                ->with('departments', $department)
                ->with('financial_year', $f_year)
                ->with('faculties', $faculties);
                
    }
    



    //***************************FUNCTION TO FETCH DATA FOR CONTRACT DEFINITION */  
    public function getData(Request $request)
    {
        $data = DB::table('bursary_contracts')->where('contractID', $request->id)->get();
        return response()->json($data);
    }




    public function definedContracts(Request $request)
    {
        $contractID = $request->contract_id;
        
        $definedcontracts = DB::table('bursary_contract_definitions')
            ->where('contractID', '=', $contractID)
            ->orderByDesc('created_at')
            ->get();
        
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        $contracts= DB::table('bursary_contracts')
        ->where('status', 'open')
        ->orderByDesc('created_at')->get();
            
        return view('/procurment.contractsDefinition')
                ->with('data1', $data1)
                ->with('contracts', $contracts)
                ->with('definedcontracts', $definedcontracts)
                ->with('departments', $department)
                ->with('financial_year', $f_year)
                ->with('faculties', $faculties);
    }




  
    public function contracts_definition(Request $request)
    {  

        $defineContract                         =    new contractDefinition();
        $defineContract->contract               =    $request->input('contractName');
        $defineContract->contractID             =    $request->input('contractID');
        $defineContract->product_serviceName    =    $request->input('product_service_name');
        $defineContract->financial_year         =    $request->input('fyear');
        $defineContract->quantity               =    $request->input('quantity');
        $defineContract->description            =    $request->input('description');
        $defineContract->dateCreated            =    $request->input('dateCreated');

        if($defineContract ->save()){
           
            
            return redirect()->route('definedContracts', [
                    'contract_id' => $request->contractID, ])
                    ->with('success', 'New Contract Defined');
            
        }
        }

// ****************** ***************************************FUNCTION TO EDIT CONTRACT STATUS STARTS*****************************************************
        public function editContractStatus(Request $request)
        {  
             
            $updateStatus = contracts::query() 
            ->where('contractID', $request->contractID)
            ->first();
 
                 if ($updateStatus) {
                 $updateStatus->status                 = $request->input('status');
                  
                 if($updateStatus->save()){
                     return redirect()->route('fetchContracts', [
                         'financial_year' => $request->fyear, 
                     ])->with('success', 'Contract status changed');  
                 }
                 }
                
            }
            

        // ***************************************************FUNCTION TO EDIT CONTRACT STATUS ENDS*************************



        

// ***************************************BIDS SUBMITTED/
        public function bidsIndex(Request $request)
            {
                // Generate a unique token for this request
                $token = md5(uniqid());
                // Store the token in the session
                session(['token' => $token]);
                $contracts= DB::table('bursary_contracts')
                ->where('status', 'open')
                ->orderByDesc('created_at')->get();

                $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                $department = DB::table('bursary_faculties')->distinct()->get('department');
                $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
                $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
                
                    
                return view('/procurment.bidSubmission')
                        ->with('data1', $data1)
                        ->with('contracts', $contracts)
                        ->with('departments', $department)
                        ->with('financial_year', $f_year)
                        ->with('faculties', $faculties);
            }    


    public function fetchbids(Request $request)
    {
        $contractID = $request->contract_id;
        
        $fetchedbids= DB::table('bursary_bid_submitteds')
            ->where('contractID', '=', $contractID)
            ->orderByDesc('created_at')
            ->get();
        
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
        $contracts= DB::table('bursary_contracts')
        ->where('status', 'open')
        ->orderByDesc('created_at')->get();
            
        return view('/procurment.bidSubmission')
                ->with('data1', $data1)
                ->with('contracts', $contracts)
                ->with('fetchedbids', $fetchedbids)
                ->with('departments', $department)
                ->with('faculties', $faculties);
    }






    public function bidsubmittedaction(Request $request)
    {   
       
        $msg = htmlspecialchars($request->message);
        $current_timestamp = time();
        $formatted_date = date("Y-m-d H:i:s", $current_timestamp);

        if($request->hasFile('contract_letter')){
            
            $extension = $request->file('contract_letter')->getClientOriginalExtension();
            $filenameToStore = 'contract_letter_for_'.$request->contractID.'.'.$extension;
            
            //************************** UPLOAD THE FILE *****************************
            $request->file('contract_letter')->storeAs('public/contract_letters', $filenameToStore);
        }
        else{
            $filenameToStore = '';  
        }

        $update = bidSubmitted::query() 
           ->where('contractID', $request->contractID)
           ->where('contractorID', $request->contractorID)
           ->first();
        return $update;
                if ($update) {
                $update->status                 = $request->stats;
                $update->approval_date          = $formatted_date; 
                $update->message                = $msg;
                $update->contract_letter         = $filenameToStore;

                if($update->save()){

                    // ************************IF THE BID IS APPROVED, UPDATE THE CONTRACT STATUS TO SHOW THAT THE BID HAS BEEN APPROVED

                    $updateContractTable = contracts::query() 
                    ->where('contractID', $request->contractID)
                    ->first();

                    $updateContractTable->approval_status = ucfirst($request->stats); 
                    $updateContractTable->save();
                    // ************************IF THE BID IS APPROVED, UPDATE THE CONTRACT STATUS TO SHOW THAT THE BID HAS BEEN APPROVED
                    return redirect()->route('fetchbids', [
                        'contractID' => $request->contractID, 
                    ])->with('success', 'Bid has been '.$request->status);  
                }
                }

                // if $update is null, return an error message or redirect to a 404 page          
    }


    public function approvedContracts(Request $request)
    {
        
        
        $approvedContracts= DB::table('bursary_bid_submitteds')
            ->whereYear('financial_year', '=', $request->financial_year)
            ->where('status', '=', 'Approve')
            ->orderByDesc('created_at')
            ->get();
        
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');

        $contracts= DB::table('bursary_contracts')
        ->where('status', 'open')
        ->orderByDesc('created_at')->get();
            
        return view('/procurment.approvedBids')
                ->with('data1', $data1)
                ->with('contracts', $contracts)
                ->with('approvedContracts',  $approvedContracts)
                ->with('departments', $department)
                ->with('financial_year', $f_year)
                ->with('faculties', $faculties);
    }

// ****************** ***************************************SERVICES PROCURRED COMES HERE*****************************************************
    public function serviceIndex(Request $request)
        {
            

            $data1 = User::where('staffNo', session()->get('staffNo'))->first();
            $department = DB::table('bursary_faculties')->distinct()->get('department');
            $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
            $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
            
                
            return view('/procurment.service')
                    ->with('data1', $data1)
                    ->with('departments', $department)
                    ->with('financial_year', $f_year)
                    ->with('faculties', $faculties);
        } 
// ****************** ***************************************SERVICES PROCURRED COMES HERE**************************************************************
    public function addService(Request $request)
        {

        //*************************************************** */
            if($request->hasFile('receipt')){
            
            $extension              =   $request->file('receipt')->getClientOriginalExtension();
            $receiptID              =   'servicesProcurred_receipt'.time().'.'.$extension;
            
            //************************** UPLOAD THE FILE *****************************
            $request->file('receipt')->storeAs('public/Services_Procurred', $receiptID );
            }
            
        // *************************************************** */
                                $numinput = '0123456789';
                                $numstrength = 5;
                                $input_length = strlen($numinput);
                                $num = '';
                                for($i = 0; $i < $numstrength; $i++) {
                                    $random_num = $numinput[mt_rand(0, $input_length - 1)];
                                    $num.= $random_num;
                                }
                            
                                //Generating character
                                $charinput = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $charstrength = 4;
                                $input_length = strlen($charinput);
                                $char = '';
                                for($i = 0; $i < $charstrength; $i++) {
                                    $random_char = $charinput[mt_rand(0, $input_length - 1)];
                                    $char.= $random_char;
                                }
                            
                                $serviceID = $num.$char;
        // *************************************************** */
            
            $addService                                 =    new ServicesProcurred();
            $addService->serviceType                    =    $request->input('serviceType');
            $addService->description                    =    $request->input('description');
            $addService->amount                         =   $request->input('amount');
            $addService->dateofCommmencement            =    $request->input('dateofCommmencement');
            
            $addService->dateofCompletion               =    $request->input('dateofCompletion');
            $addService->supervisedby                   =   $request->input('supervisedby');
            $addService->designation	                =    $request->input('designation');
            $addService->receipt	                    =    $request->input('receipt');
            $addService->serviceID	                    =    $serviceID ;
            $addService->receipt	                    =    $receiptID ; 


            // $addService->sightedby                      =    '';
            // $addService->sightedbyDesignation           =   '';
            // $addService->dateofSightation               =    '';
            

            if($addService->save()){
            

                return redirect()->route('serviceIndex')
                        ->with('success', 'Service procurred added successfully');
                
            }
        }

// ****************** ***************************************FETCH SERVICES***********************************************************************************
        public function fetchService(Request $request)
        {
            
            $services = DB::table('bursary_servicesprocurred')
            ->whereYear('dateofCommmencement', $request->year )
           ->get();
            
                
           $data1 = User::where('staffNo', session()->get('staffNo'))->first();
           $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
           
               
           return view('/procurment.service')
                   ->with('data1', $data1)
                   ->with('services', $services)
                   ->with('financial_year', $f_year);
        } 

     //****************************************************************************************************************^^^^^^^******************************** */ 
     public function updateService(Request $request)
     {
             
             
         
         //*************************************************** */
             if(($request->hasFile('update_receipt'))){
                
             $receipt_extension              =   $request->file('update_receipt')->getClientOriginalExtension();
             $receiptID                      =   'servicesProcurred_receipt'.time().'.'.$receipt_extension;
            
             //************************** UPLOAD THE FILE *****************************
             $request->file('update_receipt')->storeAs('public/Services_Procurred', $receiptID );
             
             }

             else{
                $receiptID =$request->update_receiptVal;
             }

               
             $update_Service                               =    ServicesProcurred::where('id', $request->update_id)->first();
             $update_Service->serviceType                  =    $request->input('update_serviceType');
             $update_Service->description                  =    $request->input('update_description');
             $update_Service->amount                       =    $request->input('update_amount');
             $update_Service->dateofCommmencement          =    $request->input('update_dateofCommmencement');
            
             $update_Service->dateofCompletion             =    $request->input('update_dateofCompletion');
             $update_Service->supervisedby                 =    $request->input('update_supervisedby');
             $update_Service->designation	               =    $request->input('update_designation');
             $update_Service->receipt	                   =    $request->input('update_receipt');
             $update_Service->receipt	                   =    $receiptID ; 
             

             if($update_Service->save()){
                     
                 return redirect()->route('fetchService')
                        ->with('year', $request->update_dateofCommmencement)
                         ->with('success', 'Service updated successfully');
                 
             }


         
         
         }  


// ****************** ***************************************DeleteSERVICES***********************************************************************************
                public function deleteService(Request $request)
                    {

                    

                $id = $request->id;

                $delete = ServicesProcurred::where('id', '=', $id)->first();
                    if($delete->delete()){

                        $servicesRecipt = 'public/Services_Procurred'.$request->receipt;
                        
                        //DELETE PAYMENT RECEIPT
                        if (Storage::exists($servicesRecipt)) {

                            //Delete the file
                            Storage::delete($servicesRecipt);
                        }

                    return redirect()->route('fetchService')
                                    ->with('success', 'Service Deleted Successfully')
                                    ->with('year', $request->year);
                    //END OF DELETE SECTION
                    }

                    else{
                        return redirect()->route('fetchService')
                                        ->with('error', 'Service Not Deleted');
                            } 

                }  
// ****************** ***************************************DeleteSERVICES***********************************************************************************

}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\staffBursaryData;
use App\Models\User;
use App\Models\available_properties;
use Illuminate\Support\Facades\DB;
use App\Models\assign_properties;
use App\Models\properties_in_use;
use crypt;
use Session;
use PDF;

class Rent_LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function availablePropertiesIndex()
    {
        {
            // Generate a unique token for this request
            $token = md5(uniqid());
            // Store the token in the session
            session(['token' => $token]);
            $available_properties = DB::table('bursary_available_properties')->orderByDesc('created_at')->get();
            $data1 = User::where('staffNo', session()->get('staffNo'))->first();
            
            
                
            return view('/rent_lease.available_properties')
                    ->with('data1', $data1)
                    ->with('available_properties', $available_properties);
                    
        }   
    }

    public function addProperty(Request $request)
    {
        $addProperty                            =    new available_properties();
        $addProperty->property_name             =    $request->input('property_name');
        $addProperty->property_location         =    $request->input('property_location');
        $addProperty->description               =   $request->input('description');
        $addProperty->amount                    =    $request->input('amount');
        $addProperty->usage                     =    $request->input('usage');  
        

        if($addProperty->save()){
           

            return redirect()->route('availablePropertiesIndex')
                    ->with('success', 'New Property Added Successfully');
            
        }
    }

    
    public function updateproperty(Request $request)
    {
        
        $update                             =    available_properties::where('id', $request->id)->first();  
        $update ->property_name             =    $request->input('property_name');
        $update ->property_location         =    $request->input('property_location');
        $update->description                =    $request->input('description');
        $update ->amount                    =    $request->input('amount');
        $update ->usage                     =    $request->input('usage');
               

        if($update->save()){
            

            return redirect()->route('availablePropertiesIndex')
            ->with('success', 'Property information Updated successfully');
        }
    }

    public function deleteproperty(Request $request)
    {
      $id = $request->id;
      $created_at = $request->created_at;
      $delete = available_properties::where('id', $id)->first();
        if($delete->delete()){
           
            return redirect()->route('availablePropertiesIndex')
                        ->with('success', 'Property Deleted Successfully');
                    
        } 
    }


//********************************************************ASSIGN PROPERTIES  SECTION*********************************************************** */
public function assignPropertyIndex()
    {
        {
            // Generate a unique token for this request
            $token = md5(uniqid());
            // Store the token in the session
            session(['token' => $token]);
            $assigned_properties = DB::table('bursary_assign_properties')->orderByDesc('created_at')->get();
           // return $assigned_properties;
            $available_properties = DB::table('bursary_available_properties')->orderByDesc('created_at')->get();
            $data1 = User::where('staffNo', session()->get('staffNo'))->first();
            
            
                
            return view('/rent_lease.assign_properties')
                    ->with('data1', $data1)
                    ->with('assigned_properties', $assigned_properties)
                    ->with('available_properties', $available_properties);
                    
        }   
    }
//********************************************************************************PROPERTY INFO FUNCTION */
public function propertyInfo(Request $request)
{
    
        $propertyInfo = DB::table('bursary_available_properties')
        ->where('id', $request->id)
        ->orderByDesc('created_at')->get();
        return response()->json($propertyInfo);
                
     
}


    public function assignproperty(Request $request)
    {
        $assignProperty                           =    new assign_properties();
        $assignProperty->property_name            =    $request->input('propertyName');
        $assignProperty->property_location        =    $request->input('propertyLocation');
        $assignProperty->description              =    $request->input('descript');
        $assignProperty->amount                   =    $request->input('propertyAmount');
        $assignProperty->usage                    =    $request->input('propertyUsage');
        $assignProperty->start_date               =    $request->input('startDate');
        $assignProperty->end_date                 =    $request->input('endDate');
        $assignProperty->applicant_name           =    $request->input('applicant_name'); 
        $assignProperty->address                  =    $request->input('address');
        $assignProperty->phone_number             =    $request->input('phone');
        $assignProperty->email_address            =    $request->input('email');
        
        if($assignProperty->save()){
            

            return redirect()->route('assignPropertyIndex')
                    ->with('success', 'Property Assigned Successfully');
            
        }
                        
    }

    public function updateAssignProperty(Request $request)
    {
       
        if($request->hasFile('update_receipt')){
            
            $extension = $request->file('update_receipt')->getClientOriginalExtension();
            $filenameToStore = 'assigned_receipt_'.time().'.'.$extension;
            
            //************************** UPLOAD THE FILE *****************************
            $request->file('update_receipt')->storeAs('public/properties_receipt', $filenameToStore);
        }
        else{
            $filenameToStore = '';  
        }

        $update                            =    assign_properties::where('id', $request->id)->first();  
       
        $update->property_name             =    $request->input('updateProperty_Name');
        $update->property_location         =    $request->input('updatePropertyLocation');
        $update->description               =   $request->input('updateDescript');
        $update->amount                    =    $request->input('updatePropertyAmount');
        $update->usage                     =    $request->input('updatePropertyUsage');
        $update->start_date                =    $request->input('updateStartDate');
        $update->end_date                  =    $request->input('updateEndDate'); 
        $update->receiptID                 =    $filenameToStore; 
        if($update->save()){
            

            return redirect()->route('assignPropertyIndex')
                    ->with('success', 'Updated Successfully');
            
        }
                        
    }




    public function submitReceipt(Request $request)
    {
        if($request->hasFile('receipt')){
            
            $extension              =   $request->file('receipt')->getClientOriginalExtension();
            $filenameToStore        =   'assigned_receipt_'.time().'.'.$extension;
            
            //************************** UPLOAD THE FILE *****************************
            $request->file('receipt')->storeAs('public/properties_receipt', $filenameToStore);
        }
        else{
            $filenameToStore        = '';  
        }

        $update                     =    assign_properties::where('id', $request->propertyID)->first();  
        $update ->receiptID         =    $filenameToStore;
                       
        if($update->save()){
            $assigned_properties    =    DB::table('bursary_assign_properties')
            ->where('id', $request->propertyID)
            ->orderByDesc('created_at')->get()->first();
                   
           //***************************** */ //SEND THE PROPERTY INFORMATION TO PROPERTY IN USE TABLE*********************************************************
           $propertyInUse                           =    new properties_in_use();
           $propertyInUse->property_name            =    $assigned_properties->property_name;
           $propertyInUse->property_location        =    $assigned_properties->property_location;
           $propertyInUse->description              =   $assigned_properties->description;
           $propertyInUse->amount                   =    $assigned_properties->amount;
           $propertyInUse->usage                    =    $assigned_properties->usage;
           $propertyInUse->start_date               =   $assigned_properties->start_date;
           $propertyInUse->end_date                 =    $assigned_properties->end_date; 
           $propertyInUse->receiptID                =   $assigned_properties->receiptID;
           
           if($propertyInUse->save()){
            $delete = assign_properties::where('id', $request->propertyID)->first();
            if($delete->delete()){
               
                return redirect()->route('assignPropertyIndex')
                ->with('success', 'Receipt Updated Successfully');
            }
           //****************************************************************************** */    
           }
            
          
          //******************************************************************** */  
        }

    }

    public function propertiesInUseIndex(Request $request)
    {
        // Generate a unique token for this request
        $token = md5(uniqid());
        // Store the token in the session
        session(['token' => $token]);
        $contracts= DB::table('bursary_contracts')
        ->where('status', 'open')
        ->orderByDesc('created_at')->get();

        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $year = DB::table('bursary_properties_in_uses')->distinct()->get('start_date');
        
        
            
        return view('/rent_lease.propertiesInUse')
                ->with('data1', $data1)
                ->with('year', $year);
    }  
    
    public function fectchpropertiesInUse(Request $request)
    {
        
        $propertiesinuse= DB::table('bursary_properties_in_uses')
        ->whereYear('start_date', $request->year)
        ->orderByDesc('created_at')->get();
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $year = DB::table('bursary_properties_in_uses')->distinct()->get('start_date');
        
        
            
        return view('/rent_lease.propertiesInUse')
                ->with('data1', $data1)
                ->with('properties', $propertiesinuse)
                ->with('year', $year);
    }  

}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\staffBursaryData;
use App\Models\User;
use App\Models\ventures;
use App\Models\SalaryDefinition;
use Illuminate\Support\Facades\DB;
use App\Models\ventureReturn;
use App\Models\OtherDeductions;
use DateTime;
use crypt;
use Session;
use PDF;

class salaryDefinitionController extends Controller
{

    public function salaryDefIndex(Request $request)
    {
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $salaryDefinition = DB::table('bursary_salary_definitions')->get();
        return view('/staffACC.salaryDefinition')
        ->with('salaryDefinition', $salaryDefinition)
        ->with('data1', $data1);

              }


    public function defineSalary(Request $request)
    {


                    $add_salary_definition                    = new SalaryDefinition();
                    $add_salary_definition ->gradeLevel      =  $request->input('grade_level');
                    $add_salary_definition ->basicSalary      =  $request->input('basicSalary');
                    $add_salary_definition ->allowance        =  $request->input('allowance');
                    $add_salary_definition ->tax              =  $request->input('tax');
                    $add_salary_definition ->pension          =  $request->input('pension');
                    $add_salary_definition ->designation      =  $request->input('designation');
                    $add_salary_definition ->bonus            =  $request->input('bonus');
                    $add_salary_definition ->otherDeductions  =  $request->input('otherDeductions');


              if($add_salary_definition->save()){

                  return redirect()->route('salaryDefIndex')
                          ->with('success', 'Salary Definition Added');

              }
        }
// ***********************************************************************************************************************************************
        public function delete(Request $request)
            {
                $id = $request->id;
                $delete = SalaryDefinition::where('id', $id)->first();
                    if($delete->delete())
                    {
                    
                        return redirect()->route('salaryDefIndex')
                                 ->with('success', 'Salary Definition Deleted Successfully');
                                
                    } 
            }

// ***********************************************************************************************************************************************
                public function updateSalaryDefinitionview(Request $request)
                {
                    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                    $salaryDefinition = DB::table('bursary_salary_definitions')->where('id', $request->id)->first();
                    return view('inc.updateSalary_definition_modal')
                    ->with('data', $salaryDefinition)
                    ->with('data1', $data1);
            
                          }

            public function updateDefinition(Request $request)
            {

                        $update_salary_definition                    =  SalaryDefinition::where('id', $request->id)->first();
                        $update_salary_definition ->gradeLevel       =  $request->input('grade_level');
                        $update_salary_definition ->designation      =  $request->input('designation');
                        $update_salary_definition ->basicSalary      =  $request->input('basicSalary');
                        $update_salary_definition ->allowance        =  $request->input('allowance');
                        $update_salary_definition ->tax              =  $request->input('tax');
                        $update_salary_definition ->pension          =  $request->input('pension');
                        $update_salary_definition ->designation      =  $request->input('designation');
                        $update_salary_definition ->bonus            =  $request->input('bonus');
                        $update_salary_definition ->otherDeductions  =  $request->input('otherDeductions');               

                    if($update_salary_definition->save()){
            
                                    return redirect()->route('salaryDefIndex')
                                    ->with('success', 'Salary Definition Updated Successfully');
                    }
            }
// ******************************************************************OTHER DEDUCTIONS****************************************************************************
public function otherDeductionsIndex(Request $request)
{   

            $data1              = User::where('staffNo', session()->get('staffNo'))->first();
            $department         = DB::table('bursary_faculties')->distinct()->get('department');
            $f_year             = DB::table('bursary_financial_years')->distinct()->pluck('year');
            $deductions         = DB::table('bursary_otherdeductions')->get();
            
            return view('/staffACC.defineDeductions')
            ->with('department', $department)
            ->with('financial_year', $f_year) 
            ->with('staffs', $deductions)
            ->with('data1', $data1);

          }


 // ******************************************************************OTHER DEDUCTIONS************************************************************************
public function deductionstaffs(Request $request)
{   
   
    $getstaff= DB::table('bursary_users')->where('department', $request->department)->get();

                //IF It is a new record been added
                if($request->requestType=='new'){
                    $staffs = '<label for="gradelevel">Staff No</label>
                    <select class="form-control lineColor" name="staffNo" id="staffNo" required>
                     <option value="">--Select Staff No--</option>';
                     foreach ($getstaff as $data){
                    $staffs .= '<option>'.$data->staffNo.'</option>';
                                }
                                
                    $staffs .=  '</select>';
                }

                else{
                    $staffs = '<label for="gradelevel">Staff No</label>
                    <select class="form-control lineColor" name="update_staffNo" id="update_staffNo" required>
                     <option value="">--Select Staff No--</option>';
                     foreach ($getstaff as $data){
                    $staffs .= '<option>'.$data->staffNo.'</option>';
                                }
                                
                    $staffs .=  '</select>';  
                }              
                return response()->json(['staffs'=>$staffs]);  
               
          }
// ******************************************************************OTHER DEDUCTIONS************************************************************************
public function fetchDeductionStaffs(Request $request)
{                
                //Set column name
                $columnName = $request->deductions; 
                //Fetch staffs under deductions

                $staffs = OtherDeductions::whereNotNull($columnName)->orWhere($columnName, '=', '')->get(); 

                $data1              = User::where('staffNo', session()->get('staffNo'))->first();
                $f_year             = DB::table('bursary_financial_years')->distinct()->pluck('year');
                $department         = DB::table('bursary_faculties')->distinct()->get('department');

                return view('staffACC.defineDeductions')
                ->with('staffs', $staffs)
                ->with('deductiontype', $columnName)
                ->with('data1', $data1)
                ->with('financial_year', $f_year)
                ->with('department', $department);
          }
// ******************************************************************OTHER DEDUCTIONS************************************************************************

        public function staffDetails(Request $request)
        {           
                       
                        $getstaff = DB::table('bursary_users')->where('staffNo', $request->staffNo)->first();
                        return response()->json([$getstaff]);  
            
                }
// ******************************************************************OTHER DEDUCTIONS************************************************************************
            public function addDeductions(Request $request)
            { 
               
            //Save to database
                $addOtherDeductions                                     =        new OtherDeductions();
                $addOtherDeductions->staffNo                            =        $request->input('staff_no');
                $addOtherDeductions->name                               =        $request->input('staffName');
                $addOtherDeductions->department                         =        $request->input('department');

                $addOtherDeductions->designation                        =        $request->input('designation');
                $addOtherDeductions->financial_year                     =        $request->input('year');

                if($request->deduction==='nhia'){
                    $addOtherDeductions->nhia                           =        $request->input('amount');
                } 

                if($request->deduction==='nhf'){
                    $addOtherDeductions->nhf                                 =        $request->input('amount');
                }

                if($request->deduction==='university_loan'){
                    $addOtherDeductions->university_loan                      =        $request->input('amount');
                }

                if($request->deduction==='cooperative_loan'){
                    $addOtherDeductions->cooperative_loan                      =        $request->input('amount');
                }

                if($request->deduction==='commodity_loan'){
                    $addOtherDeductions->commodity_loan                        =        $request->input('amount');
                }

                if($request->deduction==='cooperative_contribution'){
                    $addOtherDeductions->cooperative_contribution              =        $request->input('amount');
                }

                if($request->deduction==='school_fees'){
                    $addOtherDeductions->school_fees                           =        $request->input('amount');
                }

               
                $addOtherDeductions->span                                   =        $request->input('numberMonths');
                $addOtherDeductions->duration                               =        $request->input('numberMonths');
                $addOtherDeductions->amount                                 =        $request->input('amount');
                //Get current month start with.
                
                $addOtherDeductions->currentMonth                       =        date('m', strtotime($request->startDate));
                $addOtherDeductions->startDate                          =        $request->input('startDate');
                $addOtherDeductions->endDate                            =        $request->input('endDate');
          

          if($addOtherDeductions->save()){
                  
              return redirect()->route('otherDeductionsIndex')
                      ->with('success', 'OtherDeductions Added');
              
          }    
            }
// ****************************************************************************************************************************************************
public function deleteOtherDeductions(Request $request)
            {
                $id = $request->id;
                $delete = OtherDeductions::where('id', $id)->first();
                    if($delete->delete())
                    {
                    
                        return redirect()->route('otherDeductionsIndex')
                                 ->with('success', 'Deduction Deleted Successfully');
                                
                    } 
            }
            // ******************************************************************OTHER DEDUCTIONS************************************************************************
    public function updateDeductions(Request $request)
        { 
                
            ///Save to database
            
            $updateDeductions = OtherDeductions::query()->where('id', $request->update_id)->first();
           

            $updateDeductions->staffNo                            =        $request->input('update_staff_no');
            $updateDeductions->name                               =        $request->input('update_staffName');
            $updateDeductions->department                         =        $request->input('update_department');

            $updateDeductions->designation                        =        $request->input('update_designation');
            $updateDeductions->financial_year                     =        $request->input('update_year');

            if($request->update_deduction==='nhia'){
                $updateDeductions->nhia                           =        $request->input('update_amount');

                //Set all other columns to null
                $updateDeductions->nhf                                  =        null;
                $updateDeductions->university_loan                      =        null;
                $updateDeductions->cooperative_loan                      =       null;
                $updateDeductions->commodity_loan                        =       null;
                $updateDeductions->cooperative_contribution              =       null;
                $updateDeductions->school_fees                           =       null;
                
            } 

            if($request->update_deduction==='nhf'){
                $updateDeductions->nhf                                 =        $request->input('update_amount');
                //Set all other columns to null
                $updateDeductions->nhia                                 =        null;
                $updateDeductions->university_loan                      =        null;
                $updateDeductions->cooperative_loan                      =       null;
                $updateDeductions->commodity_loan                        =       null;
                $updateDeductions->cooperative_contribution              =       null;
                $updateDeductions->school_fees                           =       null;
            }

            if($request->update_deduction==='university_loan'){
                $updateDeductions->university_loan                      =        $request->input('update_amount');
                //Set all other columns to null
                $updateDeductions->nhia                                 =        null;
                $updateDeductions->nhf                                  =        null;
                $updateDeductions->cooperative_loan                      =       null;
                $updateDeductions->commodity_loan                        =       null;
                $updateDeductions->cooperative_contribution              =       null;
                $updateDeductions->school_fees                           =       null;
            }

            if($request->update_deduction==='cooperative_loan'){
                $updateDeductions->cooperative_loan                      =        $request->input('update_amount');
                //Set all other columns to null
                $updateDeductions->nhia                                 =        null;
                $updateDeductions->nhf                                  =        null;
                $updateDeductions->university_loan                      =        null;
                $updateDeductions->commodity_loan                        =       null;
                $updateDeductions->cooperative_contribution              =       null;
                $updateDeductions->school_fees                           =       null;
            }

            if($request->update_deduction==='commodity_loan'){
                $updateDeductions->commodity_loan                        =        $request->input('update_amount');
                //Set all other columns to null
                $updateDeductions->nhia                                 =        null;
                $updateDeductions->nhf                                  =        null;
                $updateDeductions->university_loan                      =        null;
                $updateDeductions->cooperative_loan                      =       null;
                $updateDeductions->cooperative_contribution              =       null;
                $updateDeductions->school_fees                           =       null;
            }

            if($request->update_deduction==='cooperative_contribution'){
                $updateDeductions->cooperative_contribution              =        $request->input('update_amount');
                //Set all other columns to null
                $updateDeductions->nhia                                 =        null;
                $updateDeductions->nhf                                  =        null;
                $updateDeductions->university_loan                      =        null;
                $updateDeductions->cooperative_loan                      =       null;
                $updateDeductions->commodity_loan                        =       null;
                $updateDeductions->school_fees                           =       null;
            }

            if($request->update_deduction==='school_fees'){
                $updateDeductions->school_fees                           =        $request->input('update_amount');
                //Set all other columns to null
                $updateDeductions->nhia                                 =        null;
                $updateDeductions->nhf                                  =        null;
                $updateDeductions->university_loan                      =        null;
                $updateDeductions->cooperative_loan                      =       null;
                $updateDeductions->commodity_loan                        =       null;
                $updateDeductions->cooperative_contribution              =       null;
            }

            
            $updateDeductions->span                                   =        $request->input('update_numberMonths');
            $updateDeductions->duration                               =        $request->input('update_numberMonths');
            $updateDeductions->amount                                 =        $request->input('update_amount');
            //Get current month start with.
            
            $updateDeductions->currentMonth                           =        date('m', strtotime($request->update_startDate));
            $updateDeductions->startDate                              =        $request->input('update_startDate');
            $updateDeductions->endDate                                =        $request->input('update_endDate');
        

        if($updateDeductions->save()){
                
            return redirect()->route('fetchDeductionStaffs', ['deductions'=>$request->update_deduction])
                    ->with('success', 'Deduction information updated succesfully');
            
        }    
        }
// ****************************************************************************************************************************************************
}

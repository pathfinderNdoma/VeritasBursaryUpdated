<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\schoolFeesDefinition;

class schoolFeesDefinitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $school_fees_def = DB::table('bursary_school_fees_definitions')
        ->get();
        return view('/studentAcc.schoolFeesDefinition')
        ->with('data1', $data1)
        ->with('department', $department)
        ->with('data', $school_fees_def);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        
       $add_schoolfees_def                   =  new schoolFeesDefinition();
       $add_schoolfees_def->fee              =  $request->input('fees');
       $add_schoolfees_def->department       =  $request->input('department');
       $add_schoolfees_def->amount           =  $request->input('amount');
       $add_schoolfees_def->description      =  $request->input('description');
      

       if($add_schoolfees_def->save()){
        $school_def = DB::table('bursary_school_fees_definitions')
        ->get();
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        return redirect('schoolFeesDef')->with('data', $school_def)->with('data1', $data1)->with('success', 'School Fees Definition Added');
       }
       
    }

    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateview(Request $request)
    {
        $id = $request->id;
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $schoolFees_def = DB::table('bursary_school_fees_definitions')
        ->where('id', '=', $id)
         ->first();
        return view('/studentAcc.updateSchool_fees_definition')
        ->with('data1', $data1)
        ->with('department', $department)
        ->with('data', $schoolFees_def);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $update                     = schoolFeesDefinition::where('id', $request->id)->first();  
        $update ->fee               =  $request->input('fees');
        $update ->department              =  $request->input('department');
        $update->amount             =  $request->input('amount');
        $update ->description       =  $request->input('description');
        
        

        $update->save();
            $data1 = User::where('staffNo', session()->get('staffNo'))->first();
            return redirect('schoolFeesDef')->with('data1', $data1)->with('success', 'School Fees Definition Updated Successfully');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $schoolfeesDef = schoolFeesDefinition::where('id', $id)->first();
        if($schoolfeesDef->delete()){

            $data1 = User::where('staffNo', session()->get('staffNo'))->first();
            return redirect('schoolFeesDef')->with('data1', $data1)->with('success', 'School Fees Definition Deleted');
        }
        

    }
}

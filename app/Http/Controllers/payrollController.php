<?php

        namespace App\Http\Controllers;
        use Illuminate\Support\Facades\Storage;
        use Illuminate\Http\Request;
        use App\Models\staffBursaryData;
        use App\Models\User;
        use App\Models\ventures;
        use Illuminate\Support\Facades\DB;
        use App\Models\ventureReturn;
        use App\Models\Payroll;
        use crypt;
        use Session;
        use PDF;
class payrollController extends Controller
{

    public function payroll()
    {
        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        return view('staffACC.payroll')->with('data1', $data1)
        ->with('financial_year', $f_year);
    }

    
    public function fetchPayroll(Request $request)
    {
        {
            
            $data1 = User::where('staffNo', session()->get('staffNo'))->first();

            $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
            // $payroll = DB::table('bursary_'.$request->month.'_payroll')
            //             ->where('year', '=', $request->year)
            //             ->where('hodApproval', '=', '1')
            //             ->get();

            // Define a whitelist of allowed table names
            $allowedTables = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']; 
            if (!in_array($request->month, $allowedTables)) {
                return redirect()->route('payroll')->with('error', 'Invalid data');
            }
            else{
                    $tableName = $request->month; //Set the table name

                    $payroll = DB::table('bursary_'.$tableName .'_payroll')
                    ->join('bursary_staff_bursary_data', 'bursary_'.$tableName .'_payroll.staffNo', '=', 'bursary_staff_bursary_data.staffNo')
                    ->where('bursary_'.$tableName .'_payroll.year', '=', $request->year)
                    ->where('bursary_'.$tableName .'_payroll.hodApproval', '=', '1')
                    ->get();

                    return view('/staffACC.payroll')
                            ->with('payroll', $payroll)
                            ->with('month', $request->month)
                            ->with('year', $request->year)
                            ->with('financial_year', $f_year)
                            ->with('tablename', $request->month)
                            ->with('data1', $data1);

            }//End of sanitization          
        }   
    }
    


public function fetchmonths(Request $request)
    {
        $data = DB::table('burasry_salary_schedules')
        ->select(DB::raw('DISTINCT month'))
        ->where('year', '=', $request->year)
        ->orderByRaw("FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
        ->get();

                $months = '<select name="month" id="month" class="form-control lineColor" required><option value="">Select Month</option>';

                foreach ($data as $item) {
                    $month = ucfirst($item->month);
                    $months .= '<option value="'.$item->month.'">'.$month.'</option>';
                }

                $months .= '</select>';

                return response()->json($months);


    }
// **************************************************************PAYROLL APPROVAL ********************************************************************
public function payrollApprovalIndex()
    {
        $f_year             =       DB::table('bursary_financial_years')->where('status', 'active')->get();
        $data1              =       User::where('staffNo', session()->get('staffNo'))->first();
        return view('staffACC.payrollApproval')->with('data1', $data1)
        ->with('year', $f_year)
        ->with('financial_year', $f_year);
    }
// ******************************************************************************************************************************************************
    public function fetchStaffs(Request $request)
    {
        ##Set the dynamic table name
        $tableName = 'bursary_'.$request->month.'_payroll';
        $activeyear               =       DB::table('bursary_financial_years')->where('status', 'active')->first();
        
        $data1                    =       User::where('staffNo', session()->get('staffNo'))->first(); 
       
        ##Fetch Staffs
        $staffs                   =       DB::table($tableName)
                                            ->where('department', $data1->department)
                                            ->where('year', $activeyear->year)
                                            ->get();

            ##check if at least one staff has been approved.
            $check = DB::table($tableName)->where('hodApproval', '=', 1)->orWhere('hodApproval', '=', '1')->count();
            

             $f_year             =       DB::table('bursary_financial_years')->where('status', 'active')->get();
            return view('staffACC.payrollApproval')->with('data1', $data1)
            ->with('staffs', $staffs)
            ->with('month', $request->month)
            ->with('year',  $activeyear->year)
            ->with('checkboxControl', $check)
            ->with('financial_year', $f_year);
    }
// ******************************************************************************************************************************************************
    public function approvePayroll(Request $request)
    {

        $selectedStaffIds = $request->input('selected_staffs');

        // return response()->json(['message' =>  $request->month]);
        $tableName = 'bursary_'.$request->month.'_payroll';

        // Approve the payroll
        $users = DB::table($tableName)
        ->whereIn('staffNo', $selectedStaffIds)
        ->update(['hodApproval' => 1]);

        if($users){
           // return redirect()->route('fetchStaffs', ['month'=>$request->month])->with('success', 'Selected Staffs Approved for Payment Successfully');
             return response()->json(['message' => 'Selected Staffs Approved for Payment Successfully']);
        }

        else{
           // return redirect()->route('fetchStaffs', ['month'=>$request->month])->with('error', 'An error was encountered. Selected staffs not approved');
           return response()->json(['message' => 'An error was encountered. Selected staffs not approved']);
        }
         
    }

}

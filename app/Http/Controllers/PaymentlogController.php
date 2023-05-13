<?php

namespace App\Http\Controllers;

use App\Models\PaymentLog;
use Illuminate\Http\Request;
use App\Models\staffBursaryData;
use App\Models\feesPayment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use crypt;
use Session;
use PDF;

class PaymentlogController extends Controller
{

    
    public function paymentlogIndex(Request $request)
    {
        $academic_session = DB::table('bursary_feespayment')->distinct()->pluck('academic_year');
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
        //return($academic_session);
        return view('/studentAcc.paymentLog')->with('academic_session', $academic_session)
                ->with('data1', $data1)
                ->with('data2', $faculties);
    }


    //public function paymentLog(Request $request)
    public function feespayment(Request $request)
    {
        $faculty = $request->faculty;
        $year = $request->year;
        
        
            // return $payments;
                    //fech all school fees payment
                    $log = feesPayment::select(DB::raw('*, SUM(amountPaid) as totalAmount'))
                    ->groupBy('matricNo', 'name', 
                    'faculty', 'department', 'paymentCategory',
                    'hostel', 'transactionID', 'rrr', 'amountBilled', 'amountPaid',
                    'balance', 'status', 'paymentDate', 'paymentSession', 'semester',
                     'currentLevel', 'paymentReceipt', 'id', 'academic_year', 'created_at',
                    'updated_at', 'amount', 'passport')
                    ->where('academic_year', $year)
                    ->where('faculty', $faculty)
                    ->get();
  
                            
                    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                    $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
                    $academic_session = DB::table('bursary_feespayment')->distinct()->pluck('academic_year');
                    //return $faculty;
        return view('/studentAcc.paymentLog')->with('log', $log)->with('data1', $data1)
                ->with('data2', $faculties)
                ->with('academic_session', $academic_session);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Payslip;
use App\Models\staffBursaryData;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Payroll;

use Illuminate\Http\Request;

class PDFController extends Controller
{public function getPayslipPDF(Request $request)
    {
        $staffNo = session()->get('staffNo');
                
        $year                =           $request->year;
        $month               =           strtolower($request->month);
        $id                  =            $staffNo;
        
        
       
        //Check if the query returs only one value
        $count= DB::table('bursary_'.$month.'_payroll')
        ->join('bursary_users', 'bursary_users.staffNo', '=', 'bursary_'.$month.'_payroll.staffNo')
        ->join('bursary_staff_bursary_data', 'bursary_staff_bursary_data.staffNo', '=', 'bursary_'.$month.'_payroll.staffNo')
        ->where('bursary_'.$month.'_payroll.staffNo', '=', $staffNo)
        ->where('bursary_'.$month.'_payroll.year', '=', $year)
        ->count();

        if($count==1){
            $users = DB::table('bursary_'.$month.'_payroll')
            ->join('bursary_users', 'bursary_users.staffNo', '=', 'bursary_'.$month.'_payroll.staffNo')
            ->join('bursary_staff_bursary_data', 'bursary_staff_bursary_data.staffNo', '=', 'bursary_'.$month.'_payroll.staffNo')
            ->where('bursary_'.$month.'_payroll.staffNo', '=', $staffNo)
            ->where('bursary_'.$month.'_payroll.year', '=', $year)
            ->first();            
            

        // return $users;
        $pdf = Pdf::loadView('receiptsView.download_payslip', compact('users', 'month', 'year'));
        return $pdf->download(ucfirst(strtolower($users->fname)). '_'.ucfirst(strtolower($users->lname)).'_Payslip_'.ucfirst($month).'.pdf');
         }

         else
         {
            
            return redirect()->back()->with('error', 'No data to retrieve for this month.');

         }

    }


        public function schoolFeesReceipt(Request $request)
        {
            $faculty = $request->faculty;
            $year    = $request->year;
            $data = DB::table('bursary_feesPayment')
                ->where('faculty', '=', $request->faculty)
                ->where('academic_year', '=', $request->year)
                ->get()
                ->first();

                // return $users;
            $pdf = Pdf::loadView('receiptsView.schoolfees', compact('data', 'faculty', 'year'));
            return $pdf->download(strtolower($data->name).' school fees.pdf');
        }


    public function disbursmentReceipt(Request $request)
        {
        
        $date_created = $request->date_created;
        $disbursementslog = DB::table('bursary_disbursements')
        ->where('created_at', '=', $request->date_created)
        ->where('id', '=', $request->id)
        ->first();

        
        // return;
        $pdf = Pdf::loadView('receiptsView.disbursementReceipt', compact('disbursementslog'));
        return $pdf->download('disbursement Receipt.pdf');
        }

        
        public function downloadSoa (Request $request)
        {
            $studentinfo = DB::table('bursary_feespayment')
            ->where('matricNo', '=', $request->id)
            ->first();
            

        $soa = DB::table('bursary_feespayment')
            ->where('matricNo', '=', $request->id)
            ->get();
        
        // return;
        $pdf = Pdf::loadView('receiptsView.downloadSoa', compact('studentinfo', 'soa'));
        return $pdf->download('Statement_of_account.pdf');
        }
}

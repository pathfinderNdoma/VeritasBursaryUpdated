<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\disbursement;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\staffBursaryData;
use App\Models\User;
use APP\Models\paymentLog;
use Illuminate\Support\Facades\DB;
use crypt;
use Session;
use PDF;

class downloadReceiptsController extends Controller
{
                    public function feesReceipt(Request $request)
                    {
                        $data = DB::table('bursary_feesPayment')
                            ->where('faculty', '=', $request->faculty)
                            ->where('academic_year', '=', $request->year)
                            ->get()
                            ->first();

                           
                        $content = '
                              <div class="col-12 text-center">
                             <span><img src="images/logo1.png" width="200" height="100"></span><span><h5 style="color:green; font-weight:bold">VERITAS UNIVERSITY ABUJA</h5></span> 
                            </div>
                            <div class="row col-12">
                            <div class="col-lg-6 col-md-6 col-xs-6 text-center">
                              <img src="/storage/schoolfeespassport/passport.jpg" width="100" height="100">
                            </div>
                          </div>

                            <hr style="font-weight:bolder; line-height:1px">
                            <div class="row">
                              <div class="col-lg-4 col-md-4 col-xs-4"></div>
                              <div class="col-lg-4 col-md-4 col-xs-4 text-center"><h4>Online Payment Receipt</h4></div>
                              
                            </div>
                            
                            <hr>
                        <table class="table table-borderless">
                        <thead>
                          
                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Matric No</th>
                            <td scope="col">'.$data->matricNo.'</td>
                          </tr>
                          {{-- ROW ENDS --}}

                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Name</th>
                            <td scope="col">'.$data->name.'</td>
                          </tr>
                          {{-- ROW ENDS --}}

                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Department</th>
                            <td scope="col">'.$data->department.'</td>
                          </tr>
                          {{-- ROW ENDS --}}

                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Faculty</th>
                            <td scope="col">'.$data->faculty.'</td>
                          </tr>
                          {{-- ROW ENDS --}}
                          
                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Payment Category</th>
                            <td scope="col">'.$data->paymentCategory.'</td>
                          </tr>
                          {{-- ROW ENDS --}}
                          
                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Hostel</th>
                            <td scope="col">'.$data->hostel.'</td>
                          </tr>
                          {{-- ROW ENDS --}}

                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Transanction ID</th>
                            <td scope="col">'.$data->transactionID.'</td>
                          </tr>
                          {{-- ROW ENDS --}}

                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">RRR</th>
                            <td scope="col">'.$data->rrr.'</td>
                          </tr>
                          {{-- ROW ENDS --}}
                          
                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Amount Billed</th>
                            <td scope="col">N'.number_format($data->amountBilled).'</td>
                          </tr>
                          {{-- ROW ENDS --}}

                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Amount Paid</th>
                            <td scope="col">N'.number_format($data->amountPaid).'</td>
                          </tr>
                          {{-- ROW ENDS --}}

                          //ROW STARTS --}}
                          <tr>
                            <th scope="col">Amount Billed</th>
                            <td scope="col">N'.number_format($data->balance).'</td>
                          </tr>
                          {{-- ROW ENDS --}}
                          
                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Payment Status</th>
                            <td scope="col">'.$data->status.'</td>
                          </tr>
                          {{-- ROW ENDS --}}

                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Payment Date</th>
                            <td scope="col">'.$data->paymentDate.'</td>
                          </tr>
                          {{-- ROW ENDS --}}

                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Payment Session</th>
                            <td scope="col">'.$data->paymentSession.'</td>
                          </tr>
                          {{-- ROW ENDS --}}

                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Payment Session</th>
                            <td scope="col">'.$data->semester.'</td>
                          </tr>
                          {{-- ROW ENDS --}}
                          
                          {{-- ROW STARTS --}}
                          <tr>
                            <th scope="col">Current Level</th>
                            <td scope="col">'.$data->currentLevel.'</td>
                          </tr>
                          {{-- ROW ENDS --}}
                          
                          </thead>
                      </table>
                      ';

                        $pdf = PDF::loadView('/receiptsView.download_payslip', [
                            'content' => $content
                        ]);

                        return $pdf->download('fees receipt_.pdf');
                    }
// ********* ********************************************************************************************************************************************

    public function downloadSoa (Request $request)
    {
      
      
     
     
            $studentinfo = DB::table('bursary_feespayment')
            ->where('matricNo', '=', $request->id)
            ->first();
            

        $soa = DB::table('bursary_feespayment')
            ->where('matricNo', '=', $request->id)
            ->get();
            //return count($soa);
                  
              $n=count($soa);
             // $count =count($studentinfo);
              //return $count;
            $content = '
            <div class="card-header text-center" style="background-color:#198754; color:white">
            Statement of Account for '.$studentinfo->name.'
        </div>
            <div class="card">
            <div class="col-12 text-center">
                             <span><img src="images/logo1.png" width="200" height="100"></span><span><h5 style="color:green; font-weight:bold">VERITAS UNIVERSITY ABUJA</h5></span> 
                            </div>
                            <div class="row col-12">
                            <div class="col-lg-6 col-md-6 col-xs-6 text-center">
                              <img src="/storage/schoolfeespassport/passport.jpg" width="100" height="100">
                            </div>
                          </div>
           
            <div class="card-body">


              <div class="row">
                <div class="col-xs-12 col-md-4 col-lg-4">

                      <input type="text" class="form-control" value="'.$studentinfo->matricNo.'"
                       aria-label="Last name" style="border-bottom: 2px solid green; background-color:white" readonly>
                      <p style="font-weight:bold; color:green">Matric No</p>
                </div>

                <div class="col-xs-12 col-md-4 col-lg-4">
                    <input type="text" class="form-control" value="'.$studentinfo->department.'" 
                    aria-label="First name" style="border-bottom: 2px solid green; background-color:white" readonly>
                    <p style="font-weight:bold; color:green">Department</p>
                </div>

                <div class="col-xs-12 col-md-4 col-lg-4">
                    <input type="text" class="form-control" value="'.$studentinfo->faculty.'" 
                    aria-label="First name" style="border-bottom: 2px solid green; background-color:white" readonly>
                    <p style="font-weight:bold; color:green">Faculty</p>
                </div>
              </div>
        <br/>
       
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Session</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">Payment Category</th>
                        <th scope="col">Date</th>               
                    </tr>
                </thead>
                <tbody>';

        $n = 1; // Initialize $n with 1

        foreach ($soa as $data) {
        $content .= '<tr>
                    <th scope="row">' . $n . '</th>
                    <td>' . $data->academic_year . '</td>
                    <td>' . number_format($data->amount, 2) . '</td>
                    <td>' . $data->paymentCategory . '</td>
                    <td>' . $data->paymentDate . '</td>
                </tr>';
        $n++; // Increment $n for each iteration
        }

        $content .= '</tbody>
            </table>
            </div>
            </div>
                    
            </form>
          </div>
        </div>
        </div>';

        $pdf = PDF::loadView('/receiptsView.download_payslip', [
          'content' => $content
      ]);

      return $pdf->download($studentinfo->name.' statement of account.pdf');

    }
// ********* ********************************************************************************************************************************************

    public function disbursmentReceipt(Request $request)
    {
    
      $disbursementslog = DB::table('bursary_disbursements')
      ->where('created_at', '=', $request->date_created)
      ->where('id', '=', $request->id)
      ->first();
      $content = '</table> 
      <div class="card-header text-center" style="background-color:#198754; color:white">
        Disbursement Receipt
    </div>
        <div class="card">
                  <div class="col-12 text-center">
                  <span><img src="images/logo1.png" width="200" height="100"></span><span><h5 style="color:green; font-weight:bold">VERITAS UNIVERSITY ABUJA</h5></span> 
                  </div>

                  <hr style="borer:none; height: 1px;  background-color: green; font-weight: bold">
                

                  <table class="table table-borderless">
                    <thead>
                      
                      {{-- ROW STARTS --}}
                      <tr>
                        <th scope="col">Received By:</th>
                        <td scope="col">'.$disbursementslog->name.'</td>
                      </tr>
                      {{-- ROW ENDS --}}

                      {{-- ROW STARTS --}}
                      <tr>
                        <th scope="col">Designation</th>
                        <td scope="col">'.$disbursementslog->designation.'</td>
                      </tr>
                      {{-- ROW ENDS --}}

                      {{-- ROW STARTS --}}
                      <tr>
                        <th scope="col">Department</th>
                        <td scope="col">'.$disbursementslog->department.'</td>
                      </tr>
                      {{-- ROW ENDS --}}

                      {{-- ROW STARTS --}}
                      <tr>
                        <th scope="col">Amount</th>
                        <td scope="col">'.$disbursementslog->amount.'</td>
                      </tr>
                      {{-- ROW ENDS --}}
                      
                      {{-- ROW STARTS --}}
                      <tr>
                        <th scope="col">Purpose</th>
                        <td scope="col">'.$disbursementslog->purpose.'</td>
                      </tr>
                      {{-- ROW ENDS --}}
                      
                      {{-- ROW STARTS --}}
                      <tr>
                        <th scope="col">Date</th>
                        <td scope="col">'.$disbursementslog->date.'</td>
                      </tr>
                      {{-- ROW ENDS --}}

                      {{-- ROW STARTS --}}
                      <tr>
                        <td scope="col">
                         
                        </td>
                        <td scope="col">
                          
                        </td>
                      </tr>
                      {{-- ROW ENDS --}}

                      {{-- ROW STARTS --}}
                      <tr>
                        <td scope="col">
                          Recepient Signature
                        </td>
                        <td scope="col">
                          Bursary Signature
                        </td>
                      </tr>
                      {{-- ROW ENDS --}}
';

      $pdf = PDF::loadView('/receiptsView.download_payslip', [
        'content' => $content
    ]);

    return $pdf->download(' Disbursment Receipt for'. $disbursementslog->name.'_.pdf');
      }
}

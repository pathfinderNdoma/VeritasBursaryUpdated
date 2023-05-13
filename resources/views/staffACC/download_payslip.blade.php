<!doctype html>
<html lang="en">

<head>
<style>
@media print{
    html,body{
        height: auto;;
    }
    
}
</style>
  <title>Veritas University Payslip</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/boostrap.min.css">



</head>

<body>
  
  <div class="card">

    <div class="text-center lh-1 mb-2">
      <img src="images/logo1.png" width="200" height="100">
        <h5 class="fw-bold">Veritas University Abuja</h5> <h5 class="fw-normal">
        Payment slip for the month of {{$month}} {{$year}}</h5>
    </div>

              <div class="card-header">
              
              </div>
              <div class="card-body">
              <table class="table table-sm table-borderless">
                  
                  <tr style="height: 30px; width:100px">
                      <td scope="col" style="font-weight:10px">Name: {{ucwords(strtolower($users->title)).' '}} {{ucwords(strtolower($users->fname)).' '}}
                        {{ucwords(strtolower($users->oname)).' '}} {{ucwords(strtolower($users->lname))}}</td>
                      <td><span style="color: black; font-weight:10px">Staff Number:</span> {{$users->staffNo}}</td>
                      <td><span style="color: black; font-weight:10px">Grade Level:</span> {{$users->grade_level}}</td>
                  </tr>

                  <tr style="height: 30px; width:100px">
                    <td scope="col" style="font-weight:10px">Designation: {{$users->designation}}</td>
                    <td><span style="color: black; font-weight:10px">Department:</span> {{$users->department}}</td>
                    <td><span style="color: black; font-weight:10px">Faculty:</span> {{$users->faculty}}</td>
                </tr>

                <tr style="height: 30px; width:100px">
                  <td scope="col" style="font-weight:10px">Appointment Date: {{$users->appointmentDate}}</td>
                  <td><span style="color: black; font-weight:10px">Assumption Date:</span> {{$users->assumptionDate}}
                  </td>
              </tr>
                  
              </table>

                      <p></p>      
                <h5 class="fw-bold text-center">Earnings</h5>
                          <table class="table table-sm table-bordered">
                              <thead class="bg-dark text-white">
                                <tr>
                                  <th scope="row">Earnings</th>
                                  <td>Amounts</td>
                                  
                              </tr>
                              </thead>
                              <tbody>
                                  
                              
                                  <tr style="height:10px; font-size:14px">
                                      <th scope="row">Basic Salary</th>
                                      <td>N{{number_format($users->basicSalary)}}</td>
                                                                            
                                  </tr>

                                  <tr style="height:10px; font-size:14px">
                                    <th scope="row">House Allowance</th>
                                    <td>N{{number_format($users->houseAllowance)}}</td>
                                    
                                </tr>

                                  <tr style="font-size:14px">
                                      <th scope="row">Other Allowances</th>
                                      <td>N:{{number_format($users->otherAllowance)}}</td>
                                  </tr>

                                  <tr style="font-size:14px">
                                      <th scope="row">Total Earnings</th>
                                      <td>N{{number_format($users->basicSalary+$users->houseAllowance+$users->otherAllowance)}}</td>
                                  </tr>
                              </tbody> 
                          </table>

                                <!-- **********************DEDUCTIONS TABLE****************************** -->
                                <p></p>
                                <h5 class="fw-bold text-center">Deductions</h5>
                                <table class="table table-sm table-bordered">
                                  <thead class="bg-dark text-white">
                                    <tr>
                                      <th scope="row">Deductions</th>
                                      <td colspan="2">Amount</td>
                                      
                                  </tr>
                                  </thead>
                                  <tbody>
                                      
                                  
                                      <tr style="font-size:14px">
                                          <th>Pension</td>
                                          <td colspan="2">N{{number_format($users->pension)}}</td>
                                          
                                      </tr>
    
                                      <tr style="font-size:14px">
                                        <th>Tax</td>
                                        <td colspan="2">N{{number_format($users->tax)}}</td>
                                        
                                    </tr>

                                      @if ($users->nhia!='')
                                      <tr style="font-size:14px">
                                        <th>NHIA</td>
                                        <td colspan="2">N{{number_format($users->nhia)}}</td>
                                       </tr>
                                      @endif
                                      
    
                                      @if ($users->nhf !='')
                                      <tr style="font-size:14px">
                                        <th>NHF</td>
                                        <td colspan="2">N{{number_format($users->nhf)}}</td>
                                      </tr>
                                      @endif
                                       
    
    
                                    @if ($users->university_loan!='')
                                    <tr style="font-size:14px">
                                      <th>University Loan</td>
                                      <td colspan="2">N{{number_format($users->university_loan)}}</td>
                                    </tr>
                                    @endif
                                       
    
                                    @if ($users->cooperative_loan!='')
                                    <tr style="font-size:14px">
                                      <th>Co-operative Loan</td>
                                      <td colspan="2">N{{number_format($users->cooperative_loan)}}</td>
                                    </tr>
                                    @endif
                                   
                                    @if ($users->commodity_loan!='')
                                    <tr style="font-size:14px">
                                      <th>Commodity Loan</td>
                                      <td colspan="2">N{{number_format($users->commodity_loan)}}</td>
                                    </tr>
                                    @endif
                                 
                                    @if ($users->cooperative_contribution !='')
                                      <tr style="font-size:14px">
                                        <th>Co-operative Contribution</td>
                                        <td colspan="2">N{{number_format($users->cooperative_contribution)}}</td>
                                      </tr>
                                    @endif
    
                                    @if ($users->school_fees !='')
                                    <tr style="font-size:14px">
                                      <th>School Fees</td>
                                      <td colspan="2">N{{number_format($users->school_fees)}}</td>
                                    </tr> 
                                  @endif
    
                             
                              
                            <tr style="font-size:14px">
                              <th>Total Deductions</td>
                              <td colspan="2">N{{number_format($users->pension+$users->tax+$users->nhia+ $users->nhf+$users->cooperative_loan +
                                $users->university_loan+ $users->commodity_loan + $users->cooperative_contribution+
                                $users->school_fees)}}</td>
                            </tr> 
    
                                  </tbody>
                              </table>  
         

                     <div class="row">
                     <div class="col-md-12 text-center">
                     <div class="d-flex flex-column"><h5>Net Pay: N{{number_format($users->netpay)}}</h5> 
                     </div>
                     </div>
                    </div></div>
          </div>
@csrf
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="j/bootstrap-filestyle.min.js"> </script>


@include('inc.payslip_js')


</body>

<script>
  $(document).ready(function() {
    $("#empTable").dataTable();
    $({{file-upload').file_upload();
  });
</script>
<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>

</html>
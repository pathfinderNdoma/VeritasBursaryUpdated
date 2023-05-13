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
    <div class="container mt-5 mb-5">
        <div class="row">
          <div class="col-md-12">
              <div class="text-center lh-1 mb-2">
                <img src="images/logo1.png" width="500" height="200">
                  <h4 class="fw-bold">Veritas University Abuja</h4> <h5 class="fw-normal">Payment slip for the month of {{$month}} {{$year}}</h5>
              </div>
              <hr>
                    <div class="row align-items-start">
                        <div class="col">
                        <span style="color: black">Staff Name:</span> {{ucwords(strtolower($users->title))}} {{ucwords(strtolower($users->fname))}} {{ucwords(strtolower($users->oname))}} {{ucwords(strtolower($users->lname))}}
                        </div>
                        <div class="col" >
                          <span style="color: black">Staff Number:</span> {{$users->staffNo}}
                        </div>
                        <div class="col" >
                            <span style="color: black">Grade Level:</span> {{$users->grade_level}}
                            </div>
                    </div>
                    <p></p>
                    <div class="row align-items-center">
                    <div class="col">
                        <span style="color: black">Designation:</span> {{$users->designation}}
                     </div>
                    <div class="col">
                          <span style="color: black">Department:</span> {{$users->department}}
                          </div>
                    <div class="col">
                          <span style="color: black">Faculty:</span> {{$users->faculty}}
                          </div>
                          
                          
                    </div>
                  <p></p>
                    <div class="row align-items-end">
                        <div class="col">
                        <span style="color: black">Appointment Date:</span> {{$users->appointment_date}}
                        </div>
                        <div class="col">
                        <span style="color: black">Assumption Date:</span> {{$users->assumption_date}}
                        </div>
                        <div class="col">
                          
                        </div>
                     </div>
                     <p></p>
    
                    <div class="row align-items-start">
                        <div class="col">
                        <span style="color: black">Bank:</span> {{$users->bankName}}
                        </div>
                        <div class="col">
                        <span style="color: black">Account Number:</span> {{$users->accountNo}}
                        </div>
                        <div class="col">
                          
                        </div>
                    </div>
             
                  <table class="mt-4 table table-bordered">
                      <thead class="bg-dark text-white">
                          <tr>
                              <th scope="col">Earnings</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Deductions</th>
                              <th scope="col">Amount</th>
                          </tr>
                      </thead>
                      <tbody>
                          
                       
                          <tr>
                              <th scope="row">Basic Salary</th>
                              <td>N{{$users->basic_salary}}</td>
                              <th>Pension</td>
                              <td colspan="2">N{{$users->pension}}</td>
                              
                          </tr>
                          <tr>
                              <th scope="row">House Allowance</th>
                              <td>N{{$users->house_allowance}}</td>
                              <th>Tax</td>
                              <td colspan="2">N{{$users->tax}}</td>
                          </tr>
    
                         
                          <tr class="border-top">
                              <th scope="row">Total Earnings</th>
                              <td>N{{$total_earnings}}</td>
                              <th>Total Deductions</td>
                              <td>N{{$total_deductions}}</td>
                          </tr>
    
                          
    
                      </tbody>
                  </table>
          </div></div>
    
                  <div class="col-md-12 text-center">
                      <div class="d-flex flex-column"><h5>Net Pay: N{{$net_pay}}</h5> 
          <div><br> 
          </div>
                     </div>
                     
                  </div>
                  
                   </div>
              
          </div>
          
      </div>
    
        
      </form>
    </div>
  </div>
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
    $('.file-upload').file_upload();
  });
</script>
<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>

</html>
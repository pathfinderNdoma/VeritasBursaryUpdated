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
  <title>Statement of Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/boostrap.min.css">



</head>

<body>
  
  <div class="card">



    
    <div class="card-header text-center" style="background-color:#198754; color:white; font-size:18px">
      Statement of Account for {{$studentinfo->name}}
  </div>
      <div class="card">
      <div class="col-12 text-center">
                       <span><img src="images/logo1.png" width="200" height="100"></span><span>
                        <h5 style="color:green; font-weight:bold">VERITAS UNIVERSITY ABUJA</h5></span> 
                      </div>
                      <div class="row col-12">
                      <div class="col-lg-6 col-md-6 col-xs-6 text-center">
                        <img src="/storage/schoolfeespassport/passport.jpg" width="100" height="100">
                      </div>
                    </div>
     
      <div class="card-body">

          <table class="table table-sm table-borderless">
              
              <tr style="height: 30px; width:100px">
                  <td scope="col" style="font-weight:10px">Matric No: {{$studentinfo->matricNo}} <hr></td>
              </tr>
              <tr style="height: 30px; width:100px">
                <td><span style="color: black; font-weight:10px">Department: {{$studentinfo->department}}</span> <hr> </td>
            </tr>
            <tr style="height: 30px; width:100px">
              <td><span style="color: black; font-weight:10px">Faculty: {{$studentinfo->faculty}}</span></td>
          </tr>
    
          </table>
    
{{-- 
        <div class="row">
          <div class="col-xs-12 col-md-4 col-lg-4">

                <input type="text" class="form-control" value="{{$studentinfo->matricNo}}"
                 aria-label="Last name" style="border-bottom: 2px solid green; background-color:white" readonly>
                <p style="font-weight:bold; color:green">Matric No</p>
          </div>

          <div class="col-xs-12 col-md-4 col-lg-4">
              <input type="text" class="form-control" value="{{$studentinfo->department}}" 
              aria-label="First name" style="border-bottom: 2px solid green; background-color:white" readonly>
              <p style="font-weight:bold; color:green">Department</p>
          </div>

          <div class="col-xs-12 col-md-4 col-lg-4">
              <input type="text" class="form-control" value="{{$studentinfo->faculty}}" 
              aria-label="First name" style="border-bottom: 2px solid green; background-color:white" readonly>
              <p style="font-weight:bold; color:green">Faculty</p>
          </div>
        </div> --}}
  <br/>
 
          <table class="table">
          <thead style="font-size: 14px">
              <tr>
                <th scope="col">SN</th>
                <th scope="col">Session</th>
                <th scope="col">Level</th>
                <th scope="col">Amount Billed</th>
                <th scope="col">Amount Paid</th>
                <th scope="col">Balance</th>
                <th scope="col">Payment Category</th>
                <th scope="col">Hostel</th>
                <th scope="col">Date</th>              
              </tr>
          </thead>
          <tbody>

              <p class="d-none">{{$n = 1}}</p> 

              @foreach($soa as $data) 
              <tr>
                <th scope="row">{{$n}}</th>
                <td>{{$data->academic_year}}</td>
                <td>{{$data->currentLevel}}</td>
                <td>N{{number_format($data->amountBilled)}}</td>
                <td>N{{number_format($data->amountPaid)}}</td>
                <td>N{{number_format($data->amountBilled - $data->amountPaid)}}</td>
                <td>{{$data->paymentCategory}}</td>
                <td>{{$data->hostel}}</td>
                <td>{{$data->paymentDate}}</td>
                      </tr>
             <p class="d-none"> {{$n++}}</p> 
              
            @endforeach

      </tbody>
            </table>
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
    $({{file-upload').file_upload();
  });
</script>
<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>

</html>
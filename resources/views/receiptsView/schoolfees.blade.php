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
    <div class="card-body">
                <div class="col-12 text-center">
                    <span><img src="images/logo1.png" width="200" height="100"></span><span><h5 style="color:green; font-weight:bold">VERITAS UNIVERSITY ABUJA</h5></span> 
                </div>
                <div class="row col-12">
                <div class="col-lg-6 col-md-6 col-xs-6 text-center">
                    <img src="/schoolfeespassport/passport.jpg" width="100" height="100">
                </div>
                </div>

                <hr style="font-weight:bolder; line-height:1px">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-4"></div>
                    <div class="col-lg-4 col-md-4 col-xs-4 text-center"><h4>Online Payment Receipt</h4></div>
                    
                </div>
       
       <hr>

       <table class="table table-sm table-borderless">
        <tbody>
            
        
            <tr style="height:10px; font-size:14px">
                <th scope="row">Matric No</th>
                <td></td>
                <td>{{$data->matricNo}}</td>                                                      

                
                <tr style="height:10px; font-size:14px">
                    <th scope="row">Name</th>
                    <td></td>
                    <td>{{$data->name}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Department</th>
                    <td></td>
                    <td>{{$data->department}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Faculty</th>
                    <td></td>
                    <td>{{$data->faculty}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Payment Category</th>
                    <td></td>
                    <td>{{$data->paymentCategory}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Hostel</th>
                    <td></td>
                    <td>{{$data->hostel}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Transanction ID</th>
                    <td></td>
                    <td>{{$data->transactionID}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">RRR</th>
                    <td></td>
                    <td>{{$data->rrr}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Amount Billed</th>
                    <td></td>
                    <td>N{{number_format($data->amountBilled)}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Amount Paid</th>
                    <td></td>
                    <td>N{{number_format($data->amountPaid)}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Balance</th>
                    <td></td>
                    <td>N{{number_format($data->amountBilled-$data->amountPaid)}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Payment Status</th>
                    <td></td>
                    <td>{{$data->status}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Payment Date</th>
                    <td></td>
                    <td>{{$data->paymentDate}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Payment Session</th>
                    <td></td>
                    <td>{{$data->paymentSession}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Payment Semester</th>
                    <td></td>
                    <td>{{$data->semester}}</td>                                                      
                </tr>

                <tr style="height:10px; font-size:14px">
                    <th scope="row">Current Level</th>
                    <td></td>
                    <td>{{$data->currentLevel}}</td>                                                      
                </tr>


        </tbody> 
    </table>
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
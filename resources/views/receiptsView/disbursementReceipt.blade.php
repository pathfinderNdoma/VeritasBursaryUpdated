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
                
                </div>

                <hr style="font-weight:bolder; line-height:1px">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-4"></div>
                    <div class="col-lg-4 col-md-4 col-xs-4 text-center"><h4>Disbursement Receipt</h4></div>
                    
                </div>
       
       <hr>

       <table class="table table-sm table-borderless">
        <tbody>
            
        
            <tr style="height:10px; font-size:14px">
                <th scope="row">Received By</th>
                <td>{{$disbursementslog->name}}</td>   
            </tr>  

            <tr style="height:10px; font-size:14px">
                <th scope="row">Designation</th>
                <td>{{$disbursementslog->designation}}</td>   
            </tr>  

            <tr style="height:10px; font-size:14px">
                <th scope="row">Department</th>
                <td>{{$disbursementslog->department}}</td>   
            </tr> 

            <tr style="height:10px; font-size:14px">
                <th scope="row">Amount</th>
                <td>{{$disbursementslog->amount}}</td>   
            </tr> 

            <tr style="height:10px; font-size:14px">
                <th scope="row">Purpose</th>
                <td>{{$disbursementslog->purpose}}</td>   
            </tr>

            <tr style="height:10px; font-size:14px">
                <th scope="row">Date</th>
                <td>{{$disbursementslog->date}}</td>   
            </tr>

            <tr>
                <td scope="col">
                 
                </td>
                <td scope="col">
                 
                </td>
              </tr>

            <tr>
                <td scope="col">
                  Recepient Signature
                </td>
                <td scope="col">
                  Bursary Signature
                </td>
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
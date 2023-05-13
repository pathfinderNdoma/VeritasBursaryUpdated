<!doctype html>
<html lang="en">

<head>

  <title>Veritas University Bursary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/boostrap.min.css">



</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <!-- //Adding the side bar -->
    @include ('sidebar')
    <!-- //Adding the side bar -->

    <!-- Page Content  -->
    {{-- <div id="content" class="p-0 md-12 "> --}}
    <!-- Adding the navbar -->


    <div class="container">
    <div id="content" class="p-4 md-12 ">
      
      <form method="GET" action="">
        @csrf
        <div class="card">
            <div class="card-header text-center" style="background-color:#198754; color:white">
                Statement of Account for {{$studentinfo->name}}
            </div>
            <div class="card-body">


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
              </div>
        <br/>
        <?php
        function formatNumber($number) {
         $formatted_number = number_format($number, 2);
         return $formatted_number;
         }
        ?>

                <table class="table">
                    <thead>
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
              <p class="d-none">{{$n=1}}</p>       
              @foreach ($soa as $data)
                  
           
                      <tr>
                        <th scope="row">{{$n}}</th>
                        <td>{{$data->academic_year}}</td>
                        <td>{{$data->currentLevel}}</td>
                        <td>&#x20A6;{{formatNumber($data->amountBilled)}}</td>
                        <td>&#x20A6;{{formatNumber($data->amountPaid)}}</td>
                        <td>&#x20A6;{{formatNumber($data->amountBilled - $data->amountPaid)}}</td>
                        <td>{{$data->paymentCategory}}</td>
                        <td>{{$data->hostel}}</td>
                        <td>{{$data->paymentDate}}</td>
                      </tr>
                      <p class="d-none">{{$n++}}</p>
                      @endforeach
                     
                    </tbody>
                  </table>
                  <div  style="text-align: end">
              <a href="{{route('downloadSoa', ['id'=>$data->matricNo])}}" class="btn btn-primary"> Download</a>
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
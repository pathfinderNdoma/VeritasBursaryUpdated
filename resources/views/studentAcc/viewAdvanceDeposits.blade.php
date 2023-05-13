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
                Advance Payment History for {{$name}}
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">Session</th>
                        <th scope="col">Date Time</th>
                        <th scope="col">Description</th>
                       
                      </tr>
                    </thead>
                    <tbody>
              <p class="d-none">{{$n=1}}</p>       
              @foreach ($data as $data)
                  
           
                      <tr>
                        <th scope="row">{{$n}}</th>
                        <td>{{$data->matricNo}}</td>
                        <td>&#x20A6;{{$data->amountPaid}}</td>
                        <td>{{$data->dateTime}}</td>
                      </tr>
                      <p class="d-none">{{$n++}}</p>
                      @endforeach
                     
                    </tbody>
                  </table>
              <a href="#" class="btn btn-outline-success">Print History</a>
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
<!doctype html>
<html lang="en">

<head>

  <title>Veritas University Bursary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

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
      <h4>Advance Deposit
        <hr>
      </h4>
      <form method="GET" action="">
        @csrf
        {{-- <div class="row col-12">

            <div class="col-md-6 col-xs-6 col-lg-6">
              <select type="text" name="year" id="year" class="form-control" style="border: 1px solid green;">
                <option>Select Academic Year</option>
                <option>2022/2023</option>
              </select>
            </div>

            <div class="col-md-6 col-xs-6 col-lg-6">
            <span style="color: white"></span>
            <input type="submit" name="generate" value="Generate Report" class="btn form-control" style="background-color: green; color:white">
            </div>
 
          
        </div> --}}
        <br>
        <?php
        function formatNumber($number) {
         $formatted_number = number_format($number, 2);
         return $formatted_number;
         }
        ?>
        @if(isset($advancedeposit))
           {{-- @if ($dept_faculty=='Faculty') --}}

          
           <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
            <thead>
            <th>SN</th>
            <th>Matric No</th>
            <th>Department</th>
            <th>Faculty</th> 
            <th>Session</th>
            <th>Amount</th>
            <th>Description</th>
            {{-- <th style="width: 50%;">Total Amount Used</th> --}}
            {{-- <th>Balance</th> --}}
            {{-- <th>Action</th> --}}
        
         <p class="d-none">{{$n=1}}</p>
         <tbody>
         @foreach ($advancedeposit as $data)     
      </thead>
            
              <td>{{$n}}</td>
              <td>{{$data->matricNo}}</td>
              <td>{{$data->department}}</td>
              <td>{{$data->faculty}}</td>
              <td>{{$data->academic_year}}</td>
              <td>&#x20A6;{{formatNumber($data->amountPaid)}}</td>
              <td>{{$data->description}}</td>
              {{-- <td>&#x20A6;{{$data->total_feesPaid}}</td> --}}
              {{-- <td>&#x20A6;{{$data->balance}}</td> --}}
              {{-- <td><a href="{{route('viewdeposits', ['id'=> $data->matricNo])}}" class="btn btn-sm btn-outline-success">View Details</a></td> --}}
            </tr>
              <p class="d-none">{{$n++}}</p>
         @endforeach
              
          
  
            </tbody>
          </table>
             
               
           {{-- **************END OF @if IF STATEMENT IF THE REQUEST IS MADE FOR FACULTIES  --}}


           
          
           
        @endif
        
        
    
    
        
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
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

 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



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
      <h4> Payment Report
        <hr>
      </h4>
      <form method="GET" action="{{route('report')}}">
        @csrf
        <div class="input-group ">
          
          <select type="text" name="dept_faculty" id="dept_faculty" class="form-control lineColor" style="">
            <option>Select</option>
            <option>Faculty</option>
            <option>Department</option>
          </select><span style="color: white">' '</span>



          <select type="text" name="year" id ="year" class="form-control lineColor">
              <option>Select Academic Year</option>
              @foreach ($academic_session as $session)
              <option>{{$session}}</option>
              @endforeach
           
            
          </select><span style="color: white">' '</span>
          <input type="submit" name="generate" value="Generate Report" class="btn btn-success">
          
        </div>
        <br>
        
        @if(isset($year))
        <h5>School Fees Payment Report for {{$year}} Academic Session </h5>
        @endif
        <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
          <thead>
          <th>SN</th>
          @if(isset($level))

            @if($level=='Faculty')
            <th>Faculty</th> 
            @endif

            @if($level=='Department')
            <th>Department</th> 
            @endif

            @endif
          {{-- <th>Number of Students</th> --}}
          <th>Number of Students Paid</th>
          <th>Number of Students Owing</th>
          <th>Percentage Paid(%)</th>
          <th>Total Amount</th>
          </thead>
        
     @if(isset($report))
        
              <p class="d-none">{{$n=1}} </p>

                  <tbody>
                  @foreach ($report as $data) 
                  <td>{{$n}}</td>

                  @if($level=='Faculty')
                  <td>{{$data->faculty}}</td>
                  @endif

                  @if($level=='Department')
                  <td>{{$data->department}}</td>
                  @endif

                  {{-- <td>{{$data->totalDistinctStudents}}</td> --}}
                  <td>{{$data->totalnumPaid}}</td>
                  <td>{{$data->totalOwing}}</td>

                  <td>{{($data->totalnumPaid/$data->totalDistinctStudents)*100}}%</td>

                  <td>&#x20A6;{{number_format(($data->totalAmountPaid), 2)}}</td>
                  <p class="d-none">{{$n++}}</p>
                </tr>
                  @endforeach
                 
                  
                </tbody> 
                </table> 
        {{-- **************END OF @if IF STATEMENT IF THE REQUEST IS MADE FOR FACULTIES  --}}

        <p class="d-none">{{$n=1}} </p>
        </table> 

     @endif

</form>
</div>
</div>
</div>
        
     
    </div>
  </div>
  </div>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script src="js/jquery-3.2.1.js"></script>

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
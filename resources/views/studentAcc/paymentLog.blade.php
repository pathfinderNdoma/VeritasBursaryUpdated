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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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


    <div >
    <div id="content" class="p-4 md-12 ">
      <h4>School Fees Payment Log
        <hr>
      </h4>
      
        @csrf
        <form name="form" method="GET" action="{{route('log')}}" enctype="multipart/form-data">

          <div class="input-group ">
          
            <select type="text" name="faculty" id="faculty" class="form-control lineColor">
              <option>Select Faculty</option>
                @foreach ($data2 as $data2)
                  <option value="{{$data2->faculty}}">{{$data2->faculty}}</option>  
                @endforeach
              
              
            </select><span style="color: white">' '</span>
            <select type="text" name="year" id ="year" class="form-control lineColor">
              <option>Select Academic Year</option>
              @foreach ($academic_session as $session)
              <option>{{$session}}</option>  
              @endforeach
              
              
            </select><span style="color: white">' '</span>
            <a href="{{route("log")}}" id="generate_report" class="btn btn-success" >Generate</a>
            
          </div>
          <br>
          
        @include('inc.messages')
        <br>
        <?php
         function formatNumber($number) {
          $formatted_number = number_format($number, 2);
          return $formatted_number;
          }
         ?>
        @if (isset($log))
        @if(count($log)>=1)
        <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
          
          <thead>
            <th>SN</th>

            <th>Matric No.</th> 
            <th>Name</th>
            <th>Faculty</th>
            <th>Department</th>

            <th style="width: 150px;">Payment category</th>
            <th>Hostel</th>
            <th>Transaction ID</th>
            <th>RRR</th>

            <th >Amount Billed</th>
            <th >Amount Paid</th>
            <th >Balance</th>
            <th >Status</th>

            <th >Payment Date</th>
            <th >Payment Session</th>
            <th >Semester</th>
            <th >Current Level</th>
            <th >Payment Receipt</th>
          </thead>
    
          <p class="d-none"> {{$n=1}} </p>
          <tbody>
          @foreach($log as $log)
            <td>{{$n}}</td>
            <td>{{$log->matricNo}}</td>
            <td>{{$log->name}}</td>
            <td>{{$log->faculty}}</td>
            <td>{{$log->department}}</td>

            <td>{{$log->paymentCategory}}</td>
            <td>{{$log->hostel}}</td>
            <td>{{$log->transactionID}}</td>
            <td>{{$log->rrr}}</td>

            <td>&#x20A6;{{formatNumber($log->amountBilled)}}</td>
            <td>&#x20A6;{{formatNumber($log->amountPaid)}}</td>
            <td>&#x20A6;{{formatNumber($log->amountBilled - $log->amountPaid)}}</td>

            <td>{{$log->status}}</td>
            <td>{{$log->paymentDate}}</td>
            <td>{{$log->paymentSession}}</td>
            <td>{{$log->semester}}</td>
            <td>{{$log->currentLevel}}</td>

            <td>
              <a href="{{route('schoolFeesReceipt', ['faculty'=>$log->faculty, 'year'=>$log->academic_year])}}">
              <h5 style="color:green; font-weight:bolder"><i class="bi bi-download"></i>
              </h5></span>
            </a>
          </td>

          
         
          
        </tr>
      </div>
    </div>
  </div>
      <p class="d-none">{{$n++}}</p>
      @endforeach
    </tbody>
    </table> 

      @else
      </div>

    <br/>
    <div class="alert alert-success row col-12" role="alert">
      <p>No record found</p>
    </div>
      
      @endif    
          
      </table> 
      @else
      <table class="table  table-responsive  table-sm" id="empTable" style="color:#000; font-size:13px;">
        <thead>
          <th>SN</th>
          <th>Matric No.</th> 
          <th>Name</th>
          <th>Faculty</th>
          <th>Department</th>
          <th>Amount paid</th>
          <th>Description</th>
          <th>DateTime</th>
          <th>Balance</th>
          <th>Download receipt</th>
        </thead>
      </table>
              
          @endif
     {{-- <input type="submit" value="Generate Report" id="report_button" class="btn btn-primary"> --}}
         </div>
         <br>
        
     
    </div>
  </div>
  </div>
  
@csrf
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

<script>
  document.getElementById('generate_report').addEventListener('click', function() {
    var faculty = document.getElementById('faculty').value;
    var year = document.getElementById('year').value;

    // build the URL with the values as query parameters
    var url = '/log?faculty=' + encodeURIComponent(faculty) + '&year=' + encodeURIComponent(year);

    // update the href attribute of the anchor tag
    this.setAttribute('href', url);
  });
</script>
<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>

</html>
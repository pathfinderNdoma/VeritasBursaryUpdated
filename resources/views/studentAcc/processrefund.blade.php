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


    <div>
    <div id="content" class="p-4 md-12 ">
      <h4> Processed Refund
        
      </h4>
      <form method="GET" action="{{route('report')}}">
        @csrf
       
        <br>
        <?php
        function formatNumber($number) {
         $formatted_number = number_format($number, 2);
         return $formatted_number;
         }
        ?>
        <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
         
            <thead>
           <th>SN</th>
           <th>Matric No</th> 
           <th>Department</th>
           <th>Faculty</th>
           <th>Academic Session</th>
           <th>Amount</th>
           <th>Transaction Code </th>
           <th>Message</th>
           <th>Status</th>
            </thead>
          <p class="d-none">{{$n=1}} </p>
          
            <tbody>
          @foreach ($data as $data)
          
            <td>{{$n}}</td>
            <td>{{$data->matricNo}}</td>
            <td>{{$data->faculty}}</td>
            <td>{{$data->department}}</td>
            <td>{{$data->academic_session}}</td>
            <td>&#x20A6;{{formatNumber($data->amount)}}</td>
            <td>{{$data->transactionCode}}</td>
            <td>{{$data->message}}</td>
            <td>{{ucfirst($data->status)}}</td>
             
            
            
            </tr>
            <p class="d-none">{{$n++}} </p> 
            @endforeach
            </tbody>
            </table> 

        

           

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
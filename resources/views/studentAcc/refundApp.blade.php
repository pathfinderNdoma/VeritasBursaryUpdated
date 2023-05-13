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


    <div>
    <div id="content" class="p-4 md-12 ">
      <h4> School Fees Refund Application 
        <hr>
      </h4>
      
        <br>
        <?php
        function formatNumber($number) {
         $formatted_number = number_format($number, 2);
         return $formatted_number;
         }
        ?>
        @include('inc.messages')
        <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
          <thead>
            <th>SN</th>
            <th>Matric No</th> 
            <th>Department</th>
            <th>Faculty</th>
            <th>Academic Session</th>
            <th>Amount</th>
            <th>Transaction Code </th>
            <th>Application Letter</th>
            <th>VC Approval</th>
            <th>Bursary Approval</th>
            <th>Feedback</th>
            <th>Action</th>
          </thead>
          <p class="d-none">{{$n=1}} </p>
          <tbody>

            @foreach ($data as $data)
                    <tr>           
                    <td>{{$n}}</td>
                    <td>{{$data->matricNo}}</td>
                    <td>{{$data->faculty}}</td>
                    <td>{{$data->department}}</td>
                    <td>{{$data->academic_session}}</td>
                    <td>&#x20A6;{{formatNumber($data->amount)}}</td>
                    <td>{{$data->transactionCode}}</td>
                    {{-- <a  href="/storage/pledges/{{$data->pledgeNote}}" target="_blank> <span type="button"  class="fa bi-download btn" style="font-weight:700; font-size:20px; color:blue" > --}}
                    <td> 
                      <a  href="/storage/pledges/{{$data->pledgeNote}}" target="_blank"> <span type="button"  class="fa bi-download btn" style="font-weight:700; font-size:20px; color:blue" ></a>            
                    </td>



                    {{-- Checking if the VC approval is null or not --}}
                    @if ($data->vcApproval=='')
                      <td>Pending</td>
                    @else                       
                     <td>{{ucfirst($data->vcApproval)}}</td> 
                    @endif
                    {{-- Checking if the Bursar Approval is null or not --}}
                    @if ($data->bursarApproval=='')
                       <td>Pending</td>
                    @else                       
                        <td>{{ucfirst($data->bursarApproval)}}</td> 
                    @endif

                    <td>{{$data->message}}</td>

                    <td> <input type="button" class="btn btn-sm btn-primary" value="Action" data-bs-toggle="modal" data-bs-target="#refundModal{{$n}}">              
                        @include('inc.refundAppModal')
                    </td>
                    
                      
        
                </tr>
                
                <p class="d-none">{{$n++}} </p> 
            @endforeach
                  </tbody>
                
                  
              </table> 

        

           

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
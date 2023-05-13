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
  
   
    <div id="content" class="p-4 md-12 ">
      <h4>Scholarship
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div>
        <form method="GET" action="" name="form" >
        @csrf  
        <div class="row col-12">



          <div class=" col-xs-12 col-lg-4 col-md-4 text-left">
            <input type="button" name="" value="Add Scholarship" class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#addscholarship">
          </div>

        </div>
        
      </form>
        <br>
      
        @include('inc.messages')
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
          <th>Student Name</th> 
          <th>Matric No</th>
          <th>Department</th>
          <th>Amount</th>
          <th>Award Date</th>
          <th>Award Letter</th>
          <th>Update</th>
          <th>Delete</th>
          </thead>

          @if(isset($scholarshp))   
         <p class="d-none">{{$n=1}} </p>

          <tbody>
     @foreach ($scholarshp as $data)
            <td>{{$n}}</td>
            <td>{{$data->studentName}}</td>
            <td>{{$data->matricNo}}</td>
            <td>{{$data->department}}</td>
            <td>&#x20A6;{{formatNumber($data->amount)}}</td>            
            <td>{{$data->awardDate}}</td>
            <td>
              <a  href="storage/scholarships/{{$data->award_letter}}" target="_blank"> <span type="button"  class="fa fa-download btn" style="font-weight:700; font-size:20px; color:blue" ></a>
            </td> 
            


            <td>
              <a href="#"> <span type="button"  class="fa fa-edit btn" style="font-weight:700; font-size:20px; color:blue" data-bs-toggle="modal" data-bs-target="#updatescholarship{{$data->id}}"></a>
                @include('scholarships.updateScholarships')
            </td>
            <td></span>
              <a href="#"><span class="fa fa-trash btn" style="font-weight:700; font-size:20px; color:red" data-bs-toggle="modal" data-bs-target="#deleteScholarship{{$data->id}}"></span>
              </a>
              @include('scholarships.deleteScholarship')
            </td>

            
        </tr>
        <p class="d-none">{{$n++}} </p> 

     @endforeach
          </tbody>
         
          
      </table> 
      @include('inc.backtoTop')
        
     @endif
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


@include('scholarships.addscholarship')


</body>

<script>
  $(document).ready(function() {
    $("#empTable").dataTable();
    $('.file-upload').file_upload();
  });
</script>
  

      <script>
        $(document).ready(function() {
          
        $('#update_pledge_status').change(function() {
          if ($(this).val() === 'Redeemed') {
            
            $('#update_payment_receipt').prop('required', true);
            
          } else {
            $('#update_payment_receipt').prop('required', false);
          }
        });
      });

      </script>

<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>

</html>
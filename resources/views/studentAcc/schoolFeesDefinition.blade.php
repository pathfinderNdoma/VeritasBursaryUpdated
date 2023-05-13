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


    <div class="container">
    <div id="content" class="p-4 md-12 ">
      <h4>School Fees Definition
        
        <hr>
      </h4>
      
        @csrf
        
        <div class="row">

          <div class="col-md-4 col-xs-12 col-lg-4"></div>
          <div class="col-md-4 col-xs-12 col-lg-4"></div>
        
       
            <div class="col-md-4 col-xs-12 col-lg-4">
            <input type="submit" name="generate" value="Define New Fee" 
                class="btn btn-success form-control" 
                data-bs-toggle="modal"
                data-bs-target="#addschool_fessmodal"
                style="background-color: green; color:white">
            </div>
            @include('inc.addSchool_fees_definition_modal')
          
        </div>
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
          <th>Department</th>
          <th>Fee</th> 
          <th>Amount</th>
          <th>Description</th>
          <th>Edit</th>
          <th>Delete</th>
          </thead>
         <p class="d-none">{{$n=1}} </p>

          <tbody>
     @foreach ($data as $data)
            <td>{{$n}}</td>
            <td>{{$data->department}}</td>
            <td>{{$data->fee}}</td>
            <td>&#x20A6 {{formatNumber($data->amount)}}</td>
            <td>{{$data->description}}</td>
            
            <td><a href="{{route ('updateSchoolfeesDefinitionView', ['id'=>$data->id])}}"> <span type="button"  class="fa fa-edit btn" style="font-weight:700; font-size:20px; color:blue"></a></span></td>
            {{-- @include('inc.updateSchool_fees_definition_modal') --}}
            <td><span class="fa fa-trash btn" style="font-weight:700; font-size:20px; color:red" data-bs-toggle="modal" data-bs-target="#deletemodal"></span></td>
          @include('inc.deleteSchool_fees_definition_modal')
            
            
        </tr>
        <p class="d-none">{{$n++}} </p> 

     @endforeach
          </tbody>
         
          
      </table> 
    
        
     
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
<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>

</html>
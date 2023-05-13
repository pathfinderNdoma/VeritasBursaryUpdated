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


   
    <div id="content" class="p-4 md-12 ">
      <h4>Returns
        <hr>
      </h4>
      
      
      <form method="GET" action="{{route('fetchreturns')}}" name="form" >
      @csrf 

        <div class="row input-group ">
         <input type="button" name="" value="Submit Returns" class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#submitreturns">
        </select>
        </div>
        <br/>
        <div class="row input-group ">
        <div class=" col-xs-12 col-lg-3 col-md-3">
          <select type="text" name="fyear" id ="fyear" class=" form-control lineColor">
            <option>Select Financial Year</option>      
            @foreach ($financial_year as $fyear)
            <option>{{$fyear}}</option>
            @endforeach
        </select>
        </div>
        
        <div class=" col-xs-12 col-lg-3 col-md-3">
          <input type="submit" name="generate" value="Generate Report" class="btn btn-success">
        </select>
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
          <th>Business Name</th> 
          <th>Location</th>
          <th>Director</th>
          <th>Initial Running Capital</th>
          <th>Profit</th>
          <th>Returns</th>
          <th>Present Running Capital</th>
          <th>Download Payment Receipt</th>
          <th>DateTime</th>
          <th>Update</th>
          <th>Delete</th>
          </thead>

          @if(isset($returns))   
         <p class="d-none">{{$n=1}} </p>

          <tbody>
     @foreach ($returns as $data)
            <td>{{$n}}</td>
            <td>{{$data->ventureName}}</td>
            <td>{{$data->location}}</td>
            <td>{{$data->director}}</td>
            <td>&#x20A6;{{formatNumber($data->initial_runnningCapital)}}</td>
            <td>&#x20A6;{{formatNumber($data->profit)}}</td>
            <td>&#x20A6;{{formatNumber($data->returns)}}</td>
            <td>&#x20A6;{{formatNumber($data->present_runningCapital)}}</td>
            <td>
              <a  href="/storage/returns_receipts/{{$data->receiptID}}" target="_blank"> <span type="button"  class="fa fa-download btn" style="font-weight:700; font-size:20px; color:blue" ></a>
              
            </td>
            <td>{{$data->created_at}}</td>
            <td>
              <a href="#"> <span type="button"  class="fa fa-edit btn" style="font-weight:700; font-size:20px; color:blue" data-bs-toggle="modal" data-bs-target="#updatReturns{{$data->id}}"></a>
                @include('ventures.updateReturns')
            </td>
            <td></span>
              <a href="#"><span class="fa fa-trash btn" style="font-weight:700; font-size:20px; color:red" data-bs-toggle="modal" data-bs-target="#deletReturns{{$data->id}}"></span>
              </a>
              @include('ventures.deleteReturns')
            </td>
            
        </tr>
        <p class="d-none">{{$n++}} </p> 

     @endforeach
          </tbody>
         
          
      </table> 
    
        
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


@include('ventures.submitreturnsModal')


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
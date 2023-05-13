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

  <script src="js/jquery-3.2.1.js"></script>
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
      <h4>Income Plan
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div>
        <form method="GET" action="{{route('fetchincomePlan')}}" name="form" >
        @csrf  
       
        <p></p><p></p>
        <div class="row col-12">

          <div class="col-xs-12  col-lg-4 col-md-4 form-control">
            <select type="text" name="year" id ="year" class=" form-control lineColor" required>
              <option value="">--Select Financial Year--</option>      
              @foreach ($financial_year as $year)
              <option value="{{$year}}">{{$year}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-xs-12  col-lg-4 col-md-4 form-control">
            <input type="submit" name="generate" value="Generate" class="btn btn-success">
          </div>
          
          <div class=" col-xs-12 col-lg-4 col-md-4 text-left">
            <input type="button" name="" value="Add New" class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#addbudget">
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
          <th>Financial Year</th>
          <th>Source</th>
          <th>Amount</th>
          <th>Datet Time</th>
          <th>Update</th>
          <th>Delete</th>
          </thead>

          @if(isset($incomePlan))   
         <p class="d-none">{{$n=1}} </p>

          <tbody>
     @foreach ($incomePlan as $data)
            <td>{{$n}}</td>
            <td>{{$data->financial_year}}</td>
            <td>{{$data->source}}</td>         
            <td>&#x20A6;{{formatNumber($data->amount)}}</td>
            <td>{{ date("F j, Y g:i A", strtotime($data->created_at))}}</td> 
            <td>
              <a href="#"> <span type="button"  class="fa fa-edit btn" style="font-weight:700; font-size:20px; color:blue"
                 data-bs-toggle="modal" data-bs-target="#updateincomePlan{{$data->id}}"></a>
                @include('budget.updateIncomePlan')
            </td>
            <td></span>
              <a href="#"><span class="fa fa-trash btn" style="font-weight:700; font-size:20px; color:red" data-bs-toggle="modal" 
                data-bs-target="#deleteIncomePlan{{$data->id}}"></span>
              </a>
              @include('budget.deleteIncomePlan')
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


@include('budget.addincomePlan')


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
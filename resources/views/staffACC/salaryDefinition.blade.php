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
      <h4>Salary Definition
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div>
        <form method="GET" action="{{route('fetchContracts')}}" name="form" >
        @csrf  
        <div class="row col-12">



          <div class=" col-xs-12 col-lg-4 col-md-4 text-left">
            <input type="button" name="" value="Define New Salary" class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#addmodal">
          </div>

        </div>
        
      </form>
        <br>
      
        @include('inc.messages')
          {{-- <input type="submit" value="Generate Report" name="submit" class="btn btn-outline-success form-control"> --}}
          <div class="row gy-5">
            {{-- FUNCTION TO FORMAT THE MONEY --}}
         <?php
         function formatNumber($number) {
          $formatted_number = number_format($number, 2);
          return $formatted_number;
          }
         ?>
        {{-- FUNCTION TO FORMAT THE MONEY --}}
        <table class="table" id="empTable" style="color:#000; font-size:13px;">
          <thead>
        <th>SN</th>
        <th>Grade Level</th> 
        <th>Designation</th> 
        <th>Basic Salary</th>
        <th>Allowance</th>
        <th>Tax</th>
        <th>Pension</th>
        <th>Bonus</th>
        <th>Other Deductions</th>
        <th>Edit</th>
        <th>Delete</th>
        </thead>

        @if (isset($salaryDefinition))
          
        <p class="d-none">{{$n=1}} </p>
        <tbody>
   @foreach ($salaryDefinition as $data)
          <td>{{$n}}</td>
          <td>{{$data->gradeLevel}}</td>
          <td>{{$data->designation}}</td>
          <td>&#x20A6;{{formatNumber($data->basicSalary)}}</td>
          <td>{{$data->allowance}}%</td>
          <td>{{$data->tax}}%</td>
          <td>{{$data->pension}}%</td>
          <td>&#x20A6;{{number_format($data->bonus, 2)}}</td>
          <td>&#x20A6;{{number_format($data->otherDeductions)}}</td>
            <td>
              <a href="#"> <span type="button"  class="fa bi-pencil-square btn" style="font-weight:700; font-size:20px; color:blue" data-bs-toggle="modal" data-bs-target="#update{{$n}}"></a>
                @include('inc.updateSalary_definition_modal')
            </td>
            <td></span>
              <a href="#"><span class="fa bi-trash btn" style="font-weight:700; font-size:20px; color:red" data-bs-toggle="modal" data-bs-target="#deletemodal{{$data->id}}"></span>
              </a>
              @include('inc.deleteSalary_definition_modal')
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


  @include('inc.addSalary_definition_modal')


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
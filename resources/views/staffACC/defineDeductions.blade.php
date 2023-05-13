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
      <h4>Other Deductions
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div>
        <form method="GET" action="{{route('fetchDeductionStaffs')}}" name="form" >
        @csrf  

        <div class="row col-12">
          <div class=" col-xs-12 col-lg-4 col-md-4 text-left">
            <input type="button" name="" value="Define Deductions" class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#addDeduction">
          </div>
        </div>
  <br/>

      <div class="row input-group ">

        <div class=" col-xs-12 col-lg-3 col-md-3">
          <select class="form-control lineColor" name="deductions" id="deductions" required>
            <option value="">--Select Deductions--</option>
            <option value="nhia">NHIA</option>
            <option value="nhf">NHF</option>
            <option value="university_loan">University Loan</option>
            <option value="cooperative_loan">Co-operative Loan</option>
            <option value="commodity_loan">Commodity Loan</option>
            <option value="cooperative_contribution">Co-operative Contribution</option>
            <option value="school_fees">School Fees</option>
          </select>
        </div>
        
        <div class=" col-xs-12 col-lg-3 col-md-3">
          <input type="submit" name="generate" value="Generate" class="btn btn-success">
        </select>
        </div>        
      </form>
    </div>  
    <p></p><p></p>
        @include('inc.messages')
          {{-- <input type="submit" value="Generate Report" name="submit" class="btn btn-outline-success form-control"> --}}
          @if (isset($deductiontype))
            <div class="row col-12 text-center">
            <h5 style="font-weight:bold"> Staffs liable for {{ implode(' ', explode('_', $deductiontype)) }} deductions </h5> 
            </div>
        @endif

         
          <div class="row gy-5">
         
        <table class="table" id="empTable" style="color:#000; font-size:13px;">
          <thead>
        <th>SN</th>
        <th>Financial Year</th> 
        <th>Staff No.</th> 
        <th>Name</th>
        <th>Designation</th>
        <th>Department</th>
        <th>NHIA</th>
        <th>NHF</th>
        <th>University Loan</th>
        <th>Co-operative Loan</th>
        <th>Commodity Loan</th>
        <th>Co-operative Corporations</th>
        <th>School Fees</th>
        <th>Duration</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Update</th>
        <th>Delete</th>
        </thead>

        @if (isset($staffs))
          
        <p class="d-none">{{$n=1}} </p>
        <tbody>
   @foreach ($staffs as $data)
          <td>{{$n}}</td>
          <td>{{$data->financial_year}}</td>
          <td>{{$data->staffNo}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->designation}}</td>
          <td>{{$data->department}}</td>
          <td>&#x20A6;{{number_format(intval($data->nhia), 2)}}</td>
          <td>&#x20A6;{{number_format(intval($data->nhf), 2)}}</td>
          <td>&#x20A6;{{number_format(intval($data->university_loan), 2)}}</td>
          <td>&#x20A6;{{number_format(intval($data->cooperative_loan), 2)}}</td>
          <td>&#x20A6;{{number_format(intval($data->commodity_loan), 2)}}</td>
          <td>&#x20A6;{{number_format(intval($data->cooperative_contribution), 2)}}</td>
          <td>&#x20A6;{{number_format(intval($data->school_fees), 2)}}</td>
          <td>{{$data->duration}} Months</td>
          <td>{{$data->startDate}}</td>
          <td>{{$data->endDate}}</td>

            <td>
              <a href="#"> <span type="button"  class="fa bi-pencil-square btn" style="font-weight:700; font-size:20px; color:blue" 
                data-bs-toggle="modal" data-bs-target="#update{{$data->id}}"></a>
              @include('staffACC.updateOtherDeductions')
            </td>
            <td></span>
              <a href="#"><span class="fa bi-trash btn" style="font-weight:700; font-size:20px; color:red" data-bs-toggle="modal" 
                data-bs-target="#deleteDeductions{{$data->id}}"></span>
              </a>
              @include('staffACC.deleteOtherDeductions')
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


@include('staffACC.addDeduction')  
  


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
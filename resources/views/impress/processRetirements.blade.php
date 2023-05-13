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
      <h4>Process Retirements
        
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div>
        <form method="GET" action="{{route('fetchProcessSubmission')}}" name="form" >
        @csrf
        {{-- <div class="input-group ">
          
          <select type="text" name="dept" id="dept" class="form-control lineColor">
            <option>Select</option>
            @foreach ($departments as $department)
            <option>{{$department->department}}</option>
            @endforeach
          </select><span style="color: white">' '</span>

          <select type="text" name="fyear" id ="fyear" class="form-control lineColor">
              <option>Select Academic Year</option>      
              @foreach ($financial_year as $fyear)
              <option>{{$fyear}}</option>
              @endforeach
          </select>
          
          
          <span style="color: white">' '</span>
          <input type="submit" name="generate" value="Generate Report" class="btn btn-success">
        </div> --}}
      </form>
            
        
        <br>
       
       
            {{-- @include('inc.addSchool_fees_definition_modal') --}}
      
        @include('inc.messages')
        <br>
        <?php
         function formatNumber($number) {
          $formatted_number = number_format($number, 2);
          return $formatted_number;
          }
         ?>
         @if(isset($submissionlog))
        <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
          <thead>
          <th>SN</th>
          <th>Department</th> 
          <th>Faculty</th>
          <th>Financial Year</th>
          <th>Amount</th>
          <th>Expenditure</th>
          <th>Status</th>
          <th>Submitted At</th>
          <th>Message</th>
          <th>View Receipt</th>
          <th>Action</th>
          </thead>
         <p class="d-none">{{$n=1}} </p>

          <tbody>
     @foreach ($submissionlog as $data)
            <td>{{$n}}</td>
            <td>{{$data->department}}</td>
            <td>{{$data->faculty}}</td>
            <td>{{$data->financial_year}}</td>
            <td>&#x20A6 {{formatNumber($data->amount)}}</td>
            <td>{{$data->expenditure}}</td>
            <td>{{$data->status}}</td>
            <td>{{date('Y-n-j,  g:i:s A', strtotime($data->updated_at))}}</td>
            <td>{!! html_entity_decode($data->message) !!}</td> 
            <td><a href="/storage/retirements/{{$data->receipt_id}}" target="_blank" style="color:blue; font-weight:bold">View Receipt</a>
              </td>
            
            <td><a href="#"><span class="fa fa-edit btn" style="font-weight:700; font-size:20px; color:blue" 
              data-bs-toggle="modal" data-bs-target="#processmodal"></span></a>
              @include('impress.processRetirementModal')
            </td>
            {{-- @include('inc.updateSchool_fees_definition_modal') --}}
            
          {{-- @include('impress.deleteDisbursement') --}}
            
            
        </tr>
        <p class="d-none">{{$n++}} </p> 

     @endforeach
          </tbody>
         
          
      </table> 
    
        
     @endif
    </div>
  </div>
  
  @include('impress.addretirement')
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script src="js/jquery-3.2.1.js"></script>

  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="j/bootstrap-filestyle.min.js"> </script>


{{-- @include('inc.payslip_js') --}}


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
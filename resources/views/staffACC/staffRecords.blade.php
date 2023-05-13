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
      <h4>Staff Records
        
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div>
        <form method="GET" action="{{route('viewStaffsRecord')}}" name="form" >
        @csrf  
        <div class="row col-12">

          <div class="col-xs-12  col-lg-4 col-md-4 form-control">
            <select type="text" name="department" id ="department" class=" form-control lineColor">
              <option>Select Department</option>      
              @foreach ($department as $dept)
              <option value="{{$dept->department}}">{{$dept->department}}</option>
              @endforeach
            </select>
          </div>

         
          <div class="col-xs-12  col-lg-4 col-md-4 form-control">
            <input type="submit" value="View Staffs" class="btn btn-outline-primary">
          </div>
         

        </div>
       
      </form>
        <br>
        @if(isset($requestedDept)) 
        <div class="row col-12 text-center"><h5>Staff records for department of {{ucfirst($requestedDept)}} (Number of Staffs: {{$numStaffs}} )</h5></div>
        @endif
        @include('inc.messages')
        <br>
        
        <table class="table table-striped table-responsive" id="empTable" style="color:#000; font-size:13px;">
          <thead>
          <th>SN</th>
          <th> Name</th> 
          <th>Gender</th>
          <th>Email</th>
          <th>Phone</th>

          <th>Staff No.</th>
          <th> Designation</th> 
          <th>Grade Level</th>

          <th>Appointment Date</th>
          <th>Assumption Date</th>
          <th>Role</th>

          <th>Account Number</th> 
          <th>Bank Name</th>
          <th>Branch Address</th>
          <th>Sort Code</th>
          <th>PFA</th>
          <th>RSA Pin</th>

          <th>Status</th>


          </thead>

          @if(isset($staffRecords))   
         <p class="d-none">{{$n=1}} </p>

          <tbody>
     @foreach ($staffRecords as $data)
            <td>{{$n}}</td>
            <td>{{$data->title. ' '. $data->fname. ' '. $data->oname. ' '. $data->lname }}</td>
            <td>{{$data->sex}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->phone}}</td>

            <td>{{$data->staffNo}}</td>
            <td>{{$data->designation}}</td>
            <td>{{$data->grade_level}}</td>

            <td>{{$data->appointmentDate}}</td>
            <td>{{$data->assumptionDate}}</td>
            <td>{{$data->role}}</td>

            <td>{{$data->accountNo}}</td>
            <td>{{$data->bankName}}</td>
            <td>{{$data->branchAdd}}</td>
            <td>{{$data->sortCode}}</td>
            <td>{{$data->PFA}}</td>
            <td>{{$data->rsaPIN}}</td>

            <td>{{ucfirst($data->status)}}</td>
            
            
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
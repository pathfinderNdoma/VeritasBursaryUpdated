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
      <h4>Disbursement
        
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div> 
        <form method="GET" action="{{route('fetch')}}" name="form">
        @csrf
        
       
             {{-- **************************ADD NEW DISBURSEMENT BUTTON ****************************************************************--}}
        
         <input type="button" name="add" value="Make Disbursement" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addmodal">
        
         {{-- **************************ADD NEW DISBURSEMENT BUTTON ********************************************************************--}}
       
         <p></p>
         @include('inc.messages')
         {{-- @if(isset($successMessage))
            <p>{!! htmlspecialchars($successMessage, ENT_QUOTES, 'UTF-8') !!}</p>
         
         @endif --}}
         <hr>
        <div class="input-group ">

          <select type="text" name="dept" id="dept" class=" lineColor">
            <option>Select</option>
            @foreach ($departments as $department)
            <option>{{$department->department}}</option>
            @endforeach
          </select><span style="color: white">' '</span>

          <select type="text" name="fyear" id ="fyear" class="lineColor">
              <option>Select Academic Year</option>      
              @foreach ($financial_year as $fyear)
              <option>{{$fyear}}</option>
              @endforeach
          </select>
          
          
          <span style="color: white">' '</span>
          <input type="submit" name="generate" value="Generate" class="btn btn-primary">
        </div>
      </form>
        <br>
       
         
        <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
          <thead>
          <th>SN</th>
          <th>Name</th> 
          <th>Department</th> 
          <th>Designation</th>
          <th>Amount</th>
          {{-- <th>Financial Year</th> --}}
          <th>Date</th>
          <th>Payment Receipt</th>
          <th>Action</th>
          </thead>
         <p class="d-none">{{$n=1}} </p>
         @if(isset($disbursements))
          <tbody>
     @foreach ($disbursements as $data)
            <td>{{$n}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->department}}</td>
            <td>{{$data->designation}}</td>
            <td>&#x20A6 {{number_format($data->amount)}}</td>
            {{-- <td>{{$data->financial_year}}</td> --}}
            <td>{{date('Y-n-j g:i:s A', strtotime($data->date))}}</td>
            
            <td class="text-center"><a href="{{route('disbursmentReceipt', ["date_created"=>$data->created_at, 'id'=>$data->id])}}"> 
              <span type="button"  class="fa bi-download btn" style="font-weight:700; font-size:20px; color:blue"></a></span></td>

            <td><a href="{{route('updateDisbursementView', ['id'=>$data->id])}}"> 
              <span type="button"  class="fa fa-edit btn" style="font-weight:700; font-size:20px; color:blue"></a></span>
              <a href="#"><span class="fa bi-trash btn" style="font-weight:700; font-size:20px; color:red" data-bs-toggle="modal"
                 data-bs-target="#deletemodal"></span>
              </a>
            </td>
            {{-- @include('inc.updateSchool_fees_definition_modal') --}}
            
          @include('impress.deleteDisbursement')
            
          
            
        </tr>
        <p class="d-none">{{$n++}} </p> 

     @endforeach
          </tbody>
         
          
      
                      
                      
                      
                       
        </div>
     @endif
    </div>
  </div>
  </div>
  
  @include('impress.addDisbursement')
  @include('impress.disbursmentApplication')
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


<script>
  document.getElementById('adddisbursement').addEventListener('click', function() {
    var department = document.getElementById('addDepartment').value;
    alert(department)
    // var basciSalary = document.getElementById('basicSalary').value;
    // var allowance = document.getElementById('allowance').value;
    // var tax = document.getElementById('tax').value;
    // var pension = document.getElementById('pension').value;
    // var id = document.getElementById('id').value;

    // build the URL with the values as query parameters
    var url = '/log?faculty=' + encodeURIComponent(faculty) + '&basicSalary=' + encodeURIComponent(basicSalary) + '&allowance=' + encodeURIComponent(allowance);

    // update the href attribute of the anchor tag
    this.setAttribute('href', url);
  });
</script>
<script>
  setTimeout(function() {
    $("#auto-dismiss-alert").alert('close');
  }, 3000);
  </script>



<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>

</html>
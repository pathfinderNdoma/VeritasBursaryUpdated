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
      <h4>Disbursement Application
        
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div> 
        <form method="GET" action="{{route('fetch')}}" name="form">
        @csrf
        
          <div class="col-lg-4 col-md-4 col-xs-12">
             {{-- **************************ADD NEW DISBURSEMENT BUTTON ****************************************************************--}}
        
         <input type="button" name="add" value="Apply for Disbursment" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#disbursementApplication">
        
         {{-- **************************ADD NEW DISBURSEMENT BUTTON ********************************************************************--}}
          </div>
        

        


        
         
         <p></p>
         @include('inc.messages')
         {{-- @if(isset($successMessage))
            <p>{!! htmlspecialchars($successMessage, ENT_QUOTES, 'UTF-8') !!}</p>
         
         @endif --}}
         <hr>
        <div class="input-group ">


          {{-- <select type="text" name="fyear" id ="fyear" class="lineColor">
              <option>Select Academic Year</option>      
              @foreach ($financial_year as $fyear)
              <option>{{$fyear}}</option>
              @endforeach
          </select>
          
          
          <span style="color: white">' '</span>
          <input type="submit" name="generate" value="Generate Applications" class="btn btn-primary"> --}}
            </div>
          </form>
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
          <th>Name</th>
          <th>Department</th>
          <th>Designation</th> 
          <th>Amount</th>
          <th>Purpose</th>
          <th>Date</th>
          <th>Status</th>
          <th>Message</th>
          <th>Update</th>
          <th>Delete</th>
          </thead>

         <p class="d-none">{{$n=1}} </p>
         @if(isset($disbursments))
          <tbody>
     @foreach ($disbursments as $data)
            <td>{{$n}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->department}}</td>
            <td>{{$data->designation}}</td>
            <td>&#x20A6 {{formatNumber($data->amount)}}</td>
            <td>{{$data->purpose}}</td>
            <td>{{$data->date}}</td>
            <td>{{$data->status}}</td>
            <td>{{$data->message}}</td>
                @if ($data->status=='Approve' || $data->status=='Decline' )
                <td>
                    
                  <a> <span type="button" 
                    class="fa fa-edit btn" style="font-weight:700; font-size:20px; color:grey"
                    data-bs-toggle="modal" data-bs-target="#">
                   </a></span>
                </td> 
                
                <td>
                  <a><span class="fa fa-trash btn" style="font-weight:700; font-size:20px; color:grey" 
                    data-bs-toggle="modal" data-bs-target=""></span>
                    @include('impress.deleteDisbursementApplication')
                  </a> 
                </td> 

                @else
                <td>
                  <a href="#"> <span type="button" 
                    class="fa fa-edit btn" style="font-weight:700; font-size:20px; color:blue"
                    data-bs-toggle="modal" data-bs-target="#editapplication">
                    </a></span>
                    @include('impress.editDisbursmentApplication')
                  
                </td>

                <td>
                  <a href="#"><span class="fa fa-trash btn" style="font-weight:700; font-size:20px; color:red" 
                    data-bs-toggle="modal" data-bs-target="#deleteDisbursmentApplication"></span>
                    @include('impress.deleteDisbursementApplication')
                  </a> 
                </td> 
                @endif
            
            
        </tr>
        <p class="d-none">{{$n++}} </p> 

     @endforeach
          </tbody>
         
          
      </table> 

     @endif
    </div>
  </div>
  </div>

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
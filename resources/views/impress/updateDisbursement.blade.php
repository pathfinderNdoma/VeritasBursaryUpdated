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
        <div class="row col-12">
   
      
        </div>
          
            @csrf
            <div class="card" style="border:1px solid #198754">
              <div class="card-header text-center" style="background-color:#198754; color:white; font-weight:bold">
                Update Disbursement
              </div>
              <div class="card-body">
                
                <div class="row">
            
                  <form name="form" method="GET" action="{{route('updateDisbursement')}}" enctype="multipart/form-data">
                    @csrf

                      {{-- Hidden Field --}}
                      <input type="text" class="form-control" value="{{$data->id}}" aria-label="First name" name="id" required>
                     {{-- Hidden Field --}}
                     
                  </div>
                      <div class="col-12">
                        <div class="row col-12">
          
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <label for="basicSalary">Department</label>
                                <input type="text" class="form-control lineColor"  value="{{$data->department}}" 
                                 name="department" required readonly style="background-color: white">
                               
                            </div>
                            <br/><br/>

                            <div class="col-lg-6 col-md-6 col-xs-12">
                              <label for="basicSalary">Faculty</label>
                              <input type="text" class="form-control lineColor" value="{{$data->faculty}}"   
                              name="faculty" required readonly style="background-color: white">
                          </div>
                          <br/><br/></br>
                          <p></p>
                            
                          <div class="col-lg-6 col-md-6 col-xs-12">
                            <label for="basicSalary">Amount</label>
                            <input type="text" class="form-control lineColor" value="{{$data->amount}}" 
                             name="amount" required  style="background-color: white">
                        </div>
                        <br/><br/>

                        <div class="col-lg-6 col-md-6 col-xs-12">
                          <label for="basicSalary">Financial Year</label>
                          <input type="text" class="form-control lineColor" value="{{$data->financial_year}}" 
                          value=""  name="financial_year" required  style="background-color: white">
                      </div>
<br/><br/><br/></br>
                  <div class="row col-12">

                    <div class="col-lg-4 col-md-4 col-xs-12">
                      <a href="{{route('disbursementIndex')}}" class="btn borderColor form-control"
                      style="background-color:white; color:#198754; border: 1px solid #198754; border-colo">Cancel</a>
                    </div>
                  </br></br>
                    <div class="col-lg-4 col-md-4 col-xs-12">
                      <input type="submit" class="btn btn-success form-control" value="Update"
                       style="background-color:#198754; color:white; border: 1px #198754 ">
                    </div>
                  </div>

                      
          </div>
          </div>
        </div>

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
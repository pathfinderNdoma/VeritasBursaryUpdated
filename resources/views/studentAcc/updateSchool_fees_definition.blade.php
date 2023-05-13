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
          <form name="form" method="POST" action="{{route('updateSchoolfeesDefinition')}}" enctype="multipart/form-data">
            @csrf
            <div class="card" style="border:1px solid #198754">
              <div class="card-header text-center" style="background-color:#198754; color:white; font-weight:bold">
                Update School Fees
              </div>
              <div class="card-body">
                
                <div class="row col-12">
            
                    
                      {{-- Hidden Field --}}
                      <input type="text" class="form-control d-none" value="{{$data->id}}" aria-label="First name" name="id" required>
                     {{-- Hidden Field --}}
                  </div>
                      <div class="col-12 g-3">
                        <div class="row col-12">
          
                        <br/>
                        <div class="col-12 g-3">
                          <label for="department" style="color:green">Department</label>   
                          <select class="form-control lineColor" name="department" id="department" required>
                            <option value="">--Select Department--</option>
                            @foreach ($department as $department)
                            <option value="{{$department->department}}">{{$department->department}}</option>
                            @endforeach
                          </select>
                      </div>
                      
                            <div class="col-12 g-3">
                                <label for="basicSalary">Fees</label>
                                <input type="text" class="form-control lineColor" placeholder="Enter Fees" value="{{$data->fee}}"  name="fees" required>
                               
                            </div>
                            <br/><br/>
                            <div class="col-12  g-3">
                                <label for="allowance">Amount</label>
                                <input type="text" class="form-control lineColor" placeholder="Enter Amount" value="{{$data->amount}}"  name="amount" required>
                            </div>
                            <br/><br/>
                            <div class="col-12  g-3">
                              
                                <label for="tax">Description</label>
                                <textarea class="form-control lineColor"  name="description" cols="10" rows="4" value required>{{$data->description}}</textarea>
                                
                            </div>
                
              </div>
            </br>
              <div class="row">
                <div class="col-lg-4 col-xs-12 col-md-4"></div>
                  <div class="col-lg-4 col-xs-12 col-md-4">
                    <a href="{{route('schoolFeesDef')}}" class="btn btn-outline-success form-control"
                    style="background-color:white; border-outline-color:#198754; color:#198754;
                     font-weight:bold; border: 1px solid #198754;" >Cancel</a>
                  </div>
                </br></br></br>
                  <div class="col-lg-4 col-xs-12 col-md-4">
            
                    <input type="submit" value="Update School Definition"
                     class="btn btn-success form-control" style="background-color:#198754; color:white; font-weight:bold ">
                  </div>
                
                
                
              </div>
            </div>
          </div>
          </div>
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
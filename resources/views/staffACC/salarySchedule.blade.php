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
        <h4>Salary Schedule
          <hr>
        </h4>
        @include('inc.messages')
        <form method="GET" action="{{route('addschedule')}}">
          @csrf
          <div class="input-group ">
            <span class="input-group-text">Financial Year.</span>
            <select type="text" name="year" id ="year" class="form-control  lineColor">
              <option>Select Financial Year</option>   
              <option>{{$financial_year}}</option>
          </select>
          </div>
          <br>
          <div class="input-group ">
            <span class="input-group-text">Month</span>
            <select type="text" name="month" class="form-control lineColor">
              <option value="january">January</option>
              <option value="february">February</option>
              <option value="march">March</option>
              <option value="april">April</option>
              <option value="may">May</option>
              <option value="june">June</option>
              <option value="july">July</option>
              <option value="august">August</option>
              <option value="september">September</option>
              <option value="october">October</option>
              <option value="november">November</option>
              <option value="december">December</option>
            </select>
          </div>
          <br>
         
          
          
          <div class="col-12">
            <a href="#" data-bs-toggle="modal" data-bs-target="#schedule" class="form-control btn btn-md btn-primary">
            Schedule Salary
            </a>
          </div>
        

      <!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->

<!-- Modal -->
<<div class="modal fade" id="schedule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Schedule Salary</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <div class="modal-body">
        Are you sure you want to schedule salary for this month?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

        <input value='Submit' type="submit" style="color:white" class=" btn btn-primary">
           
      </div>
    </div>
  </div>
</div>
        
     <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
    </form>
  </div>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
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
        <form method="POST" action="staffReg">
          @csrf
          <div class="input-group ">
            <span class="input-group-text">Financial Year.</span>
            <select type="text" name="staffNo" class="form-control lineColor">
              <option>2023</option>
              <option>2024</option>
              <option>2025</option>
              <option>2026</option>
              <option>2027</option>
            </select>
          </div>
          <br>
          <div class="input-group ">
            <span class="input-group-text">Month</span>
            <select type="text" name="title" class="form-control lineColor">
              <option>Jan</option>
              <option>Feb</option>
              <option>Mar</option>
              <option>April</option>
              <option>May</option>
              <option>Jun</option>
              <option>Jul</option>
              <option>Aug</option>
              <option>Sept</option>
              <option>Oct</option>
              <option>Nov</option>
              <option>Dec</option>
            </select>
          </div>
          <br>
          <div class="input-group ">
            <span class="input-group-text">Allowance</span>
            <input  type="text" name="fname" class="lineColor" placeholder="e.g Housing"/>
            <span class="input-group-text">Percentage (%)</span>
            <input type="text" name="percent" class="lineColor" placeholder="e.g 2.5 NOT 2.5%" />
            <span class="input-group-text">Specifiation</span>
            <select type="text" name="specify" class="form-control lineColor">
              <option>Select</option>
              <option>All regular staff</option>
              <option>Contract staff</option>
              <option>Grade level</option>
            </select>
            <input  type="button" name="add1" value="Add" class="btn btn-primary" />
          
          </div>
          <br>
          <div class="input-group ">
            <span class="input-group-text ">Deductions</span>
            <input  type="text" name="lname" class=" lineColor" placeholder="e.g Tax" />
            <span class="input-group-text">Percentage (%)</span>
            <input  type="text" name="deduct_percent" class=" lineColor" placeholder="e.g 3 NOT 3%" />
            <span class="input-group-text">Specifiation</span>
            <select type="text" name="specify" class="form-control lineColor">
              <option>Select</option>
              <option>All regular staff</option>
              <option>Contract staff</option>
              <option>Grade level</option>
            </select>
            <input  type="button" name="add2" value="Add" class="btn btn-primary" />
          
          </div>
          <br>
          
          <div class="form control">
            <input value='Submit' type="submit" style="color:white" class="form-control btn btn-primary" />
          </div>
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
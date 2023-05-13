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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <div id="content" class="p-4 md-12 ">
      <h4>Update Salary Definition
        <hr>
      </h4>
      
        <div class=" row input-group">
            <div class="col-lg-4 col-md-6 col-xs-12"></div>
            <div class="col-lg-5 col-md-6 col-xs-12"></div>

            <div class="col-lg-3 col-md-3 col-xs-12">
                 
         </div>

        </div>
        <br/>

<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->
<form name="form" method="POST" action="{{route('updateSalaryDefinition')}}" enctype="multipart/form-data">
  @csrf

<div class="row col-12">
                <div class="row col-12">
                  <div class="col-12 g-3">

                    {{-- Hidden Field --}}
                    <input type="text" class="form-control" value="{{$data2->id}}" aria-label="First name" name="id" required>
                   {{-- Hidden Field --}}
                </div>
                    <div class="col-12 g-3">
                      <div class="row col-12">
    
                      </br>
                          <div class="col-12 g-3">
                              <label for="basicSalary">Fees</label>
                              <input type="text" class="form-control" placeholder="Enter Fees" value="{{$data2->fee}}"  name="fees" required>
                             
                          </div>
              
                          <div class="col-12  g-3">
                              <label for="allowance">Amount</label>
                              <input type="text" class="form-control" placeholder="Enter Amount" value="{{$data2->amount}}"  name="amount" required>
                          </div>
              
                          <div class="col-12  g-3">
                            
                              <label for="tax">Description</label>
                              <textarea class="form-control"  name="description" cols="10" rows="4" value required>{{$data->description}}</textarea>
                              
                          </div>
              
            </div>
          </br>
            <div class="row">

                <div class="col-lg-4 col-xs-12 col-md-4">
                  <a href="{{route('salaryDef')}}" class="btn btn-outline-success form-control" >Cancel</a>
                </div>
              </br></br></br>
                <div class="col-lg-4 col-xs-12 col-md-4">
                  <input type="submit" value="Update Salary Definition" class="btn btn-success form-control">
                </div>
              
              
              
            </div>
          </div>
        </div>
      </div>
        
  </form>
             <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
    

        </div>
        <br>
   
    </div>
  </div>
  </div>
@csrf
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
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

<script>
  // document.getElementById('update').addEventListener('click', function() {
  //   var grade_level = document.getElementById('grade_level').value;
  //   var basciSalary = document.getElementById('basicSalary').value;
  //   var allowance = document.getElementById('allowance').value;
  //   var tax = document.getElementById('tax').value;
  //   var pension = document.getElementById('pension').value;
  //   var id = document.getElementById('id').value;

  //   // build the URL with the values as query parameters
  //   var url = '/log?faculty=' + encodeURIComponent(faculty) + '&basicSalary=' + encodeURIComponent(basicSalary) + '&allowance=' + encodeURIComponent(allowance);

  //   // update the href attribute of the anchor tag
  //   this.setAttribute('href', url);
  // });
</script>

<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>

</html>
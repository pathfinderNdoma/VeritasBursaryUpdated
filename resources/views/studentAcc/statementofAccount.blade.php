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
    <div id="content" class="p-4 md-12 ">
      <h4>Statement of Account
        <hr>
      </h4>
      <form method="GET" action="{{route('viewstudents')}}">
        @csrf
        <div class="row">

          <div class="col-md-6 col-xs-12 col-lg-6">
            <select type="text" name="faculty" id="faculty" class="form-control" style="border: 1px solid green;">
                <option>Select</option>
                @foreach ($faculties as $faculty)
                    <option>{{$faculty}}</option>
                @endforeach
            </select>
        </div>
        

            <div class="col-md-6 col-xs-12 col-lg-6">
            <span style="color: white"></span>
            <input type="submit" name="generate" value="Generate " class="btn btn-success form-control" style="background-color: #28a745; color:white">
            </div>
 
          
        </div>
        <br>
       
        @if(isset($students))
          

          
           <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
            <thead>
              <th>SN</th>
              <th>Name</th> 
              <th>Matric No</th>
              <th>Faculty</th>
              <th>Department</th>
              <th>Action</th>
              
        
         <p class="d-none">{{$n=1}}</p>  
            </thead>
            <tbody>
            @foreach ($students as $data)  
                  
                    <td>{{$n}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->matricNo}}</td>
                    <td>{{$data->faculty}}</td>
                    <td>{{$data->department}}</td>
                    <td><a href="{{route('viewsoa', ['id'=> $data->matricNo])}}" class="btn btn-sm btn-primary">View Details</a></td>
                    <p class="d-none">{{$n++}}</p>
                  </tr> 
              @endforeach
              </tbody>  
         
  
            
          </table>
      @else
      <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
        <thead>
          <th>SN</th>
          <th>Name</th> 
          <th>Matric No</th>
          <th>Faculty</th>
          <th>Department</th>
          <th>Action</th>
          
    
     <p class="d-none">{{$n=1}}</p>  
        </thead>
        
      </table>

             @endif
               
           {{-- **************END OF @if IF STATEMENT IF THE REQUEST IS MADE FOR FACULTIES  --}}


          
        
        
    
    
        
      </form>
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
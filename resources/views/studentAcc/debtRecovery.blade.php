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
      <h4> Debt Recovery
        <hr>
      </h4>
      <form method="GET" action="{{route('debtRecovery')}}">
        @csrf
        <div class="input-group ">
          
        <select name="year" id ="year" class="form-control lineColor">
          <option>Select Academic Year</option>
            @foreach ($academic_session as $session)
            <option>{{$session}}</option>
            @endforeach
        </select> <span style="color: white">' '</span>
        
          <select type="text" name="dept" id="dept" class="form-control lineColor">
            <option value="">--Select Faculty /  Department--</option>
           
            @foreach ($department as $department)
            <option>{{$department->department}}</option>  
            @endforeach
            <option>Department</option>
          </select>
          
          <span style="color: white">' '</span>

          <select type="text" name="debtStatus" id ="debtStatus" class="form-control lineColor">
            <option>Select</option>
            <option value="owing">Owing</option>
            <option value="not_owing">Not Owing</option>
        </select><span style="color: white">' '</span>


          <input type="submit" name="generate" value="Generate data" class="btn btn-success">
          
        </div>
        <br>
        
                @isset($debtStatus)
                  @if ($debtStatus=='owing')  
                <h5>Lists of students owing school fees in department of {{$currentdepartment}} for {{$year}} academic session</h5>
                  @endif 

                  @if ($debtStatus=='not_owing')  
                  <h5>Lists of students not owing school fees in department of {{$currentdepartment}} for {{$year}} academic session</h5>
                  @endif 

                @endisset

            <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
              <thead>
                <th>SN</th> 
                <th>Name</th>
                <th>Matric No</th>
                <th>Faculty</th>
                <th>Amount Billed</th>
                <th>Amount Paid</th>

                @isset($debtStatus)
                  @if ($debtStatus=='owing')  
                <th>Balance (Owe by Student)</th> 
                  @endif 

                  @if ($debtStatus=='not_owing')  
                <th>Balance (Owe by School)</th> 
                  @endif 

                @endisset
                <th>Statement of Account</th>
          @if (isset($debtors_creditors))
              
         
            <p class="d-none">{{$n=1}}</p>

            <tbody>
            @foreach ($debtors_creditors as $data)      
            </thead>
              <td>{{$n}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->matricNo}}</td>
              <td>{{$data->faculty}}</td>
              <td>&#x20A6;{{number_format($data->amountBilled)}}</td>
              <td>&#x20A6;{{number_format($data->totalPaid)}}</td>
              <td>&#x20A6;{{number_format($data->amountBilled-$data->totalPaid)}}</td>
              <td>
              <a href="{{route('viewsoa', ['id'=> $data->matricNo])}}">
              <h5 style="color:green; font-weight:bolder"><i class="bi bi-download"></i>
              </h5></span>
            </a>
          </td>
              <p class="d-none">{{$n++}}</p>
            </tr>
            @endforeach
           
            </tbody>
            </table>
            {{-- **************END OF @else STATEMENT IF THE REQUEST IS MADE FOR FACULTIES  --}}    
       
@endif
</form>
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
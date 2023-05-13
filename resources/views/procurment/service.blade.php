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
      <h4>Services Procurred
        
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div>
        <form method="GET" action="{{route('fetchService')}}" name="form" >
        @csrf  
        <div class="row col-12">

          <div class="col-xs-12  col-lg-4 col-md-4 form-control">
            <select type="text" name="year" id ="year" class=" form-control lineColor" required>
              <option value="">--Select Year--</option>      
              @foreach ($financial_year as $year)
                  <option value="{{$year}}">{{$year}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-xs-12  col-lg-4 col-md-4 form-control">
            <input type="submit" name="generate" value="Generate" class="btn btn-success">
          </div>

          <div class=" col-xs-12 col-lg-4 col-md-4 text-right">
            <input type="button" name="" value="Add Service" class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#addService">
          </div>
         

        </div>
       
      </form>
        <br>
      
        @include('inc.messages')
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
          <th>Service Type</th> 
          <th>Description</th>
          <th>Amount</th>
          <th>Date of Commencement</th>
          <th>Date of Completion</th>
          <th>Supervised By</th>
          <th>Designation</th>
          <th>Receipt</th>
          <th>Update</th>
          <th>Delete</th>
          </thead>

          @if(isset($services))   
         <p class="d-none">{{$n=1}} </p>

          <tbody>
     @foreach ($services as $data)
            <td>{{$n}}</td>
            <td>{{$data->serviceType}}</td>
            <td>{{$data->description}}</td>
            <td>{{number_format($data->amount, 2)}}</td>
            <td>{{$data->dateofCommmencement}}</td>
            <td>{{$data->dateofCompletion}}</td>
            <td>{{$data->supervisedby}}</td>
            <td>{{$data->designation}}</td>
            <td>
              <a  href="/storage/Services_Procurred/{{$data->receipt}}" target="_blank"> <span type="button"  
                class="fa bi-download btn" style="font-weight:700; font-size:20px; color:blue" >
              </a>
            </td>  

            <td>
              <a href="#"><span class="fa bi-pencil-square btn" style="font-weight:700; font-size:20px; color:blue" 
                data-bs-toggle="modal" data-bs-target="#updateService{{$data->id}}"></span></a>
                @include('procurment.updateService')
            </td>

            <td>
              <a href="#"><span class="fa bi-trash fa-wrench btn" style="font-weight:700; font-size:20px; color:red" 
              data-bs-toggle="modal" data-bs-target="#deleteServices{{$data->id}}"></span></a>
              @include('procurment.deleteService')
              </td>   

            
            
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


@include('procurment.addService')


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
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
    
   
    <div id="content" class="p-4 md-12 ">
      <h4>Properties In Use
        
        <hr>
      </h4>
      
        <form method="GET" action="{{route('fectchpropertiesInUse')}}" name="form" >


          <div class="row col-12">
            <div class="col-md-4 col-xs-12 col-lg-4">
              <select name="year" id="year" class="form-control lineColor">
                <option>--Select Year--</option>
                @foreach ($year as $year)
                <option value="{{$year->start_date}}">{{date('Y', strtotime($year->start_date))}}</option>  
                {{-- <option value="{{$year->start_date}}">{{$year->start_date}}</option>  --}}
                @endforeach
                
              </select>
            </div>
  
            <div class="col-md-4 col-xs-12 col-lg-4">
              <input type="submit" name="" value="Generate" class="btn btn-outline-success">
            </div> 
          </div>
          
        @csrf  
        
        
        
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
          <th>Name of Applicant</th> 
          <th>Address</th> 
          <th>Phone Number</th> 
          <th>Email</th> 
          <th>Name of Property</th> 
          <th>Location</th>
          <th>Description</th>
          <th>Amount</th>
          <th>Usage</th>
          <th>DateTime</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Download Receipt</th>
          

          </thead>

          <p class="d-none">{{$n=1}} </p>
            @if (isset($properties))
                
           @foreach ($properties as $data)
           <td>{{$n}}</td>
           <td>{{$data->applicant_name}}</td>
           <td>{{$data->address}}</td>
           <td>{{$data->phone_number}}</td>
           <td>{{$data->email_address}}</td>
           <td>{{$data->property_name}}</td>
           <td>{{$data->property_location}}</td>
           <td>{{$data->description}}</td>
           <td>&#x20A6;{{formatNumber($data->amount)}}</td>
           <td>{{$data->usage}}</td>
           <td>{{$data->created_at}}</td>
           <td>{{$data->start_date}}</td>
           <td>{{$data->end_date}}</td>
           
           

            <td>
              <a href="#"><span class="fa fa-sharp fa-light fa-download btn" style="font-weight:300; font-size:20px;" 
                data-bs-toggle="modal" data-bs-target=""></span>
              </a>
            </td> 

            

          
        </tr>
        <p class="d-none">{{$n++}} </p> 

        @endforeach
          </tbody>
          @endif
          
      </table> 
    
        

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
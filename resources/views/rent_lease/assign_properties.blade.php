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
      <h4>Assign Properties
        
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div>
        <form method="GET" action="{{route('fetchContracts')}}" name="form" >
        @csrf  
        <input type="button" name="" value="Assign Property" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#assignProperty">
        
        
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
          <th>Name of Property</th> 
          <th>Phone Number</th> 
          <th>Email</th> 
          <th>Location</th>
          <th>Description</th>
          <th>Amount</th>
          <th>Usage</th>
          <th>DateTime</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>update</th>
          <th>Delete</th>
          <th>Generate Invoice</th>
          <th>Action</th>

          </thead>

          <p class="d-none">{{$n=1}} </p>
            @if (isset($assigned_properties))
                
           @foreach ($assigned_properties as $data)
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
            <a href="#"> <span type="button"  class="fa fa-edit btn" style="font-weight:700; font-size:20px; color:blue" 
              data-bs-toggle="modal" data-bs-target="#updateAssignProperty{{$data->id}}"></a>
              @include('rent_lease.updateAssignedProperty')
            </td>
            
            <td>
              <a href="#"><span class="fa fa-trash btn" style="font-weight:700; font-size:20px; color:red" 
                data-bs-toggle="modal" data-bs-target="#deleteproperty{{$data->id}}"></span>
              </a>
            </td>

            <td>
              <a href="#" class="btn btn-sm">Generate
              </a>
            </td> 

            <td>
              <a href="#"><span class="fa fa-solid fa-bars btn" style="font-weight:700; font-size:20px; color:green" 
                data-bs-toggle="modal" data-bs-target="#assignAction{{$data->id}}"></span>
              </a>
              @include('rent_lease.assignActionModal')
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


@include('rent_lease.assignPropertyModal')


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
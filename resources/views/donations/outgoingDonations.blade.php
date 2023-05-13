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
      <h4>Outgoing Donations
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div>
        <form method="GET" action="{{route('fetchContracts')}}" name="form" >
        @csrf  
        <div class="row col-12">



          <div class=" col-xs-12 col-lg-4 col-md-4 text-left">
            <input type="button" name="" value="Add Donations" class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#addDonations">
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
          $pattern = '/[a-zA-Z!@#$%^&*(),.?":{}|<>]/'
         ?>
        
        <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
          <thead>
          <th>SN</th>
          <th>Beneficiary</th> 
          <th>Address</th>
          <th>Email</th>
          <th>Contact No.</th>
          <th>Purpose</th>
          <th>Amount / Item</th>
          <th>Donation Date</th>
          <th>Donation Letter</th>
          <th>Payment Receipt</th>
          <th>Update</th>
          <th>Delete</th>
          </thead>

          @if(isset($donations))   
         <p class="d-none">{{$n=1}} </p>

          <tbody>
     @foreach ($donations as $data)
            <td>{{$n}}</td>
            <td>{{$data->beneficiary}}</td>
            <td>{{$data->address}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->contact_no}}</td>            
            <td>{{$data->purpose}}</td>

            

            
            @if(preg_match($pattern, $data->amount_item))
            <td>{{$data->amount_item}}</td>
            @else
            <td>&#x20A6;{{formatNumber($data->amount_item)}}</td>  
            @endif

           

            <td>{{date('y-m-d', strtotime($data->donationDate))}}</td>

            {{-- CHecking if the donation letter was  --}}
            @if(($data->donationLetter==''))
            <td> 
              <a  href="#"> <span type="button"  class="fa fa-download btn" style="font-weight:700; font-size:20px; color:grey" ></a>            
            </td> 

            @else
            <td>
              <a  href="/storage/donation_letters/{{$data->donationLetter}}" target="_blank"> <span type="button" 
                 class="fa fa-download btn" style="font-weight:700; font-size:20px; color:blue" ></span>
                </a>
            </td>                 
              @endif
            {{-- CHecking if the donation letter was  --}}



            <td>
              <a  href="/storage/payment_receipts/{{$data->paymentReceipt}}" target="_blank"> <span type="button" 
                 class="fa fa-download btn" style="font-weight:700; font-size:20px; color:green" ></span>
                </a>
              
            </td>

            <td>
              <a href="#"> <span type="button"  class="fa fa-edit btn" style="font-weight:700; font-size:20px; color:blue"
                 data-bs-toggle="modal" data-bs-target="#update{{$data->id}}"></span>
                </a>
                @include('donations.updateOutgoingDonations')
            </td>
            <td></span>
              <a href="#"><span class="fa fa-trash btn" style="font-weight:700; font-size:20px; color:red"
                 data-bs-toggle="modal" data-bs-target="#delete{{$data->id}}"></span>
              </a>
              @include('donations.deleteOutgoingDonations')
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


@include('donations.addOutgoingDonations')


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
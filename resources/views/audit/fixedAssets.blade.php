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


   
    <div id="content" class="p-4 md-12">
      <h4>Fixed Assets
        
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div>
        <form method="GET" action="{{route('fetchAssets')}}" name="form" >
        @csrf  
        <div class=" col-xs-12 col-lg-4 col-md-4">
          <input type="button" name="" value="Add Asset" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#addasset  ">
        </div>
<hr>
        <div class="row col-12">

          <div class="col-xs-12  col-lg-4 col-md-4 form-control">
            <select type="text" name="year" id ="year" class=" form-control lineColor">
              <option>Select Year</option>      
              @foreach ($financial_year as $fyear)
              <option value="{{$fyear}}">{{$fyear}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-xs-12  col-lg-4 col-md-4 form-control">
                <select  name="item_nature" id ="item_nature" class=" form-control lineColor" required>
                  <option>Select Type of Asset</option> 
                  <option value="land">Land</option> 
                  <option value="building">Building</option> 
                  <option value="equipment">Equipment</option>     
              </select>
          </div>

          <div class="col-xs-12  col-lg-4 col-md-4 form-control">
            <input type="submit" name="generate" value="Generate Report" class="btn btn-primary">
          </div>


          

        </div>
       
      </form>
        <br>
      
        @include('inc.messages')
        <br>
        
        <table class="table table-striped" id="empTable" style="color:#000; font-size:13px;">
          
          
          <p class="d-none"><?php $n=1?></p>

{{-- ******************************************************DISPLAY LAND ASSETS************************************************************************** --}}
@if(isset($assets))  
      @if ($itemNature=='land')

      <div class="row col-12">
        <div class="col-4"></div>
        <div class="col-4 text-center" >
          <p class="text-center"><h6 style="color:#198754; font-weight:bold">{{strtoupper($itemNature)}} ASSETS</h6></p>
        </div>
              <thead>
                <th>SN</th>
                <th>Size of Land</th>
                <th>Amount of Land</th>
                <th>Location of Land</th>
                <th>Date Purchased</th>
                <th>Sighted By</th>
                <th>Designation</th>
                <th>Date of Sightation</th>
                <th>Receipt</th>
                <th>Update</th>
                <th>Delete</th>
                </thead>
                <tbody>
                  @foreach ($assets as $data)
                  <td>{{$n}}</td>
                  <td>{{$data->landSize}}</td>
                  <td>&#x20A6;{{number_format($data->landAmount)}}</td>
                  <td>{{$data->landLocation}}</td>
                  <td>{{$data->land_datePurchased}}</td>
                  <td>{{$data->sightedBy}}</td>
                  <td>{{$data->sighteby_designation}}</td>
                  <td>{{$data->dateofSightation}}</td>
                  <td>
                    <a  href="/storage/Assets_Receipts/{{$data->landReceipt}}" target="_blank"> <span type="button" 
                     class="fa bi-download btn" style="font-weight:700; font-size:20px; color:blue" >
                     </a>
                    </td>
                  <td>
                    <a href="#"><span class="fa bi-pencil-square btn" style="font-weight:700; font-size:20px; color:blue" 
                      data-bs-toggle="modal" data-bs-target="#updateAsset{{$data->id}}">
                    </span>
                    @include('audit.updateAssets')
                    </a>
                  </td>
      
                  <td>
                    <a href="#"><span class="fa bi-trash fa-wrench btn" style="font-weight:700; font-size:20px; color:red" 
                    data-bs-toggle="modal" data-bs-target="#delete{{$data->id}}"></span></a>
                    @include('audit.deleteAsset')
                    </td>      
              </tr>
            
              <p class="d-none">{{$n++}} </p> 
             
                  @endforeach
          @endif
         
{{-- ********************************************************DISPLAY Building ASSETS***************]******************************************************* --}}
      <p class="d-none">{{$n=1}} </p>
              @if ($itemNature=='building')
              <div class="row col-12">
                <div class="col-4"></div>
                <div class="col-4 text-center" >
                  <p class="text-center"><h6 style="color:#198754; font-weight:bold">{{strtoupper($itemNature)}} ASSETS</h6></p>
                </div>
              <thead>
              <th>SN</th>
              <th>Name of Building</th>
              <th>Location</th>
              <th>Constructed/Donated By</th>
              <th>Amount</th>
              <th>Date of Completion</th>
              <th>Supervised By</th>
              <th>Sighted By</th>
              <th>Designation</th>
              <th>Date of Sightation</th>
              <th>Receipt</th>
              <th>Update</th>
              <th>Delete</th>
              </thead>
              <tbody>
                @foreach ($assets as $data)
                <td>{{$n}}</td>

                <td>{{$data->buildingName}}</td>
                <td>{{$data->buildingLocation}}</td>
                <td>{{$data->constructed_donatedBy}}</td>
                <td>&#x20A6;{{number_format($data->buildingAmount)}}</td>
                <td>{{$data->dateofCompletion}}</td>
                <td>{{$data->buildingSupervisedBy}}</td>
                <td>{{$data->sightedBy}}</td>
                  <td>{{$data->sighteby_designation}}</td>
                  <td>{{$data->dateofSightation}}</td>
                <td>
                  <a  href="/storage/Assets_Receipts/{{$data->buildingReceipt}}" target="_blank"> <span type="button" 
                   class="fa bi-download btn" style="font-weight:700; font-size:20px; color:blue" >
                   </a>
                  </td>
                <td>
                  <a href="#"><span class="fa bi-pencil-square btn" style="font-weight:700; font-size:20px; color:blue" 
                    data-bs-toggle="modal" data-bs-target="#updateAsset{{$data->id}}">
                  </span>
                  @include('audit.updateAssets')
                  </a>
                </td>
    
                <td>
                      <a href="#"><span class="fa bi-trash fa-wrench btn" style="font-weight:700; font-size:20px; color:red" 
                      data-bs-toggle="modal" data-bs-target="#delete{{$data->id}}"></span></a>
                      @include('audit.deleteAsset')
                      </td>      
                </tr>
                      
                <p class="d-none">{{$n++}} </p> 
              
                    @endforeach  
                  @endif
 {{-- ********************************************************DISPLAY EQUIPMENT ASSETS***************]******************************************************* --}}                       
                    @if ($itemNature=='equipment')
                    <div class="row col-12">
                      <div class="col-4"></div>
                      <div class="col-4 text-center" >
                        <p class="text-center"><h6 style="color:#198754; font-weight:bold"> {{strtoupper($itemNature)}}S PURCHASED</h6></p>
                      </div>
                    <thead>                    
                    <th>SN</th>
                    <th>Name of Equipment</th>
                    <th>Quantity</th>
                    <th>Unit Cost</th>
                    <th>Total Cost</th>
                    <th>Date Purchase</th>
                    <th>Purchased By</th>
                    <th>Designation</th>
                    <th>Staff Number</th>
                    <th>Controlled by</th>
                    <th>In use at</th>
                    <th>Sighted By</th>
                    <th>Designation</th>
                    <th>Date of Sightation</th>
                    <th>Receipt</th>
                    <th>Update</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                      @foreach ($assets as $data)
                      <td>{{$n}}</td>
                      <td>{{$data->equipmentName}}</td>
                      <td>{{$data->quantity}}</td>
                      <td>&#x20A6;{{number_format($data->equipmentUnitCost)}}</td>
                      <td>&#x20A6;{{number_format(($data->equipmentUnitCost) * ($data->quantity))}}</td>
                      <td>{{$data->datePurchased}}</td>
                      <td>{{$data->purchaseBy}}</td>
                      <td>{{$data->designation}}</td>
                      <td>{{$data->staffnumber}}</td>
                      <td>{{$data->controlBy}}</td>
                      <td>{{$data->inUseAt}}</td>

                      <td>{{$data->sightedBy}}</td>
                  <td>{{$data->sighteby_designation}}</td>
                  <td>{{$data->dateofSightation}}</td>>
                      <td>
                        <a  href="/storage/Assets_Receipts/{{$data->equipmentReceipt}}" target="_blank"> <span type="button" 
                         class="fa bi-download btn" style="font-weight:700; font-size:20px; color:blue" >
                         </a>
                        </td>
                      
                      <td>
                        <a href="#"><span class="fa bi-pencil-square btn" style="font-weight:700; font-size:20px; color:blue" 
                          data-bs-toggle="modal" data-bs-target="#updateAsset{{$data->id}}">
                        </span>
                        @include('audit.updateAssets')
                        </a>

                      </td>

                      <td>
                        <a href="#"><span class="fa bi-trash fa-wrench btn" style="font-weight:700; font-size:20px; color:red" 
                        data-bs-toggle="modal" data-bs-target="#delete{{$data->id}}"></span></a>
                        @include('audit.deleteAsset')
                        </td>      
                    </tr>
                        </tbody>
                    <p class="d-none">{{$n++}} </p> 

                      @endforeach  
                    @endif
 {{-- *****************************************************DISPLAY EQUIPMENT ASSETS***************]****************************************************** --}}                    
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


@include('audit.addAsset')


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
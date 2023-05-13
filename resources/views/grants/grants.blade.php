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
      <h4>Grants
        <hr>
      </h4>
      <div class="col-md-4 col-xs-12 col-lg-4">
        
        </div>
        <form method="GET" action="" name="form" >
        @csrf  
        <div class="row col-12">



          <div class=" col-xs-12 col-lg-4 col-md-4 text-left">
            <input type="button" name="" value="Add Grant" class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#addGrant">
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
          <th>Awarding Body</th> 
          <th>Amount</th>
          <th>Awarding Date</th>
          <th>Redemption Date</th>
          <th>Download Award Letter </th>
          <th>Name of PI</th>
          <th>Staff No.of PI</th>
          <th>Co-Investigators</th>
          <th>Processing Fee</th>
          <th>Status</th>
          <th>Update</th>
          <th>Delete</th>
          </thead>

          @if(isset($grants))   
         <p class="d-none">{{$n=1}} </p>

          <tbody>
     @foreach ($grants as $data)
            <td>{{$n}}</td>
            <td>{{$data->awardingBody}}</td>
            <td>&#x20A6;{{formatNumber($data->amount)}}</td>
            <td>{{$data->awardingDate}}</td>
            <td>{{$data->redemptionDate}}</td>
            <td>
              <a  href="/storage/grants/award_letter/{{$data->awardLetter}}" target="_blank"> <span type="button"  class="fa fa-download btn" 
                style="font-weight:700; font-size:20px; color:blue" >
              </a>
            </td>

            <td>{{$data->PIName}}</td>
            <td>{{$data->PIStaffNo}}</td>
            
            <td>
              @php
                  $names = explode(',', $data->coInvestigators);
                  $names = array_map('trim', $names);
                  $names = array_filter($names);
                  $length = count($names);
              @endphp
                <select class="btn btn-sm">
                    <option>View Co-Investigators</option>
                    @foreach ($names as $name)
                    <option>
                      <li>{{ $name }}</li>
                  </option>
                  @endforeach
                </select>
              
          </td>
           
            {{-- COn-Investigators --}}
            <td>{{$data->grantProcessingFee}}</td>
            <td>{{$data->status}}</td>

            
            <td>
              <a href="#"> <span type="button"  class="fa fa-edit btn" style="font-weight:700; font-size:20px; color:blue" data-bs-toggle="modal" data-bs-target="#updateGrant{{$data->id}}"></a>
                @include('grants.updateGrant')
            </td>
            <td></span>
              <a href="#"><span class="fa fa-trash btn" style="font-weight:700; font-size:20px; color:red" data-bs-toggle="modal" data-bs-target="#delete{{$data->id}}"></span>
              </a>
              @include('grants.deleteGrant')
            </td>

            
        </tr>
        <p class="d-none">{{$n++}} </p> 

     @endforeach
          </tbody>
         
          
      </table> 
    
      @include('inc.backtoTop')
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


@include('grants.addGrant')


</body>

<script>
  $(document).ready(function() {
    $("#empTable").dataTable();
    $('.file-upload').file_upload();
  });

  // ADDING CO-INVESTIGATORS TO THE FORM ELEMENT
              /*$(document).ready(function() {
              var count = 1;
              $("#add").click(function() {
                var value = $("#coInvestigators").val()+',';


                if (value !== "") {
                            var investigators= "co_investigators"+count;
                            var newTextbox = $("<input>")
                            .attr("type", "text")
                            .attr("id", investigators)
                            .attr("name", investigators)
                            .val(value);
                            //.css("border-color", "transparent");; 
                            //var emptyPTag = $("<br/>") 
                            

                          $("#investigators").append(newTextbox);
                          alert($("#co_investigators"+count).attr("name"))
                          count++;
                          $("#coInvestigators").val("");
                          var numTextboxes = $("#investigators input[type='text']").length;
                          $("#num").val(numTextboxes);
                          
                }
              });
            */
                //   $("#clear").click(function() {
                //     // Remove all child elements from the #investigators element
                //     $("#investigators").empty();
                    
                //     // Reset the count variable and update the #num hidden input field
                //     count = 1;
                //     $("#num").val(0);
                // });

                // });


</script>
  
<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>

</html>
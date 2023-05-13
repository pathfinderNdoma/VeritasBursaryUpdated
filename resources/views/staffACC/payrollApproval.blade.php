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
    @include('sidebar');
    <!-- //Adding the side bar -->

   

<form name="form" action="{{route('fetchStaffs')}}" enctype="multipart/form-data">
      <div id="content" class="p-4 md-12 ">
      
      @include('inc.messages')
        <div id="alertID"></div> <!-- DIV TO ALERT INFORMATION -->
        <h4 >Payroll Approval<hr></h4>
        <div class="row col-12">
          

          <div class="col-md4 col-xs-12 col-lg-4">
            <select type="text" name="year" id ="year" class="form-control  lineColor" required>
              <option value="">Select Financial Year</option>      
              @foreach ($financial_year as $fyear)
              <option>{{$fyear->year}}</option>
              @endforeach
          </select>
          </div>

          <div class="col-md4 col-xs-12 col-lg-4" id="displaymonth">
            
              <select type="text" name="month" id ="month" class="form-control lineColor" required>
                <option>Select Month</option>
                </select>
          </div>

          <div class="col-md4 col-xs-12 col-lg-4">
          <span style="color: white">' '</span>
          <input type="submit" name="generate" value="Generate" class="btn btn-primary">
          </div>
         

       
         <!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->

<!-- Modal -->
<<div class="modal fade" id="approve" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Payroll Approval</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <div class="modal-body">
        Are you sure you want to approve salary for the selected staffs for march 2023? <br/>
        If this is approved, it cannot be reverted.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

        <input value='Approve' type="button" name="update" id="update" style="color:white" class=" btn btn-primary">
           
      </div>
    </div>
  </div>
</div>

     <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->   
          
          
        </div>

      </form>
      <hr>
      @if(isset($staffs))

      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 text-center"><h5>List of staffs liable for Salary for the month of {{ucfirst($month)}} {{$year}}</h5> </div>

        @if(isset($checkboxControl))
                @if ($checkboxControl !=0 || $checkboxControl !='0')
                <div class="col-lg-4 col-md-12 col-sm-12 text-right"><input type="button" data-bs-toggle="modal" data-bs-target="#approve" value="Approve" 
                  class="btn brn-sm btn-success lineColor" disabled></div>

                </div>   
                @else
                <div class="col-lg-4 col-md-12 col-sm-12 text-right"><input type="button" data-bs-toggle="modal" data-bs-target="#approve" value="Approve" 
                  class="btn brn-sm btn-success lineColor"></div>
                </div>  
                @endif
              
            @endif
          
      @endif

      <br/>
      <p class="d-none">{{$n=1}}</p>
      <table class="table table-striped table-bordered  table-hover" id="empTable" style="color:#000; font-size:13px; text-align:center">
        <thead>
          <th>Sn</th>      
          <th>Staff No.</th> 
          <th>Name</th>
          <th>Grade Level</th>
          <th>Designation</th>
          <th>Department</th>
          <th colspan="1"><span>Approve Salary</span> <br/>
            @if(isset($checkboxControl))
                @if ($checkboxControl !=0 || $checkboxControl !='0')
                <span style="font-size:11px"> <input type="checkbox" id="check-all-checkbox" checked disabled> </span>   
                @else
                <span style="font-size:11px"> <input type="checkbox" id="check-all-checkbox"> </span>  
                @endif
              
            @endif
          </th>
        </thead>
        <tbody>
          @if(isset($staffs))
           
            @foreach ($staffs as $data)
              <tr>
                <td>{{$n}}</td>
                <td>{{$data->staffNo}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->gradeLevel}}</td>
                <td>{{$data->designation}}</td>
                <td>{{$data->department}}</td>

                <td>
                  {{-- <input class="form-check-input" type="checkbox"  name="staffs[]" value="{{$data->staffNo}}" id="flexCheckDefault"> --}}
                  @if ($checkboxControl != 0 || $checkboxControl !='0')
                       
                    {{-- Checking if the staff has been approved for salary --}}
                    @if ($data->hodApproval==1 || $data->hodApproval=='1')
                    <input type="checkbox" name="selected_staffs[]" value="{{ $data->staffNo}}" checked disabled> 
                    @else
                    <input type="checkbox" name="selected_staffs[]" value="{{ $data->staffNo}}" disabled> 
                    @endif
                    {{-- Checking if the staff has been approved for salary --}}
                    
                  @else
                      <input type="checkbox" name="selected_staffs[]" value="{{ $data->staffNo}}">
                  @endif
                  
                </td>

              </tr>
              <?php $n++; ?>
            @endforeach
            
            <input type="text" id="currentMonth" value="{{$month}}" class="d-none">
            <input type="text" id="currentYear" value="{{$year}}" class="d-none">
          @endif
        </tbody>
      </table>
<p></p>
      
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

        // Listen for changes to the select element and fetch months
        $('#year').on('change', function() {
            
            let year  = $(this).val()
            const url = "{{route('fetchmonths')}}";
            $.ajax({
                url: url,
                type: 'GET',
                data: { year: year},
                cache: false,
                success: function(response) { 
                    $('#displaymonth').html(response);
                }
            });

            });

// **********************************************************************************************************************************************************
        $(document).ready(function() {
        
          //when the check all button is clicked, check all the buttons
            $('#check-all-checkbox').click(function() {
           $('input[name="selected_staffs[]"]').prop('checked', this.checked);
            });

          //When the update button is clicked
            $('#update').click(function(e) {
                e.preventDefault();
              
            let selectedStaffIds = [];
                $('input[name="selected_staffs[]"]:checked').each(function() {
                    selectedStaffIds.push($(this).val());
                });

              let month = $('#currentMonth').val();
              let year= $('#currentYear').val();
                  if(month==''||year==''){
                    alert('Kindly select a month or year')
                  }
                      $.ajax({
                          url: '{{ route("approvePayroll") }}',
                          type: 'GET',
                          data: {
                              _token: '{{ csrf_token() }}',
                              selected_staffs: selectedStaffIds,
                              month: month,
                              year:year
                          },
                          success: function(response) {
                              console.log(response);
                              $("#alertID").html('<div id="auto-dismiss-alert" class="alert alert-primary alert-dismissible fade show d-flex align-items-center" role="alert"> \
                                <i class="bi bi-info-circle"></i>\
                            <div> \
                            ' + response.message + ' \
                          </div> \
                          </div>');
                          let month = $('#currentMonth').val();
                          location.reload();



                              // handle success response here
                          },
                          error: function(xhr, status, error) {
                              console.log(xhr.responseText);
                              // handle error response here
                          }
                      });


            });
        });


</script>

<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>
<script>
  setTimeout(function() {
    $("#auto-dismiss-alert").alert('close');
  }, 3000);

  </script>
</html>
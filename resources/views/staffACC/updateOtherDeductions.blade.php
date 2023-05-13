<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->



<script src="js/jquery-3.2.1.js"></script>
<div class="modal fade" id="update{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Update Deduction</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="GET" action="{{route('updateDeductions')}}" enctype="multipart/form-data">
      <div class="modal-body">
          
  <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
          <label for="gradelevel">Financial Year</label> 
          <select type="text" name="update_year" id ="update_year" class=" form-control lineColor" required>
            <option value="{{$data->financial_year}}">{{$data->financial_year}}</option>      
            @foreach ($financial_year as $year)
                <option value="{{$year}}">{{$year}}</option>
            @endforeach
          </select>        
          </div> 



        <div class="col-lg-6 col-md-6 col-xs-12">
        <label for="gradelevel">Department</label> 
        <input type="text" class="form-control lineColor" value="{{$data->department}}"  name="update_department" id="update_department" required readonly> 
        </div> 
    </div>
    <p></p>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
          <label for="gradelevel">Staff No</label> 
          <input type="text" class="form-control lineColor" value="{{$data->staffNo}}"  name="update_staff_no" id="update_staff_no" required readonly>         
          </div> 


        <div class="col-lg-6 col-md-6 col-xs-12">
        <label for="basicSalary">Name</label>
        <input type="text" class="form-control lineColor" value="{{$data->name}}"  name="update_staffName" id="update_staffName" required readonly>
        </div> 
    </div>
    <p></p>
  <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12" id="update_displayDesignation">
        <label for="allowance">Designation</label>
        <input type="text" class="form-control lineColor" value="{{$data->designation}}"  name="update_designation" id="update_designation" required >
        </div> 
 

  


        <div class="col-lg-6 col-md-6 col-xs-12">
        <label for="tax">Deductions</label>
        <select class="form-control lineColor" name="update_deduction" id="update_deduction" required>

          @if($data->nhia !='' || $data->nhia != null)
          <option value="nhia">NHIA</option>
          <option value="nhf">NHF</option>
          <option value="university_loan">University Loan</option>
          <option value="cooperative_loan">Co-operative Loan</option>
          <option value="commodity_loan">Commodity Loan</option>
          <option value="cooperative_contribution">Co-operative Contribution</option>
          <option value="school_fees">School Fees</option>
          @endif

          @if($data->nhf !='' || $data->nhf != null)
          <option value="nhf">NHF</option>
          <option value="nhia">NHIA</option>
          <option value="university_loan">University Loan</option>
          <option value="cooperative_loan">Co-operative Loan</option>
          <option value="commodity_loan">Commodity Loan</option>
          <option value="cooperative_contribution">Co-operative Contribution</option>
          <option value="school_fees">School Fees</option>
          @endif

          @if($data->university_loan !='' || $data->university_loan != null)
          <option  value="university_loan">>University Loan</option>
          <option value="nhia">NHIA</option>
          <option value="nhf">NHF</option>
          <option value="cooperative_loan">Co-operative Loan</option>
          <option value="commodity_loan">Commodity Loan</option>
          <option value="cooperative_contribution">Co-operative Contribution</option>
          <option value="school_fees">School Fees</option>
          @endif

          @if($data->cooperative_loan !='' || $data->cooperative_loan != null)
          <option value="cooperative_loan">Co-operative Loan</option>
          <option value="nhia">NHIA</option>
          <option value="nhf">NHF</option>
          <option value="university_loan">University Loan</option>
          <option value="commodity_loan">Commodity Loan</option>
          <option value="cooperative_contribution">Co-operative Contribution</option>
          <option value="school_fees">School Fees</option>
          @endif

          @if($data->commodity_loan!='' || $data->commodity_loan != null)
          <option value="commodity_loan">Commodity Loan</option>
          <option value="nhia">NHIA</option>
          <option value="nhf">NHF</option>
          <option value="university_loan">University Loan</option>
          <option value="cooperative_loan">Co-operative Loan</option>
          <option value="cooperative_contribution">Co-operative Contribution</option>
          <option value="school_fees">School Fees</option>
          @endif

          @if($data->cooperative_contribution !='' || $data->cooperative_contribution != null)
          <option value="cooperative_contribution">Co-operative Contribution</option>
          <option value="nhia">NHIA</option>
          <option value="nhf">NHF</option>
          <option value="university_loan">University Loan</option>
          <option value="cooperative_loan">Co-operative Loan</option>
          <option value="commodity_loan">Commodity Loan</option>
          <option value="school_fees">School Fees</option>
          @endif

          @if($data->school_fees !='' || $data->school_fees != null)
          <option value="school_fees">School Fees</option>
          <option value="nhia">NHIA</option>
          <option value="nhf">NHF</option>
          <option value="university_loan">University Loan</option>
          <option value="cooperative_loan">Co-operative Loan</option>
          <option value="commodity_loan">Commodity Loan</option>
          <option value="cooperative_contribution">Co-operative Contribution</option>
          @endif
        </select>
        </div> 
 </div>
 <p></p>
 <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12" id="update_displayDesignation">
          <label for="allowance">Amount</label>
          <input type="number" class="form-control lineColor" value="{{$data->amount}}" name="update_amount" required>
          </div> 

 

        <div class="col-lg-6 col-md-6 col-xs-12">
        <label for="from">Start Date</label>
        <input type="date" class="form-control lineColor" aria-label="" value="{{$data->startDate}}" name="update_startDate" required>
        </div> 
    </div>
    <p></p>

  <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
        <label for="endDate">End Date <span style="color:red; font:italic">Leave this field blank if there is no end date</span></label>
        <input type="date" class="form-control lineColor"  aria-label="to" value="{{$data->endDate}}" name="update_endDate">
        </div> 


        <div class="col-lg-6 col-md-6 col-xs-12">
          <label for="number of months">Number of Months</label>
          <input type="text" class="form-control lineColor"  aria-label="to" value="{{$data->duration}}" name="update_numberMonths" required>
          </div> 
        </div> 

        <div class="col-lg-6 col-md-6 col-xs-12 d-none">
          <label for="id">ID</label>
          <input type="text" class="form-control lineColor"  aria-label="to" value="{{$data->id}}" name="update_id" required>
          </div> 
        </div> 

<p></p>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="submit" value="Submit" class="btn btn-outline-success">
      </form>
      </div>
    </div>
  </div>
</div>
</form>

  <script>
$(document).ready(function () {

// Listen for changes to the department and fetch staffs
    $('#update_department').on('change', function() {
      let update_department  = $(this).val()
      $.ajax({
              url: '{{ route("deductionstaffs") }}',
              type: 'GET',
              data: {
                  _token: '{{ csrf_token() }}',
                  department: update_department,
                  requestType:'update'
              },
              success: function(response) {
                  console.log(response);

                  $('#update_displaystaffNo').html(response.staffs);
              //Listen for changes to the staffs and fetch staffs details

                            $('#update_staffNo').on('change', function() {
                              
                                let staffNo = $("#staffNo").val()
                                $.ajax({
                                        url: '{{ route("staffDetails") }}',
                                        type: 'GET',
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            staffNo: staffNo,
                                            
                                        },
                                        success: function(response) {
                                        let jsonData = response[0]; 
                                        $('#update_staffName').val(jsonData.fname+' ' + jsonData.oname + '' + jsonData.lname);
                                        $('#update_designation').val(jsonData.designation);
                                        $('#update_staff_no').val(jsonData.staffNo);
                                            
                                        },
                                        error: function(xhr, status, error) {
                                            console.log(xhr.responseText);
                                            // handle error response here
                                        }
                                    });
                                });

          },
          error: function(xhr, status, error) {
              console.log(xhr.responseText);
              // handle error response here
          }
      });
  });
    
  });
  </script>
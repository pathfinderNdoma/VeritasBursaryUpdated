<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="addDeduction" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Add Deduction</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="GET" action="{{route('addDeductions')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="gradelevel">Financial Year</label> 
            <select type="text" name="year" id ="year" class=" form-control lineColor" required>
              <option value="">--Select Year--</option>      
              @foreach ($financial_year as $year)
                  <option value="{{$year}}">{{$year}}</option>
              @endforeach
            </select>        
            </div> 
            <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="gradelevel">Department</label> 
          <select class="form-control lineColor" name="department" id="department">
            <option value="">--Select Department--</option>
            @foreach ($department as $data)
            <option>{{$data->department}}</option>
            @endforeach
          </select>         
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12" id="displaystaffNo">
            <label for="gradelevel">Staff No</label> 
            <select class="form-control lineColor">
              <option value="" id="staffNoshow">--Select-</option>
            </select>         
            </div> 
            <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="basicSalary">Name</label>
          <input type="text" class="form-control lineColor" value=""  name="staffName" id="staffName" required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12" id="displayDesignation">
          <label for="allowance">Designation</label>
          <input type="text" class="form-control lineColor" name="designation" id="designation" required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12 d-none">
            <label for="allowance">StaffNo</label>
            <input type="text" class="form-control lineColor" name="staff_no" id="staff_no" required>
            </div> 
            <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="tax">Deductions</label>
          <select class="form-control lineColor" name="deduction" id="deduction" required>
            <option value="">--Select Deductions--</option>
            <option value="nhia">NHIA</option>
            <option value="nhf">NHF</option>
            <option value="university_loan">University Loan</option>
            <option value="cooperative_loan">Co-operative Loan</option>
            <option value="commodity_loan">Commodity Loan</option>
            <option value="cooperative_contribution">Co-operative Contribution</option>
            <option value="school_fees">School Fees</option>
          </select>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12" id="displayDesignation">
            <label for="allowance">Amount</label>
            <input type="number" class="form-control lineColor" name="amount" required>
            </div> 
            <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="from">From:Start Date</label>
          <input type="date" class="form-control lineColor" aria-label="" name="startDate" required>
          </div> 
          <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="pension">End Date <span style="color:red; font:italic">Leave this field blank if there is no end date</span></label>
          <input type="date" class="form-control lineColor"  aria-label="to" name="endDate">
          </div> 
          <p></p>

            <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="pension">Number of Months</label>
            <input type="text" class="form-control lineColor"  aria-label="to" name="numberMonths" required>
            </div> 
            <p></p>

     

  </div>

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
      $('#department').on('change', function() {
        let department  = $(this).val()
      
        $.ajax({
                url: '{{ route("deductionstaffs") }}',
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}',
                    department: department,
                    requestType:'new'
                },
                success: function(response) {
                    console.log(response);

                    $('#displaystaffNo').html(response.staffs);
                //Listen for changes to the staffs and fetch staffs details

                              $('#staffNo').on('change', function() {
                                
                                  let staffNo = $("#staffNo").val()
                                  $.ajax({
                                          url: '{{ route("staffDetails") }}',
                                          type: 'GET',
                                          data: {
                                              _token: '{{ csrf_token() }}',
                                              staffNo: staffNo
                                          },
                                          success: function(response) {
                                          let jsonData = response[0]; 
                                          $('#staffName').val(jsonData.fname+' ' + jsonData.oname + '' + jsonData.lname);
                                          $('#designation').val(jsonData.designation);
                                          $('#staff_no').val(jsonData.staffNo);
                                              
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
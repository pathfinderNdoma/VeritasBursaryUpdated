<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="addFinancialYear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Add Financial Year</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="GET" action="{{route('addFinancialYear')}}" enctype="multipart/form-data">
      <div class="modal-body">
          
                <div class="col-lg-12 col-md-12 col-xs-12">
                  <label for="financialYear" style="color:#198754; font-weight:bold">Enter Financial Year</label>
                  <input type="text" name="year" id="year" class="form-control lineColor"  required />
                </div>
                <p></p>
            
              <div class="col-lg-12 col-md-12 col-xs-12">
                <label for="startDate" style="color:#198754; font-weight:bold">Start Date</label>
                <input type="date" name="startDate" id="startDate" class="form-control lineColor"  required />
              </div>
              <p></p>

              <div class="col-lg-12 col-md-12 col-xs-12">
                <label for="endDate"style="color:#198754; font-weight:bold">End Date</label>
                <input type="date" name="endDate" id="endDate" class="form-control lineColor"  required/>
              </div>

              <div class="col-lg-12 col-md-12 col-xs-12">
                <label for="endDate"style="color:#198754; font-weight:bold">Set Status</label>
                <select class="form-control lineColor" name="status">
                  <option value="">--Select Status--</option>
                  <option>active</option>
                  <option>inactive</option>
                </select>
              </div>
            
        @csrf 


    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      <input type="submit" value="Add" class="btn btn-primary">

    </div>

      </div>
    </div>
          </div>
        </div>
      </div>
    </form>


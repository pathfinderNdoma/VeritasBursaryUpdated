<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="updateFinancialYear{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Update Financial Year</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="GET" action="{{route('updateFinancialYear')}}" enctype="multipart/form-data">
      <div class="modal-body">
          
                <div class="col-lg-12 col-md-12 col-xs-12">
                  <label for="financialYear" style="color:#198754; font-weight:bold">Enter Financial Year</label>
                  <input type="text" name="update_year" id="update_year" class="form-control lineColor" value="{{$data->year}}"  required />
                </div>
                <p></p>
            
              <div class="col-lg-12 col-md-12 col-xs-12">
                <label for="startDate" style="color:#198754; font-weight:bold">Start Date</label>
                <input type="date" name="update_startDate" id="update_startDate" class="form-control lineColor" value="{{$data->startDate}}"  required />
              </div>
              <p></p>

              <div class="col-lg-12 col-md-12 col-xs-12">
                <label for="endDate"style="color:#198754; font-weight:bold">End Date</label>
                <input type="date" name="update_endDate" id="update_endDate" class="form-control lineColor" value="{{$data->endDate}}"  required/>
              </div>

              <div class="col-lg-12 col-md-12 col-xs-12">
                <label for="endDate"style="color:#198754; font-weight:bold">Set Status</label>
                <select class="form-control lineColor" name="update_status">
                  <option value="{{$data->status}}">{{ucfirst($data->status)}}</option>
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                </select>
              </div>

              <div class="col-lg-12 col-md-12 col-xs-12 d-none">
                <label for="endDate"style="color:#198754; font-weight:bold">ID</label>
                <input type="text" name="update_id" id="update_id" class="form-control lineColor" value="{{$data->id}}"  required/>
              </div>
            
        @csrf 


    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      <input type="submit" value="Update" class="btn btn-primary">

    </div>

      </div>
    </div>
          </div>
        </div>
      </div>
    </form>


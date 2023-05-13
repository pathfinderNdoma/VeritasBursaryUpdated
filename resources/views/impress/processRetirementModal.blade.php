<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




  <div class="modal fade" id="processmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
            <h5 class="modal-title" id="modalLabel" style="color:white">Process Retirement</h5>
            <h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4>

          </div>
          <form name="form" method="POST" action="{{route('processsRetirement')}}" enctype="multipart/form-data">
          <div class="modal-body">
              
              
            <div class="col-lg-12 col-md-12 col-xs-12">
              <input type="text" value="{{$data->id}}" name="del_ids" class="d-none">
          </div> 
          
          <div class="col-lg-12 col-md-12 col-xs-12">
            <input type="text" value="{{$data->financial_year}}" name="del_financial_year" class="d-none">
          </div> 

              <div class="col-lg-12 col-md-12 col-xs-12">
                <input type="text" value="{{$data->department}}" name="del_department" class="d-none">
              </div> 




           <div class="col-lg-12 col-md-12 col-xs-12">
              <label for="basicSalary">Action</label>
              <select type="text" name="del_status" id="del_status" class="form-control lineColor" >
                <option>Select</option>
                <option value="Approved">Approve</option>
                <option value="Declined">Decline</option>
              </select>
          </div>  
      <p></p>
      
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Message</label>
            <textarea name="del_message" class="form-control lineColor" rows="5" cols="5"></textarea>
        </div> 
      @csrf 
 
    </div>
  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <input type="submit" value="Add" class="btn btn-primary">
          </form>
          </div>
        </div>
      </div>
    </div>
  </form>
  
      

           <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
  
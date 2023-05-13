<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="contractStatus{{$data->contractID}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Change Contract Status</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('editContractStatus')}}" enctype="multipart/form-data">
        <div class="modal-body">
            

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Contract Status</label>
            <select type="text" name="status" id ="status" class=" form-control lineColor">
              <option value=" ">--Select Status--</option>
              <option value="Open">Open</option>
              <option value="Close">Close</option>
            </select>
          </div> 
        <p></p>
          {{-- ************************************************************************************************* --}}
          <input type="text" value="{{$data->contractID}}" name="contractID" id="contractID" >
          <input type="text" value="{{$data->financial_year}}" name="fyear" id="fyear" class="d-none">

    
    @csrf 

  </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <input type="submit" value="Submit" class="btn btn-primary">
        </form>
        </div>
      </div>
    </div>
  </div>
</form>

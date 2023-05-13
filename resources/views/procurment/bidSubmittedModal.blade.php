<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="actionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Submitted Bid</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('bidsubmittedaction')}}" enctype="multipart/form-data">
        <div class="modal-body">
            

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Action</label>
            <select type="text" name="stats" id ="stats" class=" form-control lineColor">
              <option value=" ">--Select Action--</option>
              <option value="Approve">Approve Bid</option>
              <option value="Decline">Decline Bid</option>
            </select>
          </div> 
        <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="Contract">Message</label>
            <textarea name="message" id="message" class="form-control lineColor" rows="3" cols="4"></textarea>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="Contract">Upload Contract Letter</label>
           <input type="file" name="contract_letter" id="contract_letter" class="form-control lineColor d-none">
          </div> 
          <p></p>

     {{-- **************************************************************************** --}}   
          <div class="d-none">
            <div class="col-lg-12 col-md-12 col-xs-12">
              <input type="text" name="contractorID" id="contractorID" value="{{$data->contractorID}}">
            </div> 
            <p></p>     
            <div class="col-lg-12 col-md-12 col-xs-12">
              <input type="text" name="contractID" id="contractID" value="{{$data->contractID}}">
            </div> 
            <p></p>                    
          </div>
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

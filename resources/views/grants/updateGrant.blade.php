<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="updateGrant{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Update Grant</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('updateGrant')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="awardingBody">Awarding Body</label>
            <input type="text" name="update_awardingBody" id="update_awardingBody" class="form-control lineColor" value="{{$data->awardingBody}}" required>
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="amount">Amount</label>
            <input type="number" name="update_amount" id="update_amount" class="form-control lineColor" value="{{$data->amount}}"  required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="awardingDate">Awarding Date</label>
            <input type="date" name="update_awardingDate" id="update_awardingDate" class="form-control lineColor" value="{{$data->awardingDate}}"  required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="awardLetter">Award Letter</label>
            <input type="file" name="update_awardLetter" id="update_awardLetter" class="form-control lineColor" value="{{$data->awardLetter}}">
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12 d-none">
            <label for="awardLetter">Award Letter Val</label>
            <input type="text" name="update_awardLetterVal" id="update_awardLetterVal" class="form-control lineColor" value="{{$data->awardLetter}}">
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12 d-none">
            <label for="id">ID</label>
            <input type="text" name="update_ID" id="update_ID" class="form-control lineColor" value="{{$data->id}}">
          </div> 
          <p></p>


        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="PIName">Name of PI</label>
          <input type="text" name="update_PIName" id="update_PIName" class="form-control lineColor" value="{{$data->PIName}}"  required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="PIStaffNo">Staff Number of PI</label>
          <input type="text" name="update_PIStaffNo" id="update_PIStaffNo" class="form-control lineColor" value="{{$data->PIStaffNo}}"  required>
        </div> 
        <p></p>

            
        <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="coInvestigators" style="color:red">Add Co-Investigators separated by comma(,)</label>
            <input type="text" name="update_coInvestigators" id="update_coInvestigators"
            value="{{$data->coInvestigators}}" class="form-control lineColor">
        </div>
        <p></p>


                          {{-- <div class="" id="investigators"></div>  

                          <div class="col-lg-12 col-md-12 col-xs-12">
                          <input type="button" name="add" id="add" class="btn btn-primary lineColor" value="Add Investigator">
                          <span><input type="button" name="clear" id="clear" class="btn btn-outline-danger lineColor" value="Clear"></span>
                          </div>
                        <p></p>
                          
                        <div class="col-lg-12 col-md-12 col-xs-12">
                          <label for="awardingBody">No. of Co-Investigators</label>
                          <input type="text" name="num" id="num" class="form-control lineColor" value="" required>
                        </div> 
                        <p></p>  --}}

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="redemptionDate">Redemption Date</label>
          <input type="date" name="update_redemptionDate" id="update_redemptionDate" class="form-control lineColor" value="{{$data->redemptionDate}}"  required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="processingFee">Grant Processing Fee</label>
          <input type="text" name="update_processingFee" id="update_processingFee" class="form-control lineColor" value="{{$data->grantProcessingFee}}"  required>
        </div> 
        <p></p>


        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="status">Status</label>
          <select name="update_status" id="update_status" class="form-control lineColor">
            <option>{{$data->status}} </option>
            <option>Ongoing</option>
            <option>Completed</option>
          </select>
        </div> 
        <p></p>


        
    @csrf 

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

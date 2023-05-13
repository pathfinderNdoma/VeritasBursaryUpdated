<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="addGrant" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Add Grant</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('addGrant')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="awardingBody">Awarding Body</label>
            <input type="text" name="awardingBody" id="awardingBody" class="form-control lineColor" required>
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control lineColor"  required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="awardingDate">Awarding Date</label>
            <input type="date" name="awardingDate" id="awardingDate" class="form-control lineColor"  required>
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="awardLetter">Award Letter</label>
            <input type="file" name="awardLetter" id="awardLetter" class="form-control lineColor"  required>
          </div> 
          <p></p>


        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="PIName">Name of PI</label>
          <input type="text" name="PIName" id="PIName" class="form-control lineColor"  required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="PIStaffNo">Staff Number of PI</label>
          <input type="text" name="PIStaffNo" id="PIStaffNo" class="form-control lineColor"  required>
        </div> 
        <p></p>

            
        <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="coInvestigators" style="color:red">Add Co-Investigators separated by comma(,)</label>
            <input type="text" name="coInvestigators" id="coInvestigators"
            placeholder="Enter Co-Investigators name separated by commma,"
            value="" class="form-control lineColor">
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
          <input type="date" name="redemptionDate" id="redemptionDate" class="form-control lineColor"  required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="processingFee">Grant Processing Fee</label>
          <input type="text" name="processingFee" id="processingFee" class="form-control lineColor"  required>
        </div> 
        <p></p>


        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="status">Status</label>
          <select name="status" id="status" class="form-control lineColor">
            <option>--Select Grant Status--</option>
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

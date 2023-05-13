<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="updatescholarship{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Update Scholarship</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('updateScholarship')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="name">Student Name</label>
            <input type="text" name="update_name" id="update_name" class="form-control lineColor" value="{{$data->studentName}}" required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="matricNo">Matric No</label>
            <input type="text" name="update_matricNo" id="update_matricNo" class="form-control lineColor" value="{{$data->matricNo}}"  required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="department">Department</label>
            <input type="text" name="update_department" id="update_department" class="form-control lineColor" value="{{$data->department}}"  required>
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="amount">Amount</label>
            <input type="number" name="update_amount" id="update_amount" class="form-control lineColor" value="{{$data->amount}}""  required>
          </div> 
          <p></p>


        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="awardDate">Award Date</label>
          <input type="date" name="update_awardDate" id="update_awardDate" class="form-control lineColor" value="{{$data->awardDate}}">
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="awardLetter">Upload Award Letter</label>
          <input type="file" name="update_awardLetter" id="update_awardLetter" class="form-control lineColor">
        </div> 
        <p></p>


        <div class="col-lg-12 col-md-12 col-xs-12 d-none">
          <label for="awardLetter">Award Letter</label>
          <input type="text" name="wardLetterVal" id="wardLetterVal" class="form-control lineColor d-none" value="{{$data->award_letter}}">
        </div> 
        <p></p>

         <div class="col-lg-12 col-md-12 col-xs-12 d-none">
          <label for="awardLetter">ID</label>
          <input type="text" name="update_ID" id="update_ID" class="form-control lineColor " value="{{$data->id}}">
        </div> 
        <p></p>
      
    @csrf 

  </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <input type="submit" valuee="Submit" class="btn btn-outline-success">
        </form>
        </div>
      </div>
    </div>
  </div>
</form>

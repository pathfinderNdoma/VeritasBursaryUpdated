<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="addscholarship" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Add Scholarship</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('addScholarship')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="name">Student Name</label>
            <input type="text" name="name" id="name" class="form-control lineColor" required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="matricNo">Matric No</label>
            <input type="text" name="matricNo" id="matricNo" class="form-control lineColor"  required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="department">Department</label>
            <input type="text" name="department" id="department" class="form-control lineColor"  required>
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control lineColor"  required>
          </div> 
          <p></p>


        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="awardDate">Award Date</label>
          <input type="date" name="awardDate" id="awardDate" class="form-control lineColor"  required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="awardLetter">Upload Award Letter</label>
          <input type="file" name="awardLetter" id="awardLetter" class="form-control lineColor"  required>
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

<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="addventures" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Add Enterprise</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="GET" action="{{route('addVenture')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="property_name">Business Name</label>
            <input type="text" name="businessName" id="businessName" class="form-control lineColor" required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="property_location">Property Location</label>
            <input type="text" name="business_location" id="business_location" class="form-control lineColor"  required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="description">Director</label>
            <input type="text" name="director" id="director" class="form-control lineColor"  required>
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="amount">Running Capital</label>
            <input type="number" name="runingCapital" id="runningCapital" class="form-control lineColor"  required>
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

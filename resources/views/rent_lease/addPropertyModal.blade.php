<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="addProperty" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Add Property</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('addProperty')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="property_name">Property Name</label>
            <input type="text" name="property_name" id="property_name" class="form-control lineColor ">
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="property_location">Property Location</label>
            <input type="text" name="property_location" id="property_location" class="form-control lineColor ">
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control lineColor ">
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control lineColor ">
          </div> 
          <p></p>




          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="usage">Usage</label>
            <select type="text" name="usage" id ="usage" class=" form-control lineColor">
              <option value=" ">--Select--</option>
              <option value="rent">Rent</option>
              <option value="lease">Lease</option>
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

<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="updateAssignProperty{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Update Assigned Property</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('updateAssignProperty')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="property_name">Property Name</label>
            <input type="text" name="updateProperty_Name" id="updateProperty_Name" value="{{$data->property_name}}" class="form-control lineColor ">
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="property_location">Property Location</label>
            <input type="text" name="updatePropertyLocation" id="updatePropertyLocation" value="{{$data->property_location}}" class="form-control lineColor ">
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="description">Description</label>
            <input type="text" name="updateDescript" id="updateDescript" value="{{$data->description}}" class="form-control lineColor ">
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="amount">Amount</label>
            <input type="number" name="updatePropertyAmount" id="updatePropertyAmount" value="{{$data->amount}}" class="form-control lineColor ">
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="amount">Start Date</label>
            <input type="date" name="updateStartDate" id="updateStartDate" value="{{$data->start_date}}" class="form-control lineColor ">
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="amount">End Date</label>
            <input type="date" name="updateEndDate" id="updateEndDate" value="{{$data->end_date}}" class="form-control lineColor ">
          </div> 
          <p></p>




          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="usage">Usage</label>
            <select type="text" name="updatePropertyUsage" id ="updatePropertyUsage" class=" form-control lineColor">
              <option value="{{$data->usage}}">--Select--</option>
              <option value="rent">Rent</option>
              <option value="lease">Lease</option>
            </select>
          </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="usage">Upload Receipt</label>
          <input type="file" name="update_receipt" id="update_receipt" class="form-control lineColor ">
        </div> 
      <p></p>

     
        <div class="col-lg-12 col-md-12 col-xs-12">
          
          <input type="text" name="id" id="id" value="{{$data->id}}" class="form-control lineColor d-none ">
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

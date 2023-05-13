
  @csrf 
  <div class="modal fade" id="updateConsumeables{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Update Asset</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="GET" action="{{route('updateConsumeables')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
              
          <div class="row col-12">  
            <div class="col-lg-12 col-md-13 col-xs-12">
              <label for="sightedBy" style="color:#198754; font-weight:bold">Sighted By</label>
              <input type="text" name="sightedBy" id="sightedBy" class="form-control lineColor" value="{{$data->sightedby}}" required />
            </div>
        </div><p></p>

          <div class="row col-12">  
            <div class="col-lg-12 col-md-13 col-xs-12">
              <label for="sighteby_designation" style="color:#198754; font-weight:bold">Designation</label>
              <input type="text" name="sightedByDesignation" id="sightedByDesignation" class="form-control lineColor" value="{{$data->sightedByDesignation}}" required />
            </div>
        </div><p></p>


        <div class="row col-12">  
          <div class="col-lg-12 col-md-13 col-xs-12">
            <label for="dateofSightation" style="color:#198754; font-weight:bold">Date of Sightation</label>
            <input type="date" name="dateofSightation" id="dateofSightation" class="form-control lineColor" value="{{$data->dateofSightation}}" required />
          </div>
        </div><p></p>

        <div class="row col-12">  
          <div class="col-lg-12 col-md-13 col-xs-12 d-none">
            <label for="dateofSightation" style="color:#198754; font-weight:bold">ID</label>
            <input type="text" name="update_id" id="update_id" class="form-control lineColor" value="{{$data->id}}" required />
          </div>
        </div><p></p>

        <div class="row col-12">  
          <div class="col-lg-12 col-md-13 col-xs-12 d-none">
            <label for="dateofSightation" style="color:#198754; font-weight:bold">Date Purchase</label>
            <input type="text" name="year" id="year" class="form-control lineColor" value="{{$data->datePurchased}}" required />
          </div>
        </div><p></p>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="submit" value="Update" class="btn btn-primary">
      
      </div>
    </div>
  </div>
</div>
</form>

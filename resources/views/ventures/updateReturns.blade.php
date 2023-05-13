<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="updatReturns{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Update Returns</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="GET" action="{{route('updateReturns')}}" enctype="multipart/form-data">
      <div class="modal-body">
          
        <div class=" col-xs-12 col-lg-12 col-md-12">
        <label for="property_location">Financial year</label>
        <select type="text" name="update_fyear" id ="update_fyear" class=" form-control lineColor">
          <option>Select Financial Year</option>      
          @foreach ($financial_year as $fyear)
          <option>{{$fyear}}</option>
          @endforeach
      </select>
      </div>
      <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="property_location">Profit</label>
          <input type="number" name="update_profit" id="profit" class="form-control lineColor" value="{{$data->profit}}">
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="property_location">Returns</label>
          <input type="number" name="update_returns" id="returns" class="form-control lineColor" value="{{$data->returns}}" required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="property_location">Upload Receipt</label>
          <input type="file" name="update_receipt" id="receipt" class="form-control lineColor">
        </div> 
        <p></p> 

        <div class="col-lg-12 col-md-12 col-xs-12">
          <input type="text" name="update_receiptID" id="update_receiptID" class="form-control lineColor d-none" value="{{$data->receiptID}}" required>
        </div> 
        <p></p> 

        <div class="col-lg-12 col-md-12 col-xs-12">
          <input type="text" name="initial_runningCapital" id="receipt" class="form-control lineColor d-none" value="{{$data->initial_runnningCapital}}">
        </div> 
        <p></p>
   

        <div class="col-lg-12 col-md-12 col-xs-12">
          <input type="text" name="id" id="id" class="form-control lineColor d-none" value="{{$data->id}}">
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

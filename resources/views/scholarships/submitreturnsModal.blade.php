<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="submitreturns" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Submit Returns</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="POST" action="{{route('submitReturns')}}" enctype="multipart/form-data">
      <div class="modal-body">
          
        <div class=" col-xs-12 col-lg-12 col-md-12">
          <label for="property_location">Name of Ventures</label>
          <select name="ventureID" id ="ventureID" class=" form-control lineColor">
            <option value="">--Select--</option>
            @foreach ($ventures as $item)
            <option value="{{$item->id}}">{{$item->businessName}}</option> 
            @endforeach
          </select>
        </div>
        <p></p>
    


        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="property_location">Profit</label>
          <input type="text" name="profit" id="profit" class="form-control lineColor" required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="property_location">Returns</label>
          <input type="number" name="returns" id="returns" class="form-control lineColor" required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="property_location">Upload Receipt</label>
          <input type="file" name="receipt" id="receipt" class="form-control lineColor" required>
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

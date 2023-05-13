<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="updatePurchase{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Add Direct Purchase</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="POST" action="{{route('updateDirectPurchase')}}" enctype="multipart/form-data">
      <div class="modal-body">


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="">Name of Item</label>
            <input type="text" name="update_itemName" id="update_itemName" class="form-control lineColor" value="{{$data->itemName}}" required/>
          </div>

          <p></p>
      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="">Nature of Item</label>
        <select  name="update_itemNature" id ="update_itemNature" class=" form-control lineColor" required>
          <option>{{$data->itemNature}}</option> 
          <option>Asset</option> 
          <option>Consumeable</option>      
      </select>
    </div> 

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="">Quantity</label>
            <input type="number" name="update_quantity" id="update_quantity" class="form-control lineColor" value="{{$data->quantity}}" required/>
          </div><p></p> 

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="">Unit Price</label>
            <input type="number" name="update_unitPrice" id="update_unitPrice" class="form-control lineColor" value="{{$data->unitPrice}}" required/>
          </div><p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="">Date Purchased</label>
            <input type="date" name="update_datePurchased" id="update_datePurchased" class="form-control lineColor" value="{{$data->datePurchased}}" required/>
          </div><p></p> 

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="purchaseBy">Purchase By</label>
            <input type="text" name="update_purchaseBy" id="update_purchaseBy" class="form-control lineColor" value="{{$data->purchaseBy}}" required/>
          </div><p></p> 

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Staff  Number</label>
            <input type="text" name="update_staffNumber" id="update_staffNumber" class="form-control lineColor" value="{{$data->staffNumber}}" required/>
          </div><p></p>  

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Designation</label>
            <input type="text" name="update_designation" id="update_designation" class="form-control lineColor" value="{{$data->designation}}" required/>
          </div><p></p> 

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Upload Receipt</label>
            <input type="file" name="update_receipt" id="update_receipt" class="form-control lineColor" value="{{$data->receipt}}"/>
          </div> 

          <div class="col-lg-12 col-md-12 col-xs-12 d-none">
            <label for="basicSalary">Upload Receipt Val</label>
            <input type="text" name="update_receiptVal" id="update_receiptVal" class="form-control lineColor" value="{{$data->receipt}}" required/>
          </div> 

          <div class="col-lg-12 col-md-12 col-xs-12 d-none">
            <label for="basicSalary">ID</label>
            <input type="text" name="update_id" id="update_id" class="form-control lineColor" value="{{$data->id}}" required/>
          </div> 



    <p></p>

  @csrf 

</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="submit" value="Update" class="btn btn-primary">
      </form>
      </div>
    </div>
  </div>
</div>
</form>



       <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
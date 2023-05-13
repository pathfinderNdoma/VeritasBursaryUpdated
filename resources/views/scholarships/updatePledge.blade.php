<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="updatePledge{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Update Pledge</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="POST" action="{{route('updatePledge')}}" enctype="multipart/form-data">
      <div class="modal-body">
          
        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="donor">Donor</label>
          <input type="text" name="update_donor" id="update_donor" class="form-control lineColor" value="{{$data->donor}}" required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="address">Address</label>
          <input type="text" name="update_address" id="update_addres" class="form-control lineColor" value="{{$data->address}}"  required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="email">Email</label>
          <input type="email" name="update_email" id="update_email" class="form-control lineColor" value="{{$data->email}}"  required>
        </div> 
        <p></p>


        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="contact_number">Contact Number</label>
          <input type="phone" name="update_contact_no" id="update_contact_no" class="form-control lineColor" value="{{$data->contact_no}}"  required>
        </div> 
        <p></p>


      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="amount_item">Amount/Item</label>
        <input type="number" name="update_amount_item" id="update_amount_item" class="form-control lineColor" value="{{$data->amount_item}}"  required>
      </div> 
      <p></p>

      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="Purpose_of_donation">Purpose</label>
        <input type="text" name="update_purpose" id="update_purpose" class="form-control lineColor" value="{{$data->purpose}}"  required>
      </div> 
      <p></p>


      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="pledge_date">Pledge date</label>
        <input type="date" name="update_pledgeDate" id="update_pledgeDate" class="form-control lineColor">
      </div> 
      <p></p>

      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="redemptionDate">Redemption Date</label>
        <input type="date" name="update_redemptionDate" id="update_redemptionDate" class="form-control lineColor">
      </div> 
      <p></p>

      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="Pledge Note">Pledge Note</label>
        <input type="file" name="update_pledgeNote" id="update_pledgeNote" class="form-control lineColor">
      </div> 
      <p></p>


      <div class="col-lg-12 col-md-12 col-xs-12 d-none">
        <label for="Pledge Note">ID</label>
        <input type="text" name="update_id" id="update_id" class="form-control lineColor" value="{{$data->id}}">
      </div> 
      <p></p>

      <div class="col-lg-12 col-md-12 col-xs-12 d-none">
        <label for="Pledge Note">paymentReceiptVal</label>
        <input type="text" name="paymentReceiptVal" id="paymentReceiptVal" class="form-control lineColor" value="{{$data->paymentReceipt}}">
      </div> 
      <p></p>

      <div class="col-lg-12 col-md-12 col-xs-12 d-none">
        <label for="Pledge Note">pledgeNoteVal</label>
        <input type="text" name="pledgeNoteVal" id="pledgeNoteVal" class="form-control lineColor" value="{{$data->pledgeNote}}">
      </div> 
      <p></p>


      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="Pledge Status">Pledge Status</label>
        <select name="update_pledge_status" id="update_pledge_status" class="form-control lineColor">
          <option>{{$data->pledgeStatus}}"</option>
          <option>Redeemed</option>
          <option>Not Redeemed</option>
        </select>
      </div> 
      <p></p>



      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="payment_receipt">Upload payment receipt</label>
        <input type="file" name="update_payment_receipt" id="update_payment_receipt" class="form-control lineColor">
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


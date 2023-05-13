<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="addDonations" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Add New Donation</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('addDonations')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="donor">Donor</label>
            <input type="text" name="donor" id="donor" class="form-control lineColor" required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="address">Address</label>
            <input type="text" name="address" id="addres" class="form-control lineColor"  required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control lineColor"  required>
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="contact_number">Contact Number</label>
            <input type="phone" name="contact_no" id="contact_no" class="form-control lineColor"  required>
          </div> 
          <p></p>


        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="amount_item">Amount/Item</label>
          <input type="text" name="amount_item" id="amount_item" class="form-control lineColor"  required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="Purpose_of_donation">Purpose of Donation</label>
          <input type="text" name="purpose" id="purpose" class="form-control lineColor"  required>
        </div> 
        <p></p>


        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="donation_date">Donation date</label>
          <input type="date" name="donationDate" id="donationDate" class="form-control lineColor"  required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="donation_letter">Upload Donation Letter</label>
          <input type="file" name="donation_letter" id="donation_letter" class="form-control lineColor"  required>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="payment_receipt">Upload payment receipt</label>
          <input type="file" name="payment_receipt" id="payment_receipt" class="form-control lineColor"  required>
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

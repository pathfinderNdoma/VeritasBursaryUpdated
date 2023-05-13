<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="createContract" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Add Direct Purchase</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="POST" action="{{route('addDirectPurchase')}}" enctype="multipart/form-data">
      <div class="modal-body">


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="">Name of Item</label>
            <input type="text" name="itemName" id="itemName" class="form-control lineColor" required/>
          </div>

          <p></p>
      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="">Nature of Item</label>
        <select type="text" name="itemNature" id ="itemNature" class=" form-control lineColor" required>
          <option value="">--Select--</option> 
          <option value="Asset">Asset</option> 
          <option value="Consumable">Consumeable</option>      
      </select>
    </div> <p></p> 

     {{-- If it is an asset, select asset type starts --}}
              <div class="d-none" id="assetSectiondDiv">
                <div class="col-lg-12 col-md-12 col-xs-12">
                  <label for="">Type of Asset</label>
                  <select type="text" name="assetType" id ="assetType" class=" form-control lineColor" >
                    <option value="">--Select--</option> 
                    <option value="land">Land</option> 
                    <option value="building">Building</option>
                    <option value="equipment">Equipment</option>      
                </select>
              </div> 
              </div><p></p> 
      {{-- If it is an asset, select asset type ends --}}

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="">Quantity 
              <span id="quanityNote" class="d-none" style="color:red; font-style:italic">(Enter land size for land)</span>
            </label>
            <input type="number" name="quantity" id="quantity" class="form-control lineColor"/>
          </div><p></p> 

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="">Unit Price 
              <span id="quanityNote" class="d-none" style="color:red; font-style:italic">(Enter amount for land or building)</span
              ></label>
            <input type="number" name="unitPrice" id="unitPrice" class="form-control lineColor" required/>
          </div><p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="">Date Purchased  
              <span id="datepurchasedNote" class="d-none" style="color:red; font-style:italic">
                (Date of completion for building  and date purchased for land)</span>
            </label>
            <input type="date" name="datePurchased" id="datePurchased" class="form-control lineColor" required/>
          </div><p></p> 

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="purchaseBy">Purchase By</label>
            <input type="text" name="purchaseBy" id="purchaseBy" class="form-control lineColor" required/>
          </div><p></p> 

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Staff  Number</label>
            <input type="text" name="staffNumber" id="staffNumber" class="form-control lineColor" required/>
          </div><p></p>  

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Designation</label>
            <input type="text" name="designation" id="designation" class="form-control lineColor" required/>
          </div><p></p> 

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Upload Receipt</label>
            <input type="file" name="receipt" id="receipt" class="form-control lineColor" required/>
          </div> 


    <p></p>

  @csrf 

</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="submit" value="Add" class="btn btn-primary">
      </form>
      </div>
    </div>
  </div>
</div>
</form>


<!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
    <script>
       $(document).ready(function() {
        $('#itemNature').change(function() {
          if ($(this).val() == 'Asset') {
            $('#assetSectiondDiv').removeClass('d-none');
            $('#assetType input').attr("required", true);
            //Add required attribute to quantity
            $('#quantity input').removeAttr("required");

            $('#quanityNote').removeClass('d-none');
            $('#datepurchasedNote').removeClass('d-none');

            
          }   
          
          else{
            $('#assetSectiondDiv').addClass('d-none');
            $('#assetType input').removeAttr("required");
            $('#quanityNote').addClass('d-none');
            $('#datepurchasedNote').addClass('d-none');

            //Add required attribute to quantity
            $('#quantity input').attr("required", true);
          }
        });
      });
    </script>
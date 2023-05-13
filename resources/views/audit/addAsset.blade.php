<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="addasset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Add Asset</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('addAsset')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
              <div class="col-lg-12 col-md-12 col-xs-12">
                <label for="asset_type" style="color:#198754; font-weight:bold">Asset Type</label>
                <select  name="itemNature" id ="itemNature" class=" form-control lineColor" required>
                  <option value="">--Select--</option> 
                  <option value="land">Land</option> 
                  <option value="building">Building</option> 
                  <option value="equipment">Equipment</option>     
              </select>
            </div> <p></p> 
{{-- ********************************************DIV FOR EQUIPMWNT ASSETS STARTS********************************************************************************** --}}
    <div id="equipment_div" class="d-none">

                  <div class="row col-12">

                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label for="equipmentName" style="color:#198754; font-weight:bold">Name of Equipment</label>
                      <input type="text" name="equipmentName" id="equipmentName" class="form-control lineColor" />
                    </div>
                  </div><p></p>


                  <div class="row col-12">

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="" style="color:#198754; font-weight:bold">Quantity</label>
                      <input type="number" name="quantity" id="quantity" class="form-control lineColor" />
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="equipmentUnitCost"style="color:#198754; font-weight:bold">Unit Cost</label>
                      <input type="number" name="equipmentUnitCost" id="equipmentUnitCost" class="form-control lineColor" />
                    </div>

            </div><p></p>  

            <div class="row col-12">

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="" style="color:#198754; font-weight:bold">Date Purchased</label>
                  <input type="date" name="datePurchased_constructed" id="datePurchased_constructed" class="form-control lineColor" />
                </div>

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="purchased_supervisedBy" style="color:#198754; font-weight:bold">Purchased By</label>
                  <input type="text" name="purchased_supervisedBy" id="purchased_supervisedBy" class="form-control lineColor" />
                </div>

            </div><p></p>


            <div class="row col-12">

              <div class="col-lg-6 col-md-6 col-xs-6">
                <label for="designation" style="color:#198754; font-weight:bold">Designation</label>
                <input type="text" name="designation" id="designation" class="form-control lineColor" />
              </div>

              <div class="col-lg-6 col-md-6 col-xs-6">
                <label for="staffnumber" style="color:#198754; font-weight:bold">Staff Number</label>
                <input type="text" name="staffnumber" id="staffnumber" class="form-control lineColor" />
              </div>

          </div><p></p>


            <div class="row col-12">

                <div class="col-lg-12 col-md-12 col-xs-12">
                  <label for="controlBy" style="color:#198754; font-weight:bold">Controlled By: <span style="color:red; font-style:italic">Name of department, faculty, center</span></label>
                  <input type="text" name="controlBy" id="controlBy" class="form-control lineColor" />
                </div>
              </div><p></p>

              <div class="row col-12">  
                <div class="col-lg-12 col-md-13 col-xs-12">
                  <label for="" style="color:#198754; font-weight:bold">In use at: <span style="color:red; font-style:italic">Specify the physical location of the property</span></label>
                  <input type="text" name="inUseAt" id="inUseAt" class="form-control lineColor" />
                </div>
            </div><p></p>

              


            <div class="row col-12">  
              <div class="col-lg-12 col-md-13 col-xs-12">
                <label for="" style="color:#198754; font-weight:bold">Upload Equipment Receipt</label>
                <input type="file" name="equipmentReceipt" id="equipmentReceipt" class="form-control lineColor" />
              </div>
          </div><p></p>

        </div>
                  
  {{-- ********************************************DIV FOR EQUIPMENT ASSETS ENDS********************************************************************************** --}}

  {{-- ********************************************DIV FOR BUILDING ASSETS STARTS********************************************************************************** --}}
                
  <div id="building_div" class="d-none">
                  <div class="row col-12">

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="" style="color:#198754; font-weight:bold">Name of Building</label>
                      <input type="text" name="buildingName" id="buildingName" class="form-control lineColor" />
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for=""style="color:#198754; font-weight:bold">Located at</label>
                      <input type="text" name="buildingLocation" id="buildingLocation" class="form-control lineColor" />
                    </div>
                  </div><p></p>


                  <div class="row col-12">
                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="" style="color:#198754; font-weight:bold">Constructed/Donated By</label>
                      <input type="text" name="constructed_donatedBy" id="constructed_donatedBy" class="form-control lineColor" />
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for=""style="color:#198754; font-weight:bold">Amount</label>
                      <input type="number" name="buildingAmount" id="buildingAmount" class="form-control lineColor" />
                    </div>
                  </div><p></p> 

                  <div class="row col-12">
                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="" style="color:#198754; font-weight:bold">Date of Completion</label>
                      <input type="date" name="dateofCompletion" id="dateofCompletion" class="form-control lineColor" />
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for=""style="color:#198754; font-weight:bold">Supervised By <span style="color:red; font-style:italic">If applicable</span> </label>
                      <input type="text" name="buildingsupervisedBy" id="buildingsupervisedBy" class="form-control lineColor"/>
                    </div>
                  </div><p></p>
                  
                  <div class="row col-12">  
                    <div class="col-lg-12 col-md-13 col-xs-12">
                      <label for="" style="color:#198754; font-weight:bold">Upload Building Receipt</label>
                      <input type="file" name="buildingReceipt" id="buildingReceipt" class="form-control lineColor" />
                    </div>
                </div><p></p>

  </div>


           
{{-- ********************************************DIV FOR BUILDING ASSETS ENDS********************************************************************************** --}}

{{-- ********************************************DIV FOR LAND ASSETS STARTS********************************************************************************** --}}
      <div id="land_div" class="d-none">
              <div class="row col-12">

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="" style="color:#198754; font-weight:bold">Size</label>
                  <input type="text" name="landSize" id="landSize" class="form-control lineColor"/>
                </div>

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for=""style="color:#198754; font-weight:bold">Located at</label>
                  <input type="text" name="landLocation" id="landLocation" class="form-control lineColor"/>
                </div>
              </div><p></p>

              <div class="row col-12">
                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="" style="color:#198754; font-weight:bold">Amount</label>
                  <input type="number" name="landAmount" id="landAmount" class="form-control lineColor"/>
                </div>

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for=""style="color:#198754; font-weight:bold">Date Purchased/Donated</label>
                  <input type="date" name="land_datePurchased" id="land_datePurchased" class="form-control lineColor"/>
                </div>
              </div><p></p>

              <div class="row col-12">  
                <div class="col-lg-12 col-md-13 col-xs-12">
                  <label for="" style="color:#198754; font-weight:bold">Upload LandReceipt</label>
                  <input type="file" name="landReceipt" id="landReceipt" class="form-control lineColor" />
                </div>
            </div><p></p>
      </div>

{{-- ********************************************DIV FOR LAND ASSETS END********************************************************************************** --}}

    @csrf 

    <div class="row col-12">  
      <div class="col-lg-12 col-md-13 col-xs-12">
        <label for="sightedBy" style="color:#198754; font-weight:bold">Sighted By</label>
        <input type="text" name="sightedBy" id="sightedBy" class="form-control lineColor" required />
      </div>
  </div><p></p>

    <div class="row col-12">  
      <div class="col-lg-12 col-md-13 col-xs-12">
        <label for="sighteby_designation" style="color:#198754; font-weight:bold">Designation</label>
        <input type="text" name="sighteby_designation" id="sighteby_designation" class="form-control lineColor" required />
      </div>
  </div><p></p>


  <div class="row col-12">  
    <div class="col-lg-12 col-md-13 col-xs-12">
      <label for="dateofSightation" style="color:#198754; font-weight:bold">Date of Sightation</label>
      <input type="date" name="dateofSightation" id="dateofSightation" class="form-control lineColor" required />
    </div>
  </div><p></p>

<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
  <input type="submit" value="Add" class="btn btn-primary">

</div>

  </div>
</div>
      </div>
    </div>
  </div>
</form>

    

 {{-- *************************************************************************************************************************************************** --}}
 <script>
  $(document).ready(function() {
  $('#itemNature').change(function() {
    if ($(this).val() == 'equipment') {
      $('#equipment_div').removeClass('d-none');
      $('#equipment_div input').attr("required", true);

      $('#land_div').addClass('d-none');
      $('#land_div input').removeAttr("required");
      
      $("#building_div ").addClass('d-none')
      $("#building_div input").removeAttr("required");
      
    } 

    if($('#itemNature').val()=='land') {
    $('#land_div').removeClass('d-none');
    $('#land_div input').attr("required", true);  

    $('#equipment_div').addClass('d-none');
    $('#equipment_div input').removeAttr("required");

    $("#building_div").addClass('d-none')
    $('#building_div input').removeAttr("required");
    }

    if($('#itemNature').val()=='building') {
    $('#land_div').addClass('d-none'); 
    $('#land_div input').removeAttr("required"); 

    $('#equipment_div').addClass('d-none');
    $('#equipment_div input').removeAttr("required");

    $("#building_div").removeClass('d-none')
    $("#building_div input").attr("required", true);
    }

  });
});
</script>
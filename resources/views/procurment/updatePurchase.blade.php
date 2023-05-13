<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="updateAsset{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Update Purchase Details</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('updateDirectPurchase')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
              <div class="col-lg-12 col-md-12 col-xs-12">
                <label for="asset_type" style="color:#198754; font-weight:bold">Asset Type</label>
                <select  name="update_itemNature" id ="update_itemNature" class=" form-control lineColor" required>
                  <option>{{$data->assetType}}</option> 
                  <option value="land">Land</option> 
                  <option value="building">Building</option> 
                  <option value="equipment">Equipment</option>     
              </select>
            </div> <p></p> 
        
{{-- ********************************************DIV FOR EQUIPMENT ASSETS STARTS********************************************************************************** --}}
  @if ($data->assetType=='equipment')

            <div id="equipment">

                  <div class="row col-12">

                    <div class="col-lg-12 col-md-12 col-xs-12">
                      <label for="equipmentName" style="color:#198754; font-weight:bold">Name of Equipment</label>
                      <input type="text" name="update_equipmentName" id="update_equipmentName" value="{{$data->equipmentName}}" class="form-control lineColor" />
                    </div>
                  </div><p></p>


                  <div class="row col-12">

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="" style="color:#198754; font-weight:bold">Quantity</label>
                      <input type="number" name="update_quantity" id="update_quantity" value="{{$data->quantity}}" class="form-control lineColor" />
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="equipmentUnitCost"style="color:#198754; font-weight:bold">Unit Cost</label>
                      <input type="number" name="update_equipmentUnitCost" id="update_equipmentUnitCost" value="{{$data->equipmentUnitCost}}" class="form-control lineColor" />
                    </div>

            </div><p></p>  

            <div class="row col-12">

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="" style="color:#198754; font-weight:bold">Date Purchased</label>
                  <input type="date" name="update_datePurchased_constructed"
                   id="update_datePurchased_constructed" value="{{$data->datePurchased}}" class="form-control lineColor" />
                </div>

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="purchased_supervisedBy" style="color:#198754; font-weight:bold">Purchased By</label>
                  <input type="text" name="update_purchased_supervisedBy" id="update_purchased_supervisedBy" 
                  value="{{$data->purchasedBy}}"class="form-control lineColor" />
                </div>

            </div><p></p>


            <div class="row col-12">

              <div class="col-lg-6 col-md-6 col-xs-6">
                <label for="designation" style="color:#198754; font-weight:bold">Designation</label>
                <input type="text" name="update_designation" id="update_designation" value="{{$data->designation}}" class="form-control lineColor" />
              </div>

              <div class="col-lg-6 col-md-6 col-xs-6">
                <label for="staffnumber" style="color:#198754; font-weight:bold">Staff Number</label>
                <input type="text" name="update_staffnumber" id="update_staffnumber" value="{{$data->staffnumber}}" class="form-control lineColor" />
              </div>

          </div><p></p>


            <div class="row col-12">

                <div class="col-lg-12 col-md-12 col-xs-12">
                  <label for="controlBy" style="color:#198754; font-weight:bold">Controlled By: <span style="color:red; font-style:italic">Name of department, faculty, center</span></label>
                  <input type="text" name="update_controlBy" id="update_controlBy" value="{{$data->controlBy}}" class="form-control lineColor" />
                </div>
              </div><p></p>

              <div class="row col-12">  
                <div class="col-lg-12 col-md-13 col-xs-12">
                  <label for="" style="color:#198754; font-weight:bold">In use at: <span style="color:red; font-style:italic">Specify the physical location of the property</span></label>
                  <input type="text" name="update_inUseAt" id="update_inUseAt" value="{{$data->inUseAt}}" class="form-control lineColor" />
                </div>
            </div><p></p>

            <div class="col-lg-6 col-md-6 col-xs-6 d-none">
              <label for=""style="color:#198754; font-weight:bold">EQUIPMENT ID</label>
              <input type="text" name="update_equipment_ID" id="update_equipment_ID" value="{{$data->id}}" class="form-control lineColor"/>
            </div>
          </div><p></p>

          <div class="row col-12">  
            <div class="col-lg-12 col-md-13 col-xs-12 d-none">
              <label for="" style="color:#198754; font-weight:bold">Upload Building Receipt</label>
              <input type="file" name="update_equipmentReceipt" id="update_equipmentReceipt" class="form-control lineColor" />
            </div>
        </div><p></p>


        <div class="row col-12">  
          <div class="col-lg-12 col-md-13 col-xs-12 d-none">
            <label for="" style="color:#198754; font-weight:bold">Upload Equipment Receipt ID</label>
            <input type="text" name="update_equipmentReceiptID" id="update_equipmentReceiptID" value="{{$data->equipmentReceipt}}" class="form-control lineColor" />
          </div>
      </div><p></p>

        </div>
    @endif             
  {{-- ********************************************DIV FOR EQUIPMENT ASSETS ENDS********************************************************************************** --}}

  {{-- ********************************************DIV FOR BUILDING ASSETS STARTS********************************************************************************** --}}
  @if ($data->assetType=='building')            
  <div id="building">
                  <div class="row col-12">

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="" style="color:#198754; font-weight:bold">Name of Building</label>
                      <input type="text" name="update_buildingName" id="update_buildingName" value="{{$data->buildingName}}" class="form-control lineColor" />
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for=""style="color:#198754; font-weight:bold">Located at</label>
                      <input type="text" name="update_buildingLocation" id="update_buildingLocation" value="{{$data->buildingLocation}}" class="form-control lineColor" />
                    </div>
                  </div><p></p>


                  <div class="row col-12">
                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="" style="color:#198754; font-weight:bold">Constructed/Donated By</label>
                      <input type="text" name="update_constructed_donatedBy" id="update_constructed_donatedBy" value="{{$data->constructed_donatedBy}}" class="form-control lineColor" />
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for=""style="color:#198754; font-weight:bold">Amount</label>
                      <input type="number" name="update_buildingAmount" id="update_buildingAmount" value="{{$data->buildingAmount}}" class="form-control lineColor" />
                    </div>
                  </div><p></p> 

                  <div class="row col-12">
                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="" style="color:#198754; font-weight:bold">Date of Completion</label>
                      <input type="date" name="update_dateofCompletion" id="update_dateofCompletion" value="{{$data->dateofCompletion}}" class="form-control lineColor" />
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for=""style="color:#198754; font-weight:bold">Supervised By <span style="color:red; font-style:italic">If applicable</span> </label>
                      <input type="text" name="update_buildingsupervisedBy" id="update_buildingsupervisedBy" value="{{$data->buildingSupervisedBy}}"  class="form-control lineColor"/>
                    </div>
                  </div><p></p> 

                  
              <div class="col-lg-6 col-md-6 col-xs-6 d-none">
                <label for=""style="color:#198754; font-weight:bold">BUILDING ID</label>
                <input type="text" name="update_building_ID" id="building_land_ID" value="{{$data->id}}" class="form-control lineColor"/>
              </div>
            </div><p></p>

            <div class="row col-12">  
              <div class="col-lg-12 col-md-13 col-xs-12">
                <label for="" style="color:#198754; font-weight:bold">Upload Building Receipt</label>
                <input type="file" name="update_buildingReceipt" id="update_landReceipt" class="form-control lineColor" />
              </div>
          </div><p></p>


          <div class="row col-12">  
            <div class="col-lg-12 col-md-13 col-xs-12">
              <label for="" style="color:#198754; font-weight:bold d-none">Upload Building Receipt ID</label>
              <input type="text" name="update_buildingReceiptID" id="update_buildingReceiptID" value="{{$data->buildingReceipt}}" class="form-control lineColor" />
            </div>
        </div><p></p>

  </div>
  @endif        
{{-- ********************************************DIV FOR BUILDING ASSETS ENDS********************************************************************************** --}}

{{-- ********************************************DIV FOR LAND ASSETS STARTS********************************************************************************** --}}
@if ($data->assetType=='land')
          <div id="land">
              <div class="row col-12">

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="" style="color:#198754; font-weight:bold">Size</label>
                  <input type="text" name="update_landSize" id="update_landSize" value="{{$data->landSize}}" class="form-control lineColor"/>
                </div>

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for=""style="color:#198754; font-weight:bold">Located at</label>
                  <input type="text" name="update_landLocation" id="update_landLocation" value="{{$data->landLocation}}" class="form-control lineColor"/>
                </div>
              </div><p></p>

              <div class="row col-12">
                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="" style="color:#198754; font-weight:bold">Amount</label>
                  <input type="number" name="update_landAmount" id="update_landAmount" value="{{($data->landAmount)}}" class="form-control lineColor"/>
                </div>

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for=""style="color:#198754; font-weight:bold">Date Purchased/Donated</label>
                  <input type="date" name="update_land_datePurchased" id="update_land_datePurchased" value="{{$data->land_datePurchased}}" class="form-control lineColor"/>
                </div>
              </div><p></p>

              <div class="col-lg-6 col-md-6 col-xs-6 d-none">
                <label for=""style="color:#198754; font-weight:bold">Land ID</label>
                <input type="text" name="update_land_ID" id="update_land_ID" value="{{$data->id}}" class="form-control lineColor"/>
              </div>
            </div><p></p>

            <div class="row col-12">  
              <div class="col-lg-12 col-md-13 col-xs-12">
                <label for="" style="color:#198754; font-weight:bold">Upload Land Receipt</label>
                <input type="file" name="update_landReceipt" id="update_landReceipt" class="form-control lineColor" />
              </div>
          </div><p></p>


          <div class="row col-12">  
            <div class="col-lg-12 col-md-13 col-xs-12 d-none">
              <label for="" style="color:#198754; font-weight:bold">Upload Land Receipt ID</label>
              <input type="text" name="update_landReceiptID" id="update_landReceiptID" value="{{$data->landReceipt}}" class="form-control lineColor" />
            </div>
        </div><p></p>


      </div>
@endif
{{-- ********************************************DIV FOR LAND ASSETS END********************************************************************************** --}}

    @csrf 


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <input type="submit" value="Update" class="btn btn-primary">
        </form>
        </div>
      </div>
    </div>
  </div>
</form>

    

 {{-- *************************************************************************************************************************************************** --}}

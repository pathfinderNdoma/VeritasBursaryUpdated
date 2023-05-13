<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="updateService{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">UpdateService</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="POST" action="{{route('updateService')}}" enctype="multipart/form-data">
      <div class="modal-body">
                
                  

              <div class="row col-12">

                  <div class="col-lg-6 col-md-6 col-xs-6">
                    <label for="update_serviceType" style="color:#198754; font-weight:bold">Service Type</label>
                    <input type="text" name="update_serviceType" id="update_serviceType" value="{{$data->serviceType}}"  class="form-control lineColor" />
                </div> 

                  <div class="col-lg-6 col-md-6 col-xs-6">
                    <label for="update_description" style="color:#198754; font-weight:bold">Description</label>
                    <input type="text" name="update_description" id="update_description" value="{{$data->description}}"
                    required class="form-control lineColor" />
                  </div>

              </div><p></p>


                
              <div class="row col-12">

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="update_amount"style="color:#198754; font-weight:bold">Amount</label>
                      <input type="number" name="update_amount" id="update_amount" class="form-control lineColor" value="{{$data->amount}}"  required/>
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="dateofCommmencement" style="color:#198754; font-weight:bold">Date of Commencement</label>
                      <input type="date" name="update_dateofCommmencement" id="update_dateofCommmencement" value="{{$data->dateofCommmencement}}" 
                      class="form-control lineColor" required/>
                    </div>
                </div><p></p>


              <div class="row col-12">
                  
                  <div class="col-lg-6 col-md-6 col-xs-6">
                    <label for="update_dateofCompletion"style="color:#198754; font-weight:bold">Date of Completion </label>
                    <input type="date" name="update_dateofCompletion" id="update_dateofCompletion" value="{{$data->dateofCompletion}}"
                     class="form-control lineColor" required/>
                  </div>
  
                  <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="update_receipt" style="color:#198754; font-weight:bold">Receipt</label>
                      <input type="file" name="update_receipt" id="update_receipt" value="{{$data->receipt}}" class="form-control lineColor" />
                    </div>
                  </div>

              <div class="col-lg-6 col-md-6 col-xs-6 d-none">
                <label for="update_receipt" style="color:#198754; font-weight:bold">Receipt Val</label>
                <input type="file" name="update_receiptVal" id="update_receiptVal" value="{{$data->receipt}}" class="form-control lineColor" />
              </div>

              <div class="col-lg-6 col-md-6 col-xs-6 d-none">
                <label for="update_receipt" style="color:#198754; font-weight:bold">ID</label>
                <input type="text" name="update_id" id="update_id" value="{{$data->id}}" class="form-control lineColor" />
              </div>
                

              <div class="row col-12">  
                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="supervisedby" style="color:#198754; font-weight:bold">Supervised By</label>
                  <input type="text" name="update_supervisedby" id="update_supervisedby" value="{{$data->supervisedby}}" required class="form-control lineColor" />
                </div>

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="update_designation" style="color:#198754; font-weight:bold">Designation</label>
                  <input type="text" name="update_designation" id="update_designation" value="{{$data->designation}}" required class="form-control lineColor" />
                </div>
            </div><p></p> 

          {{-- <div class="row col-12">  
            <div class="col-lg-6 col-md-6 col-xs-6">
              <label for="sightedby" style="color:#198754; font-weight:bold">Sighted By</label>
              <input type="text" name="sightedby" id="sightedby" class="form-control lineColor" />
            </div>

            <div class="col-lg-6 col-md-6 col-xs-6">
              <label for="sightedbyDesignation" style="color:#198754; font-weight:bold">Designation</label>
              <input type="text" name="sightedbyDesignation" id="sightedbyDesignation" class="form-control lineColor" />
            </div>

            <div class="col-lg-6 col-md-6 col-xs-6">
              <label for="dateofSightation" style="color:#198754; font-weight:bold">Date of Sightation</label>
              <input type="date" name="dateofSightation" id="dateofSightation" class="form-control lineColor" />
            </div>
        </div><p></p> --}}

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
  <input type="submit" value="Update" class="btn btn-primary">

</div>

         

  @csrf 

</div>
</div>

      </div>
    </div>
  </div>
</div>
</form>

  


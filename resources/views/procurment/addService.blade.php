<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="addService" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Add Service</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="POST" action="{{route('addService')}}" enctype="multipart/form-data">
      <div class="modal-body">
                
                  

              <div class="row col-12">

                  <div class="col-lg-6 col-md-6 col-xs-6">
                    <label for="serviceType" style="color:#198754; font-weight:bold">Service Type</label>
                    <input type="text" name="serviceType" id="serviceType" class="form-control lineColor" />
                </div> 

                  <div class="col-lg-6 col-md-6 col-xs-6">
                    <label for="" style="color:#198754; font-weight:bold">Description</label>
                    <textarea name="description" id="description" class="form-control lineColor" required></textarea>
                  </div>

              </div><p></p>


                
              <div class="row col-12">

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="amount"style="color:#198754; font-weight:bold">Amount</label>
                      <input type="number" name="amount" id="amount" class="form-control lineColor" required/>
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="dateofCommmencement" style="color:#198754; font-weight:bold">Date of Commencement</label>
                      <input type="date" name="dateofCommmencement" id="dateofCommmencement"
                      required class="form-control lineColor" />
                    </div>
                </div><p></p>


              <div class="row col-12">
                  
                  <div class="col-lg-6 col-md-6 col-xs-6">
                    <label for="dateofCompletion"style="color:#198754; font-weight:bold">Date of Completion </label>
                    <input type="date" name="dateofCompletion" id="dateofCompletion"  
                    required class="form-control lineColor"/>
                  </div>
  
                    <div class="col-lg-6 col-md-6 col-xs-6">
                      <label for="receipt" style="color:#198754; font-weight:bold">Receipt</label>
                      <input type="file" name="receipt" id="receipt" class="form-control lineColor"  required />
                    </div>
              </div><p></p>
                

              <div class="row col-12">  
                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="supervisedby" style="color:#198754; font-weight:bold">Supervised By</label>
                  <input type="text" name="supervisedby" id="supervisedby" class="form-control lineColor"  required />
                </div>

                <div class="col-lg-6 col-md-6 col-xs-6">
                  <label for="designation" style="color:#198754; font-weight:bold">Designation</label>
                  <input type="text" name="designation" id="designation" class="form-control lineColor" required />
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
  <input type="submit" value="Add" class="btn btn-primary">

</div>

         

  @csrf 

</div>
</div>

      </div>
    </div>
  </div>
</div>
</form>

  


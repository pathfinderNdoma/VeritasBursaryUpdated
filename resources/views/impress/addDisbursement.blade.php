<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




  <div class="modal fade" id="addmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
            <h5 class="modal-title" id="modalLabel" style="color:white">Make Disbursement</h5>
            <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

          </div>
          <form name="form" method="GET" action="{{route('addDisbursement')}}" enctype="multipart/form-data">
          <div class="modal-body">
              
                @csrf
                  
                <div class="col-lg-12 col-m">Select Disbursment Application</label>
                  <select type="text" name="application" id="application" class="form-control lineColor" require>
                    <option>--Select--</option>
                    @foreach ($disbursment_applications as $applications)
                    <option value="{{$applications->id}}">{{ 'Department of '. $applications->department. ' , '. 
                     'N'. number_format($applications->amount, 2). 
                     ', '. $applications->purpose. 
                     ', '. $applications->date }}</option>
                    @endforeach
                  </select>
              </div>


              <div class="col-lg-12 col-md-12 col-xs-12">
                <label for="basicSalary">Action</label>
                <select type="text" name="status" id="status" class="form-control lineColor" required>
                    <option>Select</option>
                    <option value="Approve">Approve</option>
                    <option value="Decline">Decline</option>
                  </select>
            </div>  

            <div class="col-lg-12 col-md-12 col-xs-12">
              <label for="basicSalary">Amount</label>
              <input type="number" class="form-control lineColor"  value="" 
               name="amount"  style="background-color: white">
          </div>  


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="message">Message</label>
            <textarea class="form-control lineColor" rows="3" cols="3" name="message" required></textarea>

        </div>  

  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <input type="submit" value="Submit" class="btn btn-primary">
          </form>
          </div>
        </div>
      </div>
    </div>

  
      

           <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
  
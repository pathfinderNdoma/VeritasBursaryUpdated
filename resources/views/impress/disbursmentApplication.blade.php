<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="disbursementApplication" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Apply for Disbursement</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="GET" action="{{route('disbursementApplication')}}" enctype="multipart/form-data">
      <div class="modal-body">
          
            @csrf
            <div class="col-lg-12 col-md-12 col-xs-12">
              <label for="name">Name</label>
              <input type="text" class="form-control lineColor"  value="" 
               name="apply_name" required  style="background-color: white">
          </div>  

            <div class="col-lg-12 col-md-12 col-xs-12">
              <label for="department">Department</label>
              <select type="text" name="apply_department" id="dept" class="form-control lineColor">
                <option>-Select--</option>
                <option>{{$data1->department}}</option>
              </select>
          </div>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="designation">Designation</label>
            <input type="text" class="form-control lineColor"  value=""
             name="apply_designation" required  style="background-color: white">
        </div> 

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="amount">Amount</label>
          <input type="number" class="form-control lineColor"  value=""
           name="apply_amount" required  style="background-color: white">
      </div> 

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="purpose">Purpose</label>
          <input type="text" class="form-control lineColor"  value="" 
           name="apply_purpose" required  style="background-color: white">
      </div>  


      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="date">Date</label>
        <input type="date" class="form-control lineColor"  value="" 
         name="apply_date" required  style="background-color: white">
    </div>  

     

          

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="submit" value="Add" class="btn btn-primary">
      </form>
      </div>
    </div>
  </div>
</div>


  

       <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->

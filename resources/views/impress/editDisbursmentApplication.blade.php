<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="editapplication" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
        <h5 class="modal-title" id="modalLabel" style="color:white">Edit Disbursement Application</h5>
        <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

      </div>
      <form name="form" method="GET" action="{{route('editDisbursementApplication')}}" enctype="multipart/form-data">
      <div class="modal-body">
          
            @csrf
            <div class="col-lg-12 col-md-12 col-xs-12">
              <label for="name">Name</label>
              <input type="text" class="form-control lineColor"  value="{{$data->name}}" 
               name="edit_name" required  style="background-color: white">
          </div>  

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="name">Department</label>
            <input type="text" class="form-control lineColor"  value="{{$data->department}}" 
             name="edit_department" required  style="background-color: white" readonly>
        </div> 

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="designation">Designation</label>
            <input type="text" class="form-control lineColor"  value="{{$data->designation}}"
             name="edit_designation" required  style="background-color: white">
        </div> 

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="amount">Amount</label>
          <input type="number" class="form-control lineColor"  value="{{$data->amount}}"
           name="edit_amount" required  style="background-color: white">
      </div> 

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="purpose">Purpose</label>
          <input type="text" class="form-control lineColor"  value="{{$data->purpose}}" 
           name="edit_purpose" required  style="background-color: white">
      </div>  


      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="date">Date</label>
        <input type="date" class="form-control lineColor"  value="{{$data->date}}" 
         name="edit_date" required  style="background-color: white">
    </div>  

     
        <div class="col-lg-12 col-md-12 col-xs-12 d-none">
          <label for="edit_id">Date</label>
          <input type="text" class="form-control lineColor"  value="{{$data->id}}" 
          name="edit_id" required  style="background-color: white">
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

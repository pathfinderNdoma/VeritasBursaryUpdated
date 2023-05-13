<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->



<div class="row col-12">
    <div class="modal fade" id="refundModal{{$n}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
          <div class="modal-content">
            <div class="modal-header btn btn-success">
              <h5 class="modal-title" id="modalLabel" style="color:white">School Fees Refund Application</h5>
              <h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close"></i></h4>
              {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:white"></button> --}}
            </div>

            <!-- ROLE TO CHECK IF THE LOGGE IN USER IS VC -->
            @if ($data1->designation==='VC')
            <form name="form" method="GET" action="{{route('refundAppAction', ['role'=>'vc'])}}" enctype="multipart/form-data">  
            @endif

            <!-- ROLE TO CHECK IF THE LOGGE IN USER IS BURSAR -->
            @if ($data1->designation==='BURSAR')
            <form name="form" method="GET" action="{{route('refundAppAction', ['role'=>'bursar'])}}" enctype="multipart/form-data"> 
            @endif


              @csrf
            <div class="modal-body">
                <div class="row col-12">
          
                <br/>
                    <div class="col-12 g-3">
                        <label for="basicSalary">Action</label>
                        <select class="form-control lineColor" aria-label="Default select example" name="action" required>
                          <option>Select Action</option>
                          <option value="approve">Approve</option>
                          <option value="decline">Decline</option>
                        </select> 
                    </div>
    
    
                    <div class="col-12  g-3">
                        <label for="tax">Message</label>
                        <textarea class="form-control lineColor" placeholder="Enter Message For Decline"  name="message" cols="10" rows="4" value required></textarea>
                    </div>
    
    
                </div>
                <input type="text" name="transactionCode" class="d-none" value="{{$data->transactionCode}}">
                <input type="text" name="id" class="d-none" value="{{$data->id}}">
            </div>
    
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Cancel</button>
              <input type="submit" value="Submit" class="btn btn-success">
              
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
        
 
             <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
    
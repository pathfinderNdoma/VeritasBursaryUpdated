<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->



<div class="row col-12">
    <div class="modal fade" id="addschool_fessmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
          <div class="modal-content">
            <div class="modal-header btn btn-success">
              <h5 class="modal-title" id="modalLabel" style="color:white">Define New School Fee</h5>
       <h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close"></i></h4>

              {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:white"></button> --}}
            </div>
            <form name="form" method="GET" action="{{route('addschool_fees')}}" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">
                <div class="row col-12">
    
                <br/>

                <div class="col-12 g-3">
                  <label for="department" style="color:green">Department</label>   
                  <select class="form-control lineColor" name="department" id="department" required>
                    <option value="">--Select Department--</option>
                    @foreach ($department as $department)
                    <option value="{{$department->department}}">{{$department->department}}</option>
                    @endforeach
                  </select>
              </div>
              
                    <div class="col-12 g-3">
                      <label for="basicSalary" style="color:green">Fees</label> 
                        <input type="text" class="form-control lineColor" placeholder="e.g. Hostel fee" value=""  name="fees" required >
                        
                       
                    </div>
    
                    <div class="col-12  g-3">
                      <label for="allowance" style="color:green">Amount</label>
                        <input type="text" class="form-control lineColor" placeholder="Enter Amount" value=""  name="amount" required >
                        
                    </div>
    
                    <div class="col-12  g-3">
                      
                      <label for="tax" style="color:green">Description</label> 
                        <textarea class="form-control lineColor"   name="description" cols="10" rows="4" value required ></textarea>
                        
                    </div>
    
    
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
    </div>
    
        
 
             <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
    
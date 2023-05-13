<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->

<!-- Modal -->
<form name="form" method="GET" action="{{route('updateSchool_fees_Definition')}}" enctype="multipart/form-data">
  @csrf
<div class="modal fade" id="updatemodal{{$n}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update School Fees Definition</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row col-12">
    
        </br>
            <div class="col-12 g-3">
                <label for="basicSalary">Fees</label>
                <input type="text" class="form-control" placeholder="Enter Fees" value="{{$data->fee}}"  name="fees" required>
               
            </div>

            <div class="col-12  g-3">
                <label for="allowance">Amount</label>
                <input type="text" class="form-control" placeholder="Enter Amount" value="{{$data->amount}}"  name="amount" required>
            </div>

            <div class="col-12  g-3">
              
                <label for="tax">Description</label>
                <textarea class="form-control"  name="description" cols="10" rows="4" value required>{{$data->description}}</textarea>
                
            </div>


        </div>

    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="submit" value="Update Salary Definition" class="btn btn-success form-control">
      </div>
       
    </form>
  
    </div>
  </div>
</div>
        
     <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
    
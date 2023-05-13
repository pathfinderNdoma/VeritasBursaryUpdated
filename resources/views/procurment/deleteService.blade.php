<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="deleteServices{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
        <h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close"></i></h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this Service?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

        <a href="{{route('deleteService', ['id'=>$data->id, 'year'=>$data->dateofCommmencement, 'receipt'=>$data->receipt])}}"
          type="button" class="btn btn-primary">Confirm Delete</a>  
       
      </div>
    </div>
  </div>
</div>
        
     <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
    
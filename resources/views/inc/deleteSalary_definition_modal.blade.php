<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="deletemodal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Salary Definition</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete salary definition?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="{{route('deleteSalaryDefinition', ['id'=>$data->id])}}" type="button" class="btn btn-primary">Confirm Delete</a>
      </div>
    </div>
  </div>
</div>
        
     <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
    
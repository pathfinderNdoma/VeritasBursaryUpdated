<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="delete{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Asset</h5>
        <h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close"></i></h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this Purchase?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
{{-- ************************************************************************************************************************************************** --}}
        @if ($data->assetType=='land')
        <a href="{{route('deleteAsset', ['item_nature'=>$data->assetType,'id'=>$data->id, 'Receipt'=>$data->landReceipt, 'year'=>$data->land_datePurchased])}}"
          type="button" class="btn btn-primary">Confirm Delete</a>  
        @endif
 {{-- ****************************************************************************************************************************************************** --}}       
        @if ($data->assetType=='building')
        <a href="{{route('deleteAsset', ['item_nature'=>$data->assetType,'id'=>$data->id, 'Receipt'=>$data->buildingReceipt,
         'year'=>$data->dateofCompletion])}}"
          type="button" class="btn btn-primary">Confirm Delete</a>  
        @endif

{{-- ************************************************************************************************************************************************** --}}
        @if ($data->assetType=='equipment')
        <a href="{{route('deleteAsset', ['item_nature'=>$data->assetType,'id'=>$data->id, 'Receipt'=>$data->equipmentReceipt, 
        'year'=>$data->datePurchased])}}"
          type="button" class="btn btn-primary">Confirm Delete</a>  
        @endif
        
 {{-- ************************************************************************************************************************************************** --}}          
      </div>
    </div>
  </div>
</div>
        
     <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
    
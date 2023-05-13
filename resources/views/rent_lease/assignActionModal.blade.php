<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="assignAction{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Upoad Receipt for Property</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="submitReceipt" enctype="multipart/form-data">
        <div class="modal-body">
            
          

          <div class="col-lg-12 col-md-12 col-xs-12">
            
            <input type="text" name="propertyID" value="{{$data->id}}" id="propertyID" class="form-control lineColor d-none">
          </div> 
          <p></p>

        


      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="usage">Upload Receipt</label>
        <input type="file" name="receipt" id="receipt" class="form-control lineColor ">
      </div> 
    <p></p>

     
    @csrf 

  </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <input type="submit" value="Submit" class="btn btn-outline-success">
        </form>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  $(document).ready(function() {
    // Listen for changes to the select element
    $('#propertyName').on('change', function() {
    
        var propertyID = $(this).val();
 
        const url = "{{route('propertyInfo')}}";

            $.ajax({
            url: url,
            type: 'GET',
            data:{id:propertyID},
            cache:false,
            success: function(response){  
              var jsonData = response[0]; // assuming the query returns a single row
             // alert(jsonData.financial_year); // display the value of the "contractID" field in an alert box
             
              $('#propertyLocation').val(jsonData.propertyLocation);
              $('#descript').val(jsonData.description);
              $('#propertyAmount').val(jsonData.amount);
              $('#propertyLocation').val(jsonData.property_location);
              $('#propertyUsage').val(jsonData.usage);
              $('#hiddenbox').removeClass('d-none');
                }
            });
    });
});

</script>
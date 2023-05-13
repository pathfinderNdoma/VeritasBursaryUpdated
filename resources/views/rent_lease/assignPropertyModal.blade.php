<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="assignProperty" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Assign Property</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="GET" action="assignproperty" enctype="multipart/form-data">
        <div class="modal-body">
            
          <div class=" col-xs-12 col-lg-12 col-md-12">
            <label for="property_location">Name of Property</label>
            <select name="property_ID" id ="property_ID" class=" form-control lineColor">
              <option value="">--Select--</option>
              @foreach ($available_properties as $item)
              <option value="{{$item->id}}">{{$item->property_name}}</option> 
              @endforeach
            </select>
          </div>
          <p></p>


          <div class=" col-xs-12 col-lg-12 col-md-12">
            <input type="text" name="propertyName" id="propertyName" value="" class="form-control lineColor d-none">
          </div>
          <p></p>

          


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="property_location">Property Location</label>
            <input type="text" name="propertyLocation" id="propertyLocation" class="form-control lineColor ">
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="description">Description</label>
            <input type="text" name="descript" id="descript" class="form-control lineColor ">
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="amount">Amount</label>
            <input type="number" name="propertyAmount" id="propertyAmount" class="form-control lineColor ">
          </div> 
          <p></p>

          


          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="usage">Usage</label>
            <select type="text" name="propertyUsage" id ="propertyUsage" class=" form-control lineColor">
              <option value=" ">--Select--</option>
              <option value="rent">Rent</option>
              <option value="lease">Lease</option>
            </select>
          </div> 
        <p></p>


        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="usage">Usage Period: Start Date</label>
          <input type="date" name="startDate" id="startDate" class="form-control lineColor ">
        </div> 
      <p></p>

      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="usage">Usage Period: End Date</label>
        <input type="date" name="endDate" id="endDate" class="form-control lineColor ">
      </div> 
    <p></p>

    <div class="col-lg-12 col-md-12 col-xs-12">
      <label for="description">Applicant's Name</label>
      <input type="text" name="applicant_name" id="applicant_name" class="form-control lineColor ">
    </div> 
    <p></p>


    <div class="col-lg-12 col-md-12 col-xs-12">
      <label for="description">Address</label>
      <input type="text" name="address" id="address" class="form-control lineColor ">
    </div> 
    <p></p>


    <div class="col-lg-12 col-md-12 col-xs-12">
      <label for="description">Phone Number</label>
      <input type="text" name="phone" id="phone" class="form-control lineColor ">
    </div> 
    <p></p>

    <div class="col-lg-12 col-md-12 col-xs-12">
      <label for="description">Email Address</label>
      <input type="email" name="email" id="email" class="form-control lineColor ">
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
    $('#property_ID').on('change', function() {
        var propertyID = $('#property_ID').val();
        const url = "{{route('propertyInfo')}}";

            $.ajax({
            url: url,
            type: 'GET',
            data:{id:propertyID},
            cache:false,
            success: function(response){  
              var jsonData = response[0]; // assuming the query returns a single row
             // alert(jsonData.financial_year); // display the value of the "contractID" field in an alert box
             $('#propertyName').val(jsonData.property_name);
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
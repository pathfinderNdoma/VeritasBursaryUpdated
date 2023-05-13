<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="contractDef" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Contract Definition</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('contractsDefinition')}}" enctype="multipart/form-data">
        <div class="modal-body">
            

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Select Contract</label>
            <select type="text" name="sel_contract" id ="contract" class=" form-control lineColor">
              <option value=" ">--Select Contract--</option>      
              @foreach ($contracts as $contract)
              <option value="{{$contract->contractID}}">{{$contract->contractName}}</option>
              @endforeach
            </select>
          </div> 
        <p></p>
{{-- **************************************************************************** --}}
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="Contract">Contract Name</label>
            <input type="text" name="contractName" id="contractName" value="" class="form-control lineColor" readonly/>
          </div> 
          <p></p>
        <div id="hiddenbox" class="d-none">
          
        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="basicSalary">Contract ID</label>
          <input type="text" name="contractID" id="contractID" value="" class="form-control lineColor" readonly/>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="basicSalary">Date Created</label>
          <input type="text" name="dateCreated" id="dateCreated" value="" class="form-control lineColor" readonly/>
        </div> 
        <p></p>

        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="basicSalary">Financial Year</label>
          <input type="text" name="fyear" id="fyear" value="" class="form-control lineColor" readonly/>
        </div> 
        <p></p>
        </div>  
{{-- ********************************************************************************************* --}}
            <div class="col-lg-12 col-md-12 col-xs-12">
                <label for="basicSalary">Product /Service Name</label>
                <input type="text" name="product_service_name" id="product_service_name" class="form-control lineColor" value=""/>
              </div> 
              <p></p>

            <div class="col-lg-12 col-md-12 col-xs-12">
              <label for="basicSalary">Quantity</label>
              <input type="text" name="quantity" class="form-control lineColor" value=""/>
            </div> 
            <p></p>

            <div class="col-lg-12 col-md-12 col-xs-12">
              <label for="basicSalary">Description</label>
              <input type="text" name="description" class="form-control lineColor" value=""/>
            </div> 
            <p></p>


    @csrf 

  </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <input type="submit" value="Add" class="btn btn-primary">
        </form>
        </div>
      </div>
    </div>
  </div>
</form>

    

         <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
<script>
  $(document).ready(function() {
    // Listen for changes to the select element
    $('#contract').on('change', function() {
        var contractId = $(this).val();
 
        const url = "{{route('getData')}}";

            $.ajax({
            url: url,
            type: 'GET',
            data:{id:contractId},
            cache:false,
            success: function(response){  
              var jsonData = response[0]; // assuming the query returns a single row
             // alert(jsonData.financial_year); // display the value of the "contractID" field in an alert box
              $('#contractID').val(jsonData.contractID);
              $('#dateCreated').val(jsonData.dateCreated);
              $('#fyear').val(jsonData.financial_year);
              $('#contractName').val(jsonData.contractName);
              $('#hiddenbox').removeClass('d-none');
                }
            });
    });
});

</script>
<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




  <div class="modal fade" id="addmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
            <h5 class="modal-title" id="modalLabel" style="color:white">New Retirement</h5>
            <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

          </div>
          <form name="form" method="POST" action="{{route('submitRetirement')}}" enctype="multipart/form-data">
          <div class="modal-body">
              
              
                

              <div class="col-lg-12 col-md-12 col-xs-12">
                <label for="basicSalary">Department</label>
                <select type="text" name="dept" id="dept" class="form-control lineColor">
                  <option>Select</option>
                  <option>{{$data1->department}}</option>
                  {{-- @foreach ($departments as $department)
                  <option>{{$department->department}}</option>
                  @endforeach --}}
                </select>
              </div>  
              <p></p>
           <div class="col-lg-12 col-md-12 col-xs-12">
              <label for="basicSalary">Faculty</label>
              <select type="text" name="faculty" id="faculty" class="form-control lineColor">
                <option>Select</option>
                <option>{{$data1->faculty}}</option>
                {{-- @foreach ($faculties as $faculties)
                <option>{{$faculties->faculty}}</option>
                @endforeach --}}
              </select>
          </div>  
          <p></p>
          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Financial Year</label>
            <select type="text" name="fyear" id ="fyear" class=" form-control lineColor">
              <option>Select Financial Year</option>      
              @foreach ($financial_year as $fyear)
              <option>{{$fyear}}</option>
              @endforeach
          </select>
        </div> 
        
        <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
            <label for="basicSalary">Amount</label>
            <input type="number" class="form-control lineColor"  value="" 
             name="amount" required  style="background-color: white">
        </div> 
        <p></p>
        
        <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="basicSalary">Expenditure</label>
          <input type="text" class="form-control lineColor"  value="" 
           name="expenditure" required  style="background-color: white">
      </div> 
      <p></p>
      <div class="col-lg-12 col-md-12 col-xs-12">
        <label for="basicSalary">Upload Receipt</label>
        <input type="file" class="form-control" name="receiptID" id="receiptID" required>
     </div>
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
  
<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="addbudget" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Add Budget</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('addExpenditure')}}" enctype="multipart/form-data">
        <div class="modal-body">
            

          <div id="equipment_div">

                        <div class="row col-12">

                          <div class="col-lg-12 col-md-12 col-xs-12">
                            <label for="equipmentName" style="color:#198754; font-weight:bold">Budget for</label>
                            <select type="text" name="year" id ="year" class=" form-control lineColor" required>
                              <option value="">--Select--</option>      
                              @foreach ($financial_year as $year)
                              <option value="{{$year}}">{{$year}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div><p></p>


                        <div class="row col-12">

                          <div class="col-lg-6 col-md-6 col-xs-6">
                            <label for="startDate" style="color:#198754; font-weight:bold">Start Date</label>
                            <input type="date" name="startDate" id="startDate" class="form-control lineColor"  required />
                          </div>

                          <div class="col-lg-6 col-md-6 col-xs-6">
                            <label for="endDate"style="color:#198754; font-weight:bold">End Date</label>
                            <input type="date" name="endDate" id="endDate" class="form-control lineColor"  required/>
                          </div>

                  </div><p></p>  

                  <div class="row col-12">

                      <div class="col-lg-6 col-md-6 col-xs-6">
                        <label for="description" style="color:#198754; font-weight:bold">Description</label>
                        <input type="text" name="description" id="description" class="form-control lineColor"  required/>
                      </div>

                      <div class="col-lg-6 col-md-6 col-xs-6">
                        <label for="amount" style="color:#198754; font-weight:bold">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control lineColor" required />
                      </div>

                  </div><p></p>


                  
          @csrf 


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="submit" value="Add" class="btn btn-primary">

      </div>

        </div>
      </div>
            </div>
          </div>
        </div>
      </form>

 
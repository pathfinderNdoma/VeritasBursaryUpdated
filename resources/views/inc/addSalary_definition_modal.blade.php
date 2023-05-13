<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->



<div class="row col-12">
    <div class="modal fade" id="addmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
          <div class="modal-content">
            <div class="modal-header btn btn-success">
              <h5 class="modal-title" id="modalLabel" style="color:white">Add Salary Definition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:white"><i class="bi bi-x-lg"></i></button>
            </div>
            <form name="form" method="get" action="{{route('defineSalary')}}" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row col-12">
                  @csrf
                    <div class="col-12 g-3">
                        <label for="gradelevel">Grade Level</label>
                        <input type="text" class="form-control lineColor" placeholder="" aria-label="Default select example" name="grade_level" required/>
                            
                    </div>
                <br/>

                      <div class="col-12  g-3">
                        <label for="pension">Designation</label>
                        <input type="text" class="form-control lineColor" placeholder="" aria-label="designation" name="designation" required>
                    </div>

                    <div class="col-12 g-3">
                        <label for="basicSalary">Basic Salary: <span style="color:red; font-style:italic">In Percentage</span></label>
                        <input type="text" class="form-control lineColor" placeholder="eg 2" aria-label="First name" name="basicSalary" required>
                       
                    </div>
    
                    <div class="col-12  g-3">
                        <label for="allowance">Allowance: <span style="color:red; font-style:italic">In Percentage</span></label>
                        <input type="text" class="form-control lineColor" placeholder="eg 2" aria-label="First name" name="allowance" required>
                    </div>
    
                    <div class="col-12  g-3">
                        <label for="tax">Tax: <span style="color:red; font-style:italic">In Percentage</span></label>
                        <input type="text" class="form-control lineColor" placeholder="eg 2" aria-label="First name" name="tax" required>
                    </div>
    
                    <div class="col-12  g-3">
                        <label for="pension">Pension: <span style="color:red; font-style:italic">In Percentage</span></label>
                        <input type="text" class="form-control lineColor" placeholder="eg 2" aria-label="First name" name="pension" required>
                    </div>

                    <div class="col-12  g-3">
                      <label for="pension">Bonus: <span style="color:red; font-style:italic">Not in Percentage</span></label>
                      <input type="text" class="form-control lineColor" placeholder="Bonus in actual amount" aria-label="Bonus" name="bonus" required>
                  </div>

                  <div class="col-12  g-3">
                    <label for="pension">Other Deductions: <span style="color:red; font-style:italic">Not in Percentage</span></label>
                    <input type="text" class="form-control lineColor" placeholder="Other Deductions in actual amount" aria-label="First name" name="otherDeductions" required>
                </div>

                   
    
                </div>
    
            </div>
    
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <input type="submit" value="Add" class="btn btn-primary">
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
        
 
             <!-- ***************************************MODAL POPUP ENDSHERE*********************************************** -->
    
<!-- ***************************************MODAL POPUP STARTS FROM HERE*********************************************** -->
<!-- Modal -->




<div class="modal fade" id="addmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-top modal-fullscreen-xl-down">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#198754; color:white; border: 1px #198754">
          <h5 class="modal-title" id="modalLabel" style="color:white">Add Salary Definition</h5>
          <a href="#"><h4> <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" style="color:white"></i></h4></a>

        </div>
        <form name="form" method="POST" action="{{route('addsalaryDefinition')}}" enctype="multipart/form-data">
        <div class="modal-body">
            
          <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="gradelevel">Grade Level</label>
          <input type="text" class="form-control lineColor" aria-label="Default select example" name="grade_level" required/>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="basicSalary">Basic Salary</label>
          <input type="text" class="form-control lineColor" placeholder="Basic Salary" aria-label="First name" name="basicSalary" required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="allowance">Allowance</label>
          <input type="text" class="form-control lineColor" placeholder="Allowance" aria-label="First name" name="allowance" required>
          </div> 
          <p></p>


          <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="tax">Tax</label>
          <input type="text" class="form-control lineColor" placeholder="Tax" aria-label="First name" name="tax" required>
          </div> 
          <p></p>

          <div class="col-lg-12 col-md-12 col-xs-12">
          <label for="pension">Pension</label>
          <input type="text" class="form-control lineColor" placeholder="Pension" aria-label="First name" name="pension" required>
          </div> 
          <p></p>

     

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

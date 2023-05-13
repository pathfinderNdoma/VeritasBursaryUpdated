<nav id="sidebar" style="background-color: rgb(3, 73, 39);">

  <div style="height: 100vh; overflow-y: scroll;">
    <div class="img bg-wrap text-center py-4">
        <div class="user-logo">
            <div class="img" style="background-image: url(images/logo1.png);"></div>
            <h3>Veritas University Bursary</h3>
            
        </div>
    </div>
<ul class="list-unstyled components mb-5">
<li id="dashboard">
  
  <a href="{{route('dashboard')}}"  ><span class="fa bi-speedometer mr-3"></span>Dashboard</a>

  {{-- **************************************************************BUDGETS********************************************************************--}}

  <li id="budgetAcc">
		<a href="#budget" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa bi-bar-chart-fill mr-3 ">
			<small class="d-flex align-items-center justify-content-center"></small></span>Budget</a>
		<ul class="collapse list-unstyled" id="budget">
			<li id="create_contract">
				<a href="{{route('expenditurePlanIndex')}}" class="active"><span class="fa fa-money"> Expenditure Plan</a>
			</li>
			<li id="contract_definition">
				<a href="{{route('incomePlanIndex')}}" class="accordion" active><span class="fa fa-money">Income Plan</a>
			</li>
			<li id="financial_year">
				<a href="{{route('financialYearIndex')}}" class="accordion" active><span class="fa fa-money">Define Financial Year</a>
			</li>
		</ul>
	</li>
{{-- ************************************************************BUDGET******************************************************************************--}}
      
  {{-- *********************************************  STAFF ACCOUNT ************************************************************************************--}}
</li>
<li id="staff" class="dropdown open">
    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
      <span class="fa fa-support mr-3 "><small class="d-flex align-items-center justify-content-center"></small>
      </span> Staff A/C
    </a>
    <ul class="collapse list-unstyled" id="homeSubmenu">
      <li id="staffReg">
          <a href="{{url('staffReg')}}"><span class="fa fa-pencil"> Update Bursary Information</a>
      </li>
      <li id="payslip">
        <a href="payslip"><span class="fa fa-money"> Payslip</a>
    </li>
    <li id="staffRecord">
      <a href="{{route('staffRecordsIndex')}}"><span class="fa fa-pencil"> Staff Record</a>
  </li>

    <li id="salaryDefinition">
        <a href="{{route('salaryDefIndex')}}"><span class="fa fa-pencil"> Salary Definition</a>
    </li>

    
    <li id="otherDeductions">
      <a href="{{route('otherDeductionsIndex')}}"><span class="fa fa-money"> Define Other Deductions</a>
  </li>

    <li id="salarySchedule">

      <a href="{{route('salarySchedule')}}"><span class="fa fa-calendar"> Salary Schedule</a>

    </li>

    <li id="payroll">
      <a href="{{route('payrollApprovalIndex')}}"><span class="fa fa-money"> Salary Approval (HOD)</a>
  </li>

      <li id="payroll">
          <a href="{{url('payroll')}}"><span class="fa fa-money"> Payroll</a>
      </li>

     
      </ul>
</li>
{{-- ********************************************* STUDENTS ACCOUNT ************************************************************************************--}}
<li id="student">
  <a href="#studentAcc" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"><span class="fa fa-support mr-3 "><small class="d-flex align-items-center justify-content-center"></small></span> Student A/C</a>
  <ul class="collapse list-unstyled" id="studentAcc">
    <li id="feesDefinition">
      <a href="schoolFeesDefinition"><span class="fa fa-pencil"> Fees Definition</a>
  </li>
  <li id="paymentLog">
    <a href="{{route('paymentlogIndex')}}"><span class="fa fa-money"> Payment Log</a>
    </li>
    <li id="paymentReport">
      <a href="paymentReport"><span class="fa fa-money"> Payment Report</a>
  </li>
  <li id="advanceDeposit">
    <a href="advanceDeposit"><span class="fa fa-money"> Advance Deposit</a>
</li>
<li id="statementofAccount">
  <a href="statementofAccount"><span class="fa fa-money"> Statement of Account</a>
</li>
<li id="refundApp">
  <a href="{{route('refundApp')}}"><span class="fa fa-money"> Refund Applications</a>
</li>

<li id="processRefund">
  <a href="processrefund"><span class="fa fa-money"> Processed Refund</a>
</li>

<li id="processRefund">
  <a href="{{route('debtRecoveryIndex')}}"><span class="fa fa-money"> Debt Recovery</a>
</li>
  </ul>
</li>

{{-- *********************************************  IMPRESS ************************************************************************************--}}
<li id="impressAcc">
  <a href="#impress" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"><span class="fa fa-support mr-3 "><small class="d-flex align-items-center justify-content-center"></small></span> Impress</a>
  <ul class="collapse list-unstyled" id="impress">

    <li id="apply_disbursement">
      <a href="{{route('disbursement_applyIndex')}}"><span class="fa fa-money"> Disbursement Application</a>
    </li>

<li id="disbursement">
  <a href="{{route('disbursementIndex')}}"><span class="fa fa-money"> Disbursement</a>
</li>

<li id="retirement">
  <a href="{{route('retirementSubmissionIndex')}}"><span class="fa fa-money"> Retirement Submission</a>
</li>

<li id="retirement">
  <a href="{{route('processRetirementIndex')}}"><span class="fa fa-money"> Process Retirement</a>
</li>

<li id="retirement">
  <a href="{{route('approvedRetirement')}}"><span class="fa fa-money"> Approved Retirements</a>
</li>

<li id="impressReport">
  <a href="{{route('retirementReportIndex')}}"><span class="fa fa-money"> Report</a>
</li>
  </ul>
</li>


{{-- *********************************************  PROCURMENT ************************************************************************************--}}
<li id="procurmentAcc">
  <a href="#procurment" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"><span class="fa fa-support mr-3 "><small class="d-flex align-items-center justify-content-center"></small></span>Procurment</a>
  <ul class="collapse list-unstyled" id="procurment">

<li id="disbursement">
  <a href="{{route('registeredContractors')}}"><span class="fa fa-money"> Registered Contractors</a>
</li>
<li id="create_contract">
  <a href="{{route('createContractsIndex')}}"><span class="fa fa-money"> Create Contract</a>
</li>

<li id="contract_definition">
  <a href="{{route('contractsDefinitionIndex')}}"><span class="fa fa-money"> Contract Definition</a>
</li>

<li id="bids_submission">
  <a href="{{route('bidsIndex')}}"><span class="fa fa-money">Bid Submission</a>
</li>

<li id="retirement">
  <a href="{{route('approvedContracts')}}"><span class="fa fa-money"> Approved Contracts</a>
</li>


<li id="directpurchase">
  <a href="{{route('directpurchaseIndex')}}"><span class="fa fa-money"> Direct Purchase</a>
</li>

<li id="retirement">
  <a href="{{route('serviceIndex')}}"><span class="fa fa-money "> Services</a>
</li>

  </ul>
</li>


{{-- *********************************************Rent and Lease *******************************************************************************************--}}

<li id="Rent_Lease">
  <a href="#rent_lease" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"><span class="fa fa-support mr-3 "><small class="d-flex align-items-center justify-content-center"></small></span>Rent and Lease</a>
  <ul class="collapse list-unstyled" id="rent_lease">

<li id="available_properties">
  <a href="{{route('availablePropertiesIndex')}}"><span class="fa fa-money">Available Properties</a>
</li>

<li id="contract_definition">
  <a href="{{route('assignPropertyIndex')}}"><span class="fa fa-money">Assign Property</a>
</li>

<li id="create_contract">
  <a href="{{route('propertiesInUseIndex')}}"><span class="fa fa-money">Properties in Use</a>
</li>


  </ul>
</li>

{{-- *********************************************  VENTURES ************************************************************************************--}}

<li id="venturesAcc">
  <a href="#ventures" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"><span class="fa fa-support mr-3 ">
    <small class="d-flex align-items-center justify-content-center"></small></span>Enterprises</a>
  <ul class="collapse list-unstyled" id="ventures">

<li id="create_contract">
  <a href="{{route('venturesIndex')}}"><span class="fa fa-money">Ventures</a>
</li>

<li id="contract_definition">
  <a href="{{route('returnsIndex')}}"><span class="fa fa-money">Returns</a>
</li>

  </ul>
</li>
{{-- *********************************************Donations************************************************************************************--}}
<li id="donationsAcc">
  <a href="#donations" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"><span class="fa fa-support mr-3 "><small class="d-flex align-items-center justify-content-center"></small></span>Donations</a>
  <ul class="collapse list-unstyled" id="donations">

<li id="create_contract">
  <a href="{{route('donationsIndex')}}"><span class="fa fa-money "> Incoming Donations</a>
</li>

<li id="contract_definition">
  <a href="{{route('outgoingDonationIndex')}}"><span class="fa fa-money "> Outgoing Donations</a>
</li>

<li id="pledge">
  <a href="{{route('pledgeIndex')}}"><span class="fa fa-money "> Pledge</a>
</li>
  </ul>
</li>

{{-- *********************************************GRANTS***********************************************************************************--}}
<li id="grantsAcc">
  <a href="{{route('grantsIndex')}}" ><span class="fa fa-support mr-3 ">
    <small class="d-flex align-items-center justify-content-center"></small>
  </span>Grants
</a>
</li>
{{-- *********************************************GRANTS***********************************************************************************--}}

<li id="scholarshipAcc">
  <a href="{{route('scholarshipIndex')}}" ><span class="fa fa-support mr-3 ">
    <small class="d-flex align-items-center justify-content-center"></small></span>Scholarship
  </a>
</li>
{{-- *********************************************GRANTS***********************************************************************************--}}


{{-- *********************************************AUDIT***********************************************************************************--}}
<li id="auditAcc">
  <a href="#audit" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"><span class="fa fa-support mr-3 "><small class="d-flex align-items-center justify-content-center"></small></span>Audit</a>
  <ul class="collapse list-unstyled" id="audit">

<li id="create_contract">
  <a href="{{route('assetsIndex')}}"><span class="fa fa-money "> Fixed Assets</a>
</li>


<li id="pledge">
  <a href="{{route('consumeablesIndex')}}"><span class="fa fa-money "> Consumables</a>
</li>


  </ul>
</li>

{{-- *********************************************AUDIT**********************************************************************************--}}

<li>
  <a href="bursaryLogin"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
</li>
</ul>
  </div>

    

</nav>
<div id="content" class="p-0 md-12 ">
  <div style="background-color: rgb(3, 73, 39); height: 40px;" class="">
    <button type="button" alt="Collapse sidebar" id="sidebarCollapse" class="btn btn-info" style="background-color: rgb(3, 73, 39);">
      <i class="fa fa-bars"></i>
      <span class="sr-only fa fa-bars">Toggle Menu</span>
    </button><span style="color: white">Veritas University Bursary - welcome <span>{{ucwords(strtolower($data1->title ))}} {{ucwords(strtolower($data1->fname))}} {{ucwords(strtolower($data1->oname))}} {{ucwords(strtolower($data1->lname))}} ({{ucwords(strtolower($data1->role))}})</span></span>
    <span style="float: right; color:white; margin: 10px"><a href='bursaryLogin'>Signout</a></span></span>
    
  </div>


<script>
        $(document).ready(function() {
      // Listen for click events on the sub-menu links
      $('#budget li a').click(function() {
        $(this).css('color', red)
        // Add the 'active' attribute to the clicked link
        $('#budget li a').removeAttr('active');
        $(this).attr('active', '');

        // Keep the main accordion open
        $('#budgetAcc > ul').addClass('show');
      });
    });
	</script>
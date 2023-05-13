<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PayslipController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


route::get('/staffReg', [Controller::class, 'staffReg']);
route::post('/staffReg', [Controller::class, 'reg']);
route::get('/bursaryLogin', [Controller::class, 'login']);
route::post('/login', [Controller::class, 'loginMain']);
route::get('/dashboard', [Controller::class, 'dashboard']);
route::get('/payslip', [Controller::class, 'payslip']);
Route::GET('paySlip', [PayslipController::class, 'pay'])->name("paySlip");

// *******************************************************************DASHBOARD******************************************************************** *
Route::get('dashboard', [App\Http\Controllers\dashboardController::class, 'dashboard'])->name('dashboard');




route::get('paymentLog', [Controller::class, 'paymentLog']);
//route::get('paymentReport', [Controller::class, 'paymentReport']);


//PAYMENTLOG ROUTES 
Route::get('paymentlogIndex', [App\Http\Controllers\paymentlogController::class, 'paymentlogIndex'])->name('paymentlogIndex');
Route::get('/log', [App\Http\Controllers\paymentlogController::class, 'feespayment'])->name('log');



//Salary Definitions Route
Route::get('/salaryDefIndex', [App\Http\Controllers\salaryDefinitionController::class, 'salaryDefIndex'])->name('salaryDefIndex');
Route::get('defineSalary', [App\Http\Controllers\salaryDefinitionController::class, 'defineSalary'])->name('defineSalary');
Route::get('updateSalaryDefinitionview', [App\Http\Controllers\salaryDefinitionController::class, 'updateSalaryDefinitionview'])->name('updateSalaryDefinitionview');
Route::post('updateSalaryDefinition', [App\Http\Controllers\salaryDefinitionController::class, 'updateDefinition'])->name('updateSalaryDefinition');
Route::get('deleteSalaryDefinition', [App\Http\Controllers\salaryDefinitionController::class, 'delete'])->name('deleteSalaryDefinition');

//Other Deductions
route::get('/otherDeductionsIndex', [App\Http\Controllers\salaryDefinitionController::class, 'otherDeductionsIndex'])->name('otherDeductionsIndex');
route::get('/deductionstaffs', [App\Http\Controllers\salaryDefinitionController::class, 'deductionstaffs'])->name('deductionstaffs');
route::get('/staffDetails', [App\Http\Controllers\salaryDefinitionController::class, 'staffDetails'])->name('staffDetails');
route::get('/addDeductions', [App\Http\Controllers\salaryDefinitionController::class, 'addDeductions'])->name('addDeductions');
route::get('/fetchDeductionStaffs', [App\Http\Controllers\salaryDefinitionController::class, 'fetchDeductionStaffs'])->name('fetchDeductionStaffs');
route::get('/deleteOtherDeductions', [App\Http\Controllers\salaryDefinitionController::class, 'deleteOtherDeductions'])->name('deleteOtherDeductions');
route::get('/updateDeductions', [App\Http\Controllers\salaryDefinitionController::class, 'updateDeductions'])->name('updateDeductions');

//School Fees Definiton 
Route::get('/schoolFeesDefinition', [App\Http\Controllers\schoolFeesDefinitionController::class, 'index']);
Route::get('schoolFeesDef', [App\Http\Controllers\schoolFeesDefinitionController::class, 'index'])->name('schoolFeesDef');
Route::get('addschool_fees', [App\Http\Controllers\schoolFeesDefinitionController::class, 'add'])->name('addschool_fees');

Route::get('updateSchoolFeesDefinitionview', [App\Http\Controllers\schoolFeesDefinitionController::class, 'updateview'])
->name('updateSchoolFeesDefinitionview');

Route::get('updateSchoolfeesDefinitionView', [App\Http\Controllers\schoolFeesDefinitionController::class, 'updateview'])->name('updateSchoolfeesDefinitionView');
Route::post('updateSchoolfeesDefinition', [App\Http\Controllers\schoolFeesDefinitionController::class, 'update'])->name('updateSchoolfeesDefinition');
Route::get('deleteScholFeesDefinition', [App\Http\Controllers\schoolFeesDefinitionController::class, 'delete'])->name('deleteScholFeesDefinition');


//Fees Refunds
Route::get('/refundApp', [App\Http\Controllers\refundsController::class, 'index'])->name('refundApp');
Route::get('/refundAppAction/{role}', [App\Http\Controllers\refundsController::class, 'refundAppAction'])->name('refundAppAction');

//Processed Fee Refunds
Route::get('/processrefund', [App\Http\Controllers\refundsController::class, 'processrefund']);

//studentPaymentReportController\
route::get('/paymentReport', [App\Http\Controllers\studentPaymentReportController::class, 'paymentReport']);

// DEBT RECOVERY
route::get('/debtRecoveryIndex', [App\Http\Controllers\studentPaymentReportController::class, 'debtRecoveryIndex'])->name('debtRecoveryIndex');
route::get('/debtRecovery', [App\Http\Controllers\studentPaymentReportController::class, 'debtRecovery'])->name('debtRecovery');

route::get('/report', [App\Http\Controllers\studentPaymentReportController::class, 'report'])->name('report');

//ADVANCE DEPOSIT ROUTES
route::get('/advanceDeposit', [App\Http\Controllers\studentPaymentReportController::class, 'advanceDepositIndex']);
route::get('/viewdeposits', [App\Http\Controllers\studentPaymentReportController::class, 'viewdeposits'])->name('viewdeposits');

//STATEMENT OF ACCOUNT ROUTES
route::get('/statementofAccount', [App\Http\Controllers\studentPaymentReportController::class, 'soaIndex']);
route::get('/viewstudents', [App\Http\Controllers\studentPaymentReportController::class, 'viewstudents'])->name('viewstudents');
route::get('/viewsoa', [App\Http\Controllers\studentPaymentReportController::class, 'viewsoa'])->name('viewsoa');

// *************************ROUTES FOR IMPRESS STARTS HERE***************************

//************ROUTES FOR DISBURSMENT
route::get('/disbursement_applyIndex', [App\Http\Controllers\disbursementController::class, 'disbursement_applyIndex'])->name('disbursement_applyIndex');
route::get('/disbursementApplication', [App\Http\Controllers\disbursementController::class, 'disbursementApplication'])->name('disbursementApplication');
route::get('/editDisbursementApplication', [App\Http\Controllers\disbursementController::class, 'editDisbursementApplication'])->name('editDisbursementApplication');
route::get('/deleteDisbursementApplication', [App\Http\Controllers\disbursementController::class, 'deleteDisbursementApplication'])->name('deleteDisbursementApplication');

route::get('/disbursement', [App\Http\Controllers\disbursementController::class, 'disbursementIndex'])->name('disbursementIndex');
route::get('/fetch', [App\Http\Controllers\disbursementController::class, 'fetch'])->name('fetch');
route::get('/updateDisbursementView', [App\Http\Controllers\disbursementController::class, 'updateDisbursementView'])->name('updateDisbursementView');
route::get('/updateDisbursement', [App\Http\Controllers\disbursementController::class, 'updateDisbursement'])->name('updateDisbursement');
route::get('/', [App\Http\Controllers\disbursementController::class, 'deleteDisbursement'])->name('deleteDisbursement');
route::get('/addDisbursement', [App\Http\Controllers\disbursementController::class, 'addDisbursement'])->name('addDisbursement');


//*****************************************RETIREMENT SUBMISSION ROUTES**************************** */
route::get('/retirement_submission', [App\Http\Controllers\retirementController::class, 'retirementSubmissionIndex'])->name('retirementSubmissionIndex');
route::get('/fetchsubmission', [App\Http\Controllers\retirementController::class, 'fetchsubmission'])->name('fetchsubmission');
route::post('/submitRetirement', [App\Http\Controllers\retirementController::class, 'submitRetirement'])->name('submitRetirement');
route::post('/updateRetirementSubmission', [App\Http\Controllers\retirementController::class, 'updateRetirementSubmission'])->name('updateRetirementSubmission');
route::get('/deleteRetirementSubmission', [App\Http\Controllers\retirementController::class, 'deleteRetirementSubmission'])->name('deleteRetirementSubmission');


//***********************PROCESS RETIREMENTS SUBMISSIONT */
route::get('/processRetirementIndex', [App\Http\Controllers\retirementController::class, 'processRetirementIndex'])->name('processRetirementIndex');
route::get('/fetchProcessSubmission', [App\Http\Controllers\retirementController::class, 'fetchProcessSubmission'])->name('fetchProcessSubmission');
route::post('/processsRetirement', [App\Http\Controllers\retirementController::class, 'processsRetirement'])->name('processsRetirement');
route::get('/approvedRetirement', [App\Http\Controllers\retirementController::class, 'approvedRetirement'])->name('approvedRetirement');
route::get('/fetchapprovedRetirement', [App\Http\Controllers\retirementController::class, 'fetchapprovedRetirement'])->name('fetchapprovedRetirement');

//**********************************RETIREMENT REPORT*********************************** */
route::get('/retirementReportIndex', [App\Http\Controllers\retirementController::class, 'retirementReportIndex'])->name('retirementReportIndex');
route::get('/retirementReport', [App\Http\Controllers\retirementController::class, 'retirementReport'])->name('retirementReport');


// **************************************PROCURMENTS ROUTES******************************************************************** */
route::get('/registeredContractors', [App\Http\Controllers\procurmentController::class, 'registeredContractors'])->name('registeredContractors');

route::get('/createContractsIndex', [App\Http\Controllers\procurmentController::class, 'createContractsIndex'])->name('createContractsIndex');
route::post('/createContract', [App\Http\Controllers\procurmentController::class, 'createContract'])->name('createContract');
route::get('/fetchContracts', [App\Http\Controllers\procurmentController::class, 'fetchContracts'])->name('fetchContracts');
route::get('/viewContractDetails', [App\Http\Controllers\procurmentController::class, 'viewdefinedContracts'])->name('viewContractDetails');
//ROUTE TO EDIT THE CONTRACT STATUS
route::post('/editContractStatus', [App\Http\Controllers\procurmentController::class, 'editContractStatus'])->name('editContractStatus');


//DIRECT PURCHASEMENT
route::get('/directpurchaseIndex', [App\Http\Controllers\directPurchaseController::class, 'directpurchaseIndex'])->name('directpurchaseIndex');
route::get('/fetchDirectPurchase', [App\Http\Controllers\directPurchaseController::class, 'fetchDirectPurchase'])->name('fetchDirectPurchase');
route::post('/addDirectPurchase', [App\Http\Controllers\directPurchaseController::class, 'addDirectPurchase'])->name('addDirectPurchase');
route::post('/updateDirectPurchase', [App\Http\Controllers\directPurchaseController::class, 'updateDirectPurchase'])->name('updateDirectPurchase');
route::get('/deleteDirectPurchase', [App\Http\Controllers\directPurchaseController::class, 'deleteDirectPurchase'])->name('deleteDirectPurchase');
route::get('/contractsDefinitionIndex', [App\Http\Controllers\procurmentController::class, 'contractsDefinitionIndex'])->name('contractsDefinitionIndex');


// ******************************************************ROUTES FOR SERVICES PROCURRED****************************************
route::get('/serviceIndex', [App\Http\Controllers\procurmentController::class, 'serviceIndex'])->name('serviceIndex');
route::post('/addService', [App\Http\Controllers\procurmentController::class, 'addService'])->name('addService');
route::get('/fetchService', [App\Http\Controllers\procurmentController::class, 'fetchService'])->name('fetchService');
route::post('/updateService', [App\Http\Controllers\procurmentController::class, 'updateService'])->name('updateService');
route::get('/deleteService', [App\Http\Controllers\procurmentController::class, 'deleteService'])->name('deleteService');


// ROUTE TO GET CONTRACT INFO FOR THE SALARY DEFINITION MODAL
Route::get('getData', [App\Http\Controllers\procurmentController::class, 'getData'])->name("getData");
route::post('/contractsDefinition', [App\Http\Controllers\procurmentController::class, 'contracts_definition'])->name('contractsDefinition');
route::get('/definedContracts', [App\Http\Controllers\procurmentController::class, 'definedContracts'])->name('definedContracts');

// ******************************************************BIDS SUBMISSION ROUTES*****************************************
route::get('/bidsIndex', [App\Http\Controllers\procurmentController::class, 'bidsIndex'])->name('bidsIndex');
route::get('/fetchbids', [App\Http\Controllers\procurmentController::class, 'fetchbids'])->name('fetchbids');
route::post('/bidsubmittedaction', [App\Http\Controllers\procurmentController::class, 'bidsubmittedaction'])->name('bidsubmittedaction');

route::get('/approvedContracts', [App\Http\Controllers\procurmentController::class, 'approvedContracts'])->name('approvedContracts');


//************************************* ROUTES FOR RENT AND LEASE */
route::get('/availablePropertiesIndex', [App\Http\Controllers\Rent_LeaseController::class, 'availablePropertiesIndex'])->name('availablePropertiesIndex');
route::post('/addProperty', [App\Http\Controllers\Rent_LeaseController::class, 'addProperty'])->name('addProperty');
route::post('/updateproperty', [App\Http\Controllers\Rent_LeaseController::class, 'updateproperty'])->name('updateproperty');
route::get('/deleteproperty', [App\Http\Controllers\Rent_LeaseController::class, 'deleteproperty'])->name('deleteproperty');

route::get('/assignPropertyIndex', [App\Http\Controllers\Rent_LeaseController::class, 'assignPropertyIndex'])->name('assignPropertyIndex');
route::get('/propertyInfo', [App\Http\Controllers\Rent_LeaseController::class, 'propertyInfo'])->name('propertyInfo');
route::get('/assignproperty', [App\Http\Controllers\Rent_LeaseController::class, 'assignproperty'])->name('assignproperty');
route::post('/updateAssignProperty', [App\Http\Controllers\Rent_LeaseController::class, 'updateAssignProperty'])->name('updateAssignProperty');

route::post('/submitReceipt', [App\Http\Controllers\Rent_LeaseController::class, 'submitReceipt'])->name('submitReceipt');

route::get('/propertiesInUseIndex', [App\Http\Controllers\Rent_LeaseController::class, 'propertiesInUseIndex'])->name('propertiesInUseIndex');
route::get('/fectchpropertiesInUse', [App\Http\Controllers\Rent_LeaseController::class, 'fectchpropertiesInUse'])->name('fectchpropertiesInUse');

/*********************************************************ROUTES FOR VENTURES**************************************************************** */
route::get('/venturesIndex', [App\Http\Controllers\venturesController::class, 'venturesIndex'])->name('venturesIndex');
route::get('/addVenture', [App\Http\Controllers\venturesController::class, 'addVenture'])->name('addVenture');
route::get('/updateVenture', [App\Http\Controllers\venturesController::class, 'updateVenture'])->name('updateVenture');
route::get('/deleteventure', [App\Http\Controllers\venturesController::class, 'deleteventure'])->name('deleteventure');

/*********************************************************ROUTES FOR RETURNS*************************************************************** */
route::get('/returnsIndex', [App\Http\Controllers\venturesController::class, 'returnsIndex'])->name('returnsIndex');
route::post('/submitReturns', [App\Http\Controllers\venturesController::class, 'submitReturns'])->name('submitReturns');
route::get('/fetchreturns', [App\Http\Controllers\venturesController::class, 'fetchreturns'])->name('fetchreturns');
route::get('/updateReturns', [App\Http\Controllers\venturesController::class, 'updateReturns'])->name('updateReturns');
route::get('/deleteReturns', [App\Http\Controllers\venturesController::class, 'deleteReturns'])->name('deleteReturns');

/*********************************************************ROUTES FOR INCOMING DONATIONS*************************************************************** */
route::get('/donationsIndex', [App\Http\Controllers\donationsController::class, 'donationsIndex'])->name('donationsIndex');
route::post('/addDonations', [App\Http\Controllers\donationsController::class, 'addDonations'])->name('addDonations');
route::post('/updateDonations', [App\Http\Controllers\donationsController::class, 'updateDonations'])->name('updateDonations');
route::get('/deleteDonations', [App\Http\Controllers\donationsController::class, 'deleteDonations'])->name('deleteDonations');

/*********************************************************ROUTES FOR OUTGOING DONATIONS*************************************************************** */
route::get('/outgoingDonationIndex', [App\Http\Controllers\donationsController::class, 'outgoingDonationIndex'])->name('outgoingDonationIndex');
route::post('/addoutgoingDonations', [App\Http\Controllers\donationsController::class, 'addoutgoingDonations'])->name('addoutgoingDonations');
route::post('/updateoutgoingDonations', [App\Http\Controllers\donationsController::class, 'updateoutgoingDonations'])->name('updateoutgoingDonations');
route::get('/deleteOutgoingDonations', [App\Http\Controllers\donationsController::class, 'deleteOutgoingDonations'])->name('deleteOutgoingDonations');
/*********************************************************ROUTES FOR PLEDGE*************************************************************** */
route::get('/pledgeIndex', [App\Http\Controllers\donationsController::class, 'pledgeIndex'])->name('pledgeIndex');
route::post('/addPledge', [App\Http\Controllers\donationsController::class, 'addPledge'])->name('addPledge');
route::post('/updatePledge', [App\Http\Controllers\donationsController::class, 'updatePledge'])->name('updatePledge');
route::get('/deletePledge', [App\Http\Controllers\donationsController::class, 'deletePledge'])->name('deletePledge');

/*********************************************************ROUTES FOR GRANTS*************************************************************** */
route::get('/grantsIndex', [App\Http\Controllers\donationsController::class, 'grantsIndex'])->name('grantsIndex');
route::post('/addGrant', [App\Http\Controllers\donationsController::class, 'addGrant'])->name('addGrant');
route::post('/updateGrant', [App\Http\Controllers\donationsController::class, 'updateGrant'])->name('updateGrant');
route::get('/deleteGrant', [App\Http\Controllers\donationsController::class, 'deleteGrant'])->name('deleteGrant');

/*********************************************************ROUTES FOR GRANTS*************************************************************** */
route::get('/scholarshipIndex', [App\Http\Controllers\donationsController::class, 'scholarshipIndex'])->name('scholarshipIndex');
route::post('/addScholarship', [App\Http\Controllers\donationsController::class, 'addScholarship'])->name('addScholarship');
route::post('/updateScholarship', [App\Http\Controllers\donationsController::class, 'updateScholarship'])->name('updateScholarship');
route::get('/deleteScholarship', [App\Http\Controllers\donationsController::class, 'deleteScholarship'])->name('deleteScholarship');

/*********************************************************ASSETS*************************************************************** */
route::get('/assetsIndex', [App\Http\Controllers\AssetsController::class, 'assetsIndex'])->name('assetsIndex');
route::post('/addAsset', [App\Http\Controllers\AssetsController::class, 'addAsset'])->name('addAsset');
route::get('/fetchAssets', [App\Http\Controllers\AssetsController::class, 'fetchAssets'])->name('fetchAssets');
route::post('/updateAsset', [App\Http\Controllers\AssetsController::class, 'updateAsset'])->name('updateAsset');
route::get('/deleteAsset', [App\Http\Controllers\AssetsController::class, 'deleteAsset'])->name('deleteAsset');

/*********************************************************Salary Schedule*************************************************************** */

route::get('/SalarySchedule', [App\Http\Controllers\SalaryScheduleController::class, 'salarySchedule'])->name('salarySchedule');
route::get('/addschedule', [App\Http\Controllers\SalaryScheduleController::class, 'addschedule'])->name('addschedule');




//**********************************************PAYROLL******************************************************************************************** */
route::get('/payroll', [App\Http\Controllers\payrollController::class, 'payroll'])->name('payroll');
route::get('/fetchpayroll', [App\Http\Controllers\payrollController::class, 'fetchpayroll'])->name('fetchpayroll');
route::get('/fetchmonths', [App\Http\Controllers\payrollController::class, 'fetchmonths'])->name('fetchmonths');

route::get('/payrollApprovalIndex', [App\Http\Controllers\payrollController::class, 'payrollApprovalIndex'])->name('payrollApprovalIndex');
route::get('/fetchStaffs', [App\Http\Controllers\payrollController::class, 'fetchStaffs'])->name('fetchStaffs');
route::get('/approvePayroll', [App\Http\Controllers\payrollController::class, 'approvePayroll'])->name('approvePayroll');





// **************************************CONSUMEABLES ROUTES******************************************************************** */
route::get('/consumeablesIndex', [App\Http\Controllers\consumeableController::class, 'consumeablesIndex'])->name('consumeablesIndex');
route::get('/fetchConsumables', [App\Http\Controllers\consumeableController::class, 'fetchConsumables'])->name('fetchConsumables');
route::get('/updateConsumeables', [App\Http\Controllers\consumeableController::class, 'updateConsumeables'])->name('updateConsumeables');

// **************************************CONSUMEABLES ROUTES***************************************************************************************** */
route::get('/expenditurePlanIndex', [App\Http\Controllers\budgetController::class, 'expenditurePlanIndex'])->name('expenditurePlanIndex');
route::post('/addExpenditure', [App\Http\Controllers\budgetController::class, 'addExpenditure'])->name('addExpenditure');
route::get('/fetchExpenditure', [App\Http\Controllers\budgetController::class, 'fetchExpenditure'])->name('fetchExpenditure');
route::get('/updateExpenditure', [App\Http\Controllers\budgetController::class, 'updateExpenditure'])->name('updateExpenditure');
route::get('/deleteExpenditure', [App\Http\Controllers\budgetController::class, 'deleteExpenditure'])->name('deleteExpenditure');
route::get('/incomePlanIndex', [App\Http\Controllers\budgetController::class, 'incomePlanIndex'])->name('incomePlanIndex');
route::get('/fetchincomePlan', [App\Http\Controllers\budgetController::class, 'fetchincomePlan'])->name('fetchincomePlan');
route::get('/addincomePlan', [App\Http\Controllers\budgetController::class, 'addincomePlan'])->name('addincomePlan');
route::get('/updateIncomePlan', [App\Http\Controllers\budgetController::class, 'updateIncomePlan'])->name('updateIncomePlan');
route::get('/deleteIncomePlan', [App\Http\Controllers\budgetController::class, 'deleteIncomePlan'])->name('deleteIncomePlan');

// *************************************************************FINANCIAL YEARS***************************************************************************** */
route::get('/financialYearIndex', [App\Http\Controllers\budgetController::class, 'financialYearIndex'])->name('financialYearIndex');
route::get('/addFinancialYear', [App\Http\Controllers\budgetController::class, 'addFinancialYear'])->name('addFinancialYear');
route::get('/updateFinancialYear', [App\Http\Controllers\budgetController::class, 'updateFinancialYear'])->name('updateFinancialYear');
route::get('/deleteFinancialYear', [App\Http\Controllers\budgetController::class, 'deleteFinancialYear'])->name('deleteFinancialYear');


//DOWNLOAD RECEIPTS
//route::post('/download_payslip', [Controller::class, 'downloadpdf'])->name('payslip');
Route::get('feesReceipt', [App\Http\Controllers\downloadReceiptsController::class, 'feesReceipt'])->name('feesReceipt');
Route::get('downloadSoa', [App\Http\Controllers\PDFController::class, 'downloadSoa'])->name('downloadSoa');

Route::get('disbursmentReceipt', [App\Http\Controllers\PDFController::class, 'disbursmentReceipt'])->name('disbursmentReceipt');
route::get('/getPayslipPDF', [App\Http\Controllers\PDFController::class, 'getPayslipPDF'])->name('getPayslipPDF');
route::get('/schoolFeesReceipt', [App\Http\Controllers\PDFController::class, 'schoolFeesReceipt'])->name('schoolFeesReceipt');

// STAFF RECORDS
route::get('/staffRecordsIndex', [App\Http\Controllers\Controller::class, 'staffRecordsIndex'])->name('staffRecordsIndex');
route::get('/viewStaffsRecord', [App\Http\Controllers\Controller::class, 'viewStaffsRecord'])->name('viewStaffsRecord');
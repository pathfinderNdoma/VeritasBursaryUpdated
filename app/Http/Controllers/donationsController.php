<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Donations;
use App\Models\OutgoingDonations;
use App\Models\pledge;
use App\Models\Grant;
use App\Models\Scholarship;
use App\Models\User;
use App\Models\ventures;
use Illuminate\Support\Facades\DB;
use App\Models\ventureReturn;
use crypt;
use Session;
use PDF;

class donationsController extends Controller
{
    public function donationsIndex()
    {
        {
           
            $data1 = User::where('staffNo', session()->get('staffNo'))->first();
            $donations = DB::table('bursary_donations')
              ->get();

            return view('/donations.incomingDonations')
                    ->with('donations',  $donations )
                    ->with('data1', $data1);
                    
        }   
    }





/*************************************************************************************************************************************** */
                                            // ADD DONATIONS STARTS
/*************************************************************************************************************************************** */

    public function addDonations(Request $request)
        {
             
         //*************************************************** */
         if(($request->hasFile('payment_receipt'))){
                   
            $payment_extension              =   $request->file('payment_receipt')->getClientOriginalExtension();
            $payment_receipt                =   'incoming_donations_payment_receipt'.time().'.'.$payment_extension;
                                       
            //************************** FIle UPLOAD *****************************
            $request->file('payment_receipt')->storeAs('public/payment_receipts', $payment_receipt);
            
            }

           
            //************************** IF PAYMENT RECEIPT FIle UPLOAD ENDS ****************************/
        
             //If the Donation letter is to be submitted
             if($request->hasFile('donation_letter')){
                    
                $donation_extension                =    $request->file('donation_letter')->getClientOriginalExtension();
                $donation_letter                =   'incoming_donations_donation_letter'.time().'.'.$donation_extension; 

                $request->file('donation_letter')->storeAs('public/donation_letters', $donation_letter);

            }

            

                //Save to database
               $addDonations                            =    new Donations();
               $addDonations->donor                     =     $request->input('donor');
               $addDonations->address                   =     $request->input('address');
               $addDonations->email                     =     $request->input('email');
               $addDonations->contact_no                =     $request->input('contact_no');
               $addDonations->amount_item               =     $request->input('amount_item');  
               $addDonations->purpose                   =     $request->input('purpose');
               $addDonations->donationDate              =     $request->input('donationDate');
               $addDonations->donationLetter            =     $donation_letter; 
               $addDonations->paymentReceipt            =     $payment_receipt   ;
               
   
               if($addDonations->save()){
                       
                   return redirect()->route('donationsIndex')
                           ->with('success', 'Donations Added');
                   
               }
               else{
                return redirect()->route('donationsIndex')
                           ->with('error', 'Adding donations failed. Kindly ensure you are uploading the right file');
            }
           

            //************************** IF FIle UPLOAD ****************************/
            }

        
         
              
    //****************************************************************************************************************^^^^^^^******************************** */ 
        public function updateDonations(Request $request)
        {
                
                
            
            //*************************************************** */
                if(($request->hasFile('update_payment_receipt'))){
                   
                $payment_extension              =   $request->file('update_payment_receipt')->getClientOriginalExtension();
                //$payment_receipt                =   'payment_receipt'.time().'.'.$payment_extension;
                $payment_receipt                =   'incoming_donations_payment_receipt'.time().'.'.$payment_extension;
                                           
                //************************** FIle UPLOAD *****************************
                $request->file('update_payment_receipt')->storeAs('public/payment_receipts', $payment_receipt);
                
                }

                else{
                    $payment_receipt =$request->update_payment_receiptVal;
                }

                //************************** IF PAYMENT RECEIPT FIle UPLOAD ENDS ****************************/
            
                 //If the Donation letter is to be submitted
                 if($request->hasFile('update_donation_letter')){
                        
                    $donation_extension                =    $request->file('update_donation_letter')->getClientOriginalExtension();
                   // $donation_letter                   =   'donation_letter'.time().'.'.$donation_extension;
                    $donation_letter                =   'incoming_donations_donation_letter'.time().'.'.$donation_extension ; 

                    $request->file('update_donation_letter')->storeAs('public/donation_letters', $donation_letter);

                }

                else{
                    $donation_letter =$request->update_donation_letterVal;
                }
                

                    
                
                $updateDonations                            =    Donations::where('id', $request->updateID)->first();
                $updateDonations->donor                     =    $request->input('update_donor');
                $updateDonations->address                   =     $request->input('update_address');
                $updateDonations->email                     =     $request->input('update_email');
                $updateDonations->contact_no                =     $request->input('update_contact_no');
                $updateDonations->amount_item               =     $request->input('update_amount_item');  
                $updateDonations->purpose                   =     $request->input('update_purpose');
                $updateDonations->donationDate              =     $request->input('update_donationDate');
                $updateDonations->donationLetter            =     $donation_letter; 
                $updateDonations->paymentReceipt            =     $payment_receipt;
                

                if($updateDonations->save()){
                        
                    return redirect()->route('donationsIndex')
                            ->with('success', 'Donation information updated successfully');
                    
                }


            
            
            }  
/*************************************************************************************************************************************** */                        
public function deleteDonations(Request $request)
{

    

$id = $request->id;

$delete = Donations::where('id', '=', $id)->first();
    if($delete->delete()){

        $paymentReceiptPath = 'public/payment_receipts'.$request->paymentReceipt;
        $donationLetterPath = 'public/donation_letters'.$request->donation_letter;
        
        //DELETE PAYMENT RECEIPT
        if (Storage::exists($paymentReceiptPath)) {

            //Delete the file
            Storage::delete($paymentReceiptPath);
        }

        if (Storage::exists($donationLetterPath)) {

            //Delete the file
            Storage::delete($donationLetterPath);
        }

            return redirect()->route('donationsIndex')
                    ->with('success', 'Donation Deleted Successfully');
    //END OF DELETE SECTION
    }

    else{
        return redirect()->route('DonationsIndexs')
                        ->with('error', 'Returns Not Deleted');
            } 

}  
 
/*************************************************************************************************************************************** */
                                            // OUTGOING DONATIONS
/*************************************************************************************************************************************** */
public function outgoingDonationIndex()
{
    {
       
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $donations = DB::table('bursary_outgoing_donations')
          ->get();


            
        return view('/donations.outgoingDonations')
                ->with('donations',  $donations )
                ->with('data1', $data1);
                
    }   
}
 /*************************************************************************************************************************************** */

    public function addoutgoingDonations(Request $request)
     {
             
            
        //*************************************************** */
        if(($request->hasFile('payment_receipt'))){
                   
            $payment_extension              =   $request->file('payment_receipt')->getClientOriginalExtension();
            $payment_receipt                =   'outgoing_donations_payment_receipt'.time().'.'.$payment_extension;
                                       
            //************************** FIle UPLOAD *****************************
            $request->file('payment_receipt')->storeAs('public/payment_receipts', $payment_receipt);
            
            }

       
        
             //If the Donation letter is to be submitted
             if($request->hasFile('donation_letter')){
                    
                $donation_extension                =    $request->file('donation_letter')->getClientOriginalExtension();
                $donation_letter                =   'outgoing_donations_donation_letter'.time().'.'.$payment_extension; 

                $request->file('donation_letter')->storeAs('public/donation_letters', $donation_letter);

            }
             
                
               
                //Save to database
               $addDonations                            =     new OutgoingDonations();
               $addDonations->beneficiary               =     $request->input('beneficiary');
               $addDonations->address                   =     $request->input('address');
               $addDonations->email                     =     $request->input('email');
               $addDonations->contact_no                =     $request->input('contact_no');
               $addDonations->amount_item               =     $request->input('amount_item');  
               $addDonations->purpose                   =     $request->input('purpose');
               $addDonations->donationDate              =     $request->input('donationDate');
               $addDonations->donationLetter            =     $donation_letter; 
               $addDonations->paymentReceipt            =     $payment_receipt   ;
               
   
               if($addDonations->save()){
                       
                   return redirect()->route('outgoingDonationIndex')
                           ->with('success', 'Donations Added');
                   
               }


            else{
                return redirect()->route('outgoingDonationIndex')
                           ->with('error', 'Adding donations failed. Kindly ensure you are uploading the right file');
            }
            //************************** IF FIle UPLOAD ****************************/
            }
           
         
        
/*************************************************************************************************************************************** */

                    public function updateoutgoingDonations(Request $request)
                    {
                            
                            
                        
                        //*************************************************** */
                            if(($request->hasFile('update_payment_receipt'))){
                               
                            $payment_extension              =   $request->file('update_payment_receipt')->getClientOriginalExtension();
                            $payment_receipt                =   'outgoing_donations_payment_receipt'.time().'.'.$payment_extension;
                                                        
                            //************************** FIle UPLOAD *****************************
                            $request->file('update_payment_receipt')->storeAs('public/payment_receipts', $payment_receipt);
                            
                            }

                            else{
                                $payment_receipt =$request->update_payment_receiptVal;
                            }

                            //************************** IF PAYMENT RECEIPT FIle UPLOAD ENDS ****************************/
                        
                             //If the Donation letter is to be submitted
                             if($request->hasFile('update_donation_letter')){
                                    
                                $donation_extension                =    $request->file('update_donation_letter')->getClientOriginalExtension();
                                $donation_letter                   =   'outgoing_donations_donation_letter'.time().'.'.$donation_extension;

                                $request->file('update_donation_letter')->storeAs('public/donation_letters', $donation_letter);

                            }

                            else{
                                $donation_letter =$request->update_donation_letterVal;
                            }
                            //If the Donation letter is to be submitted ens

                                
                            
                                //Save to database
                            $addDonations                            =    OutgoingDonations::where('id', $request->update_id)->first();
                            $addDonations->beneficiary               =    $request->input('update_beneficiary');
                            $addDonations->address                   =     $request->input('update_address');
                            $addDonations->email                     =     $request->input('update_email');
                            $addDonations->contact_no                =     $request->input('update_contact_no');
                            $addDonations->amount_item               =     $request->input('update_amount_item');  
                            $addDonations->purpose                   =     $request->input('update_purpose');
                            $addDonations->donationDate              =     $request->input('update_donationDate');
                            $addDonations->donationLetter            =     $donation_letter; 
                            $addDonations->paymentReceipt            =     $payment_receipt   ;
                            

                            if($addDonations->save()){
                                    
                                return redirect()->route('outgoingDonationIndex')
                                        ->with('success', 'Donation information updated successfully');
                                
                            }


                        
                        
                        }    
                        
/*************************************************************************************************************************************** */                        
        public function deleteOutgoingDonations(Request $request)
            {
            
                

            $id = $request->id;
            $delete = OutgoingDonations::where('id', $id)->first();
                if($delete->delete()){

                    $paymentReceiptPath = 'public/payment_receipts'.$request->paymentReceipt;
                    $donationLetterPath = 'public/donation_letters'.$request->paymentReceipt;
                    
                    //DELETE PAYMENT RECEIPT
                    if (Storage::exists($paymentReceiptPath)) {

                        //Delete the file
                        Storage::delete($paymentReceiptPath);

                        return redirect()->route('outgoingDonationIndex')
                                ->with('success', 'Donation Deleted Successfully');
                    }


                //DELETE PAYMENT RECEIPT
                if (Storage::exists($donationLetterPath)) {

                    //Delete the file
                    Storage::delete($donationLetterPath);
                }
                 
                //END OF DELETE SECTION
                }

                else{
                    return redirect()->route('fetchreturns', ['fyear'=> $request->created_at])
                                    ->with('error', 'Returns Not Deleted');
                        } 
    
            }









  /*************************************************************************************************************************************** */
                                            // PLEDGE
/*************************************************************************************************************************************** */
        public function pledgeIndex()
            {
                {
                
                    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                    $pledge = DB::table('bursary_pledges')
                      ->get();
        
                    return view('/donations.pledge')
                            ->with('pledge',  $pledge)
                            ->with('data1', $data1);
                            
                }   
            }
/*************************************************************************************************************************************** */

public function addPledge(Request $request)
{
        
       //*************************************************** */
       if(($request->hasFile('pledgePayment_receipt'))){
                               
        $pledgePayment_extension              =   $request->file('pledgePayment_receipt')->getClientOriginalExtension();
        $pledgePayment_receipt          =   'pledgePayment_receipt'.time().'.'.$pledgePayment_extension;
                                    
        //************************** FIle UPLOAD *****************************
        $request->file('pledgePayment_receipt')->storeAs('public/pledges/',  $pledgePayment_receipt);
        
        }

        else{
            $pledgePayment_receipt ='';
        }

        //************************** IF PAYMENT RECEIPT FIle UPLOAD ENDS ****************************/
    
         //If the Donation letter is to be submitted
         if($request->hasFile('pledgeNote')){
                
            $pledgeNote_extension                =    $request->file('pledgeNote')->getClientOriginalExtension();
            $pledgeNote                          =   'pledge_note'.time().'.'.$pledgeNote_extension;

            $request->file('pledgeNote')->storeAs('public/pledges/', $pledgeNote);

        }

  
           //Save to database
          $addPledge                            =    new pledge();
          $addPledge->donor                     =    $request->input('donor');
          $addPledge->address                   =     $request->input('address');
          $addPledge->email                     =     $request->input('email');
          $addPledge->contact_no                =     $request->input('contact_no');
          $addPledge->amount_item               =     $request->input('amount_item');  
          $addPledge->purpose                   =     $request->input('purpose');
          $addPledge->pledgeDate                =     $request->input('pledgeDate');
          $addPledge->redemptionDate            =     $request->input('redemptionDate');
          $addPledge->pledgeStatus              =     $request->input('pledge_status');
          $addPledge->PledgeNote                =     $pledgeNote;
          $addPledge->paymentReceipt            =     $pledgePayment_receipt;
          

          if($addPledge->save()){
                  
              return redirect()->route('pledgeIndex')
                      ->with('success', 'Pledge Added');
              
          }

}
/*************************************************************************************************************************************** */



        public function updatePledge(Request $request)
        {
                
            
            //*************************************************** */
                if(($request->hasFile('update_payment_receipt'))){
                    
                $payment_extension              =   $request->file('update_payment_receipt')->getClientOriginalExtension();
                $pledgePayment_receipt                =   'payment_receipt'.time().'.'.$payment_extension;
                
                                            
                //************************** FIle UPLOAD *****************************
                $request->file('update_payment_receipt')->storeAs('public/pledges', $pledgePayment_receipt);
                
                }

                else{
                    $pledgePayment_receipt =$request->paymentReceiptVal;
                    
                }

                //************************** IF PAYMENT RECEIPT FIle UPLOAD ENDS ****************************/
            
                    //If the Donation letter is to be submitted
                    if($request->hasFile('update_pledgeNote')){
                        
                    $donation_extension                =    $request->file('update_pledgeNote')->getClientOriginalExtension();
                    $pledgeNote                   =   'pledge_note'.time().'.'.$donation_extension;

                    $request->file('update_pledgeNote')->storeAs('public/pledges', $pledgeNote);

                }

                else{
                    $pledgeNote  =$request->pledgeNoteVal;
                }
                //If the Donation letter is to be submitted ens

                    
                
                    //Save to database
                $updatePledge                            =    pledge::where('id', '=', $request->update_id)->first();
                $updatePledge->donor                     =    $request->input('update_donor');
                $updatePledge->address                   =     $request->input('update_address');
                $updatePledge->email                     =     $request->input('update_email');
                $updatePledge->contact_no                =     $request->input('update_contact_no');
                $updatePledge->amount_item               =     $request->input('update_amount_item');  
                $updatePledge->purpose                   =     $request->input('update_purpose');
                $updatePledge->pledgeDate                =     $request->input('update_pledgeDate');
                $updatePledge->redemptionDate            =     $request->input('update_redemptionDate');
                $updatePledge->pledgeStatus              =     $request->input('update_pledge_status');
                $updatePledge->PledgeNote                =     $pledgeNote;
                $updatePledge->paymentReceipt            =     $pledgePayment_receipt;
                

                if($updatePledge->save()){
                        
                    return redirect()->route('pledgeIndex')
                            ->with('success', 'Pledge Information Updated Successfully');
                    
                }


            
            
                        }    
                        
// /*************************************************************************************************************************************** */                        
        public function deletePledge(Request $request)
            {
            
                

            $id = $request->id;
            $delete = pledge::where('id', $id)->first();
                if($delete->delete()){

                    $paymentReceiptPath = 'public/pledges'.$request->paymentReceipt;
                    $pledgeNotePath = 'public/pledges'.$request->pledgeNote;
                    
                    //DELETE PAYMENT RECEIPT
                    if (Storage::exists($paymentReceiptPath)) {

                        //Delete the file
                        Storage::delete($paymentReceiptPath);

                    }


                //DELETE PAYMENT RECEIPT
                if (Storage::exists($pledgeNotePath)) {

                    //Delete the file
                    Storage::delete($pledgeNotePath);
                }
                 
                //END OF DELETE SECTION
                
                return redirect()->route('pledgeIndex')
                ->with('success', 'Donation Deleted Successfully');


                }

                else{
                    return redirect()->route('pledgeIndex', ['fyear'=> $request->created_at])
                                    ->with('error', 'Returns Not Deleted');
                        } 
    
            }
/*************************************************************************************************************************************** */
                                            // GRANTS
/*************************************************************************************************************************************** */ 
public function grantsIndex()
            {
                {
                
                    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                    $grants = DB::table('bursary_grants')
                      ->get();
        
                    return view('/grants.grants')
                            ->with('grants',  $grants)
                            ->with('data1', $data1);
                            
                }   
            }

/*************************************************************************************************************************************** */


                    public function addGrant(Request $request)
                    {
                        
    //**************************************************************************************************************************************** */
                        if(($request->hasFile('awardLetter'))){

                            $award_letter_extension              =   $request->file('awardLetter')->getClientOriginalExtension();
                            $award_letter                        =   'award_letter'.time().'.'.$award_letter_extension ;
                                                        
                            //************************** FIle UPLOAD *****************************
                            $request->file('awardLetter')->storeAs('public/grants/award_letter/',  $award_letter);
                            
                            }

  
                            
                            //Save to database
                            $addGrant                             =     new Grant();
                            $addGrant->awardingBody               =     $request->input('awardingBody');
                            $addGrant->amount                     =     $request->input('amount');
                            $addGrant->awardingDate               =     $request->input('awardingDate');
                            $addGrant->awardLetter                =     $award_letter ;
                            $addGrant->PIName                     =     $request->input('PIName');  
                            $addGrant->PIStaffNo                  =     $request->input('PIStaffNo');
                            $addGrant->CoInvestigators            =     $request->input('coInvestigators');
                            $addGrant->grantProcessingFee         =     $request->input('processingFee');
                            $addGrant->status                     =     $request->input('status');
                            $addGrant->redemptionDate             =     $request->input('redemptionDate');
                            

                            if($addGrant->save()){
                                    
                                return redirect()->route('grantsIndex')
                                        ->with('success', 'Grant Added Successfully');
                                
                            }

                    }
/*************************************************************************************************************************************** */
            /*************************************************************************************************************************************** */
public function updateGrant(Request $request)
{
      

    if(($request->hasFile('update_awardLetter'))){
        
        $award_letter_extension              =   $request->file('update_awardLetter')->getClientOriginalExtension();
        $award_letter                        =   'award_letter'.time().'.'.$award_letter_extension ;
                                    
        //************************** FIle UPLOAD *****************************
        $request->file('update_awardLetter')->storeAs('public/award_letter/',  $award_letter);
        
        }
        else{
            
            $award_letter = $request->update_awardLetterVal;  
        }
        
         //Save to database
                    $updateGrant                             =     Grant::where('id', '=', $request->update_ID)->first();
                    $updateGrant->awardingBody               =     $request->input('update_awardingBody');
                    $updateGrant->amount                     =     $request->input('update_amount');
                    $updateGrant->awardingDate               =     $request->input('update_awardingDate');
                    $updateGrant->awardLetter                =     $award_letter ;
                    $updateGrant->PIName                     =     $request->input('update_PIName');  
                    $updateGrant->PIStaffNo                  =     $request->input('update_PIStaffNo');
                    $updateGrant->CoInvestigators            =     $request->input('update_coInvestigators');
                    $updateGrant->grantProcessingFee         =     $request->input('update_processingFee');
                    $updateGrant->status                     =     $request->input('update_status');
                    $updateGrant->redemptionDate             =     $request->input('update_redemptionDate');
                    

                    if($updateGrant->save()){
                            
                        return redirect()->route('grantsIndex')
                                ->with('success', 'Grant Added Successfully');
                        
                    }

            }
                
// /*************************************************************************************************************************************** */
                        
// /*************************************************************************************************************************************** */

/*************************************************************************************************************************************** */                        
                public function deleteGrant(Request $request)
                {

                    

                $id = $request->id;
                $delete = Grant::where('id', $id)->first();
                    if($delete->delete()){

                        $awardLetterPath = 'public/scholarships'.$request->awardLetter;
                        
                        
                        //DELETE PAYMENT RECEIPT
                        if (Storage::exists($awardLetterPath)) {

                            //Delete the file
                            Storage::delete($awardLetterPath);

                        }


                    
                    //END OF DELETE SECTION
                    
                    return redirect()->route('grantsIndex')
                    ->with('success', 'Granted Deleted Successfully');


                    }

                    else{
                        return redirect()->route('grantsIndex')
                                        ->with('error', 'Grant Not Deleted');
                            } 

                }





/*************************************************************************************************************************************** */
                                            // GRANTS
/*************************************************************************************************************************************** */ 
public function scholarshipIndex()
            {
                                
                    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                    $scholarship = DB::table('bursary_scholarships')
                      ->get();
                    return view('/scholarships.scholarship')
                            ->with('scholarshp',  $scholarship)
                            ->with('data1', $data1);              
                
            }

/*************************************************************************************************************************************** */

public function addScholarship(Request $request)
{
        
       
       
   //*************************************************** */
       if(($request->hasFile('awardLetter'))){
            
           //If the Donation letter is to be submitted
           if($request->hasFile('awardLetter')){
               
               $awardLetter_extension                =    $request->file('awardLetter')->getClientOriginalExtension();
               $awardLetter                   =   'award_letter'.time().'.'.$awardLetter_extension;

               $request->file('awardLetter')->storeAs('public/scholarships', $awardLetter);

           }

        }

          
           //Save to database
          $addScholarship                            =     new Scholarship();
          $addScholarship->studentName               =     $request->input('name');
          $addScholarship->matricNo                  =     $request->input('matricNo');
          $addScholarship->department                =     $request->input('department');
          $addScholarship->amount                    =     $request->input('amount');
          $addScholarship->awardDate                 =     $request->input('awardDate');  
          $addScholarship->award_letter              =     $awardLetter;
          

          if($addScholarship->save()){
                  
              return redirect()->route('scholarshipIndex')
                      ->with('success', 'Scholarship Added');
              
          }


       else{
           return redirect()->route('outgoingDonationIndex')
                      ->with('error', 'Adding donations failed. Kindly ensure you are uploading the right file');
       }
       //************************** IF FIle UPLOAD ****************************/
       
      
    
   }
/*************************************************************************************************************************************** */

        public function updateScholarship(Request $request)
        {
                
            
                //*************************************************** */
                    if(($request->hasFile('update_awardLetter'))){
                    
                    $payment_extension              =   $request->file('update_awardLetter')->getClientOriginalExtension();
                    $update_awardLetter             =   'payment_receipt'.time().'.'.$payment_extension;
                    
                                                
                    //************************** FIle UPLOAD *****************************
                    $request->file('update_awardLetter')->storeAs('public/pledges', $update_awardLetter);
                    
                    }

                    else{
                        $update_awardLetter =$request->wardLetterVal;
                    }

    //************************** IF PAYMENT RECEIPT FIle UPLOAD ENDS ****************************/
            
                
                 //Save to database
                $updateScholarship                            =    Scholarship::where('id', '=', $request->update_ID)->first();
                $updateScholarship->studentName               =     $request->input('update_name');
                $updateScholarship->matricNo                  =     $request->input('update_matricNo');
                $updateScholarship->department                =     $request->input('update_department');
                $updateScholarship->amount                    =     $request->input('update_amount');
                $updateScholarship->awardDate                 =     $request->input('update_awardDate');  
                $updateScholarship->award_letter              =     $update_awardLetter;
                

                if($updateScholarship   ->save()){
                        
                    return redirect()->route('scholarshipIndex')
                            ->with('success', 'Scholarship Information Updated Successfully');
                    
                }


            
            
                        }    
                        
// /*************************************************************************************************************************************** */

/*************************************************************************************************************************************** */                        
public function deleteScholarship(Request $request)
{

    

$id = $request->id;
$delete = Scholarship::where('id', $id)->first();
    if($delete->delete()){

        $award_letertPath = 'public/scholarships'.$request->award_letter;
        
        
        //DELETE PAYMENT RECEIPT
        if (Storage::exists($award_letertPath)) {

            //Delete the file
            Storage::delete($award_letertPath);

        }


     
    //END OF DELETE SECTION
    
    return redirect()->route('scholarshipIndex')
    ->with('success', 'Scholarship Deleted Successfully');


    }

    else{
        return redirect()->route('scholarshipIndex')
                        ->with('error', 'Scholarship Not Deleted');
            } 
}


}

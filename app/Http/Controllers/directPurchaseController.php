<?php

namespace App\Http\Controllers;
use App\Http\Controllers\includesController;
use App\Models\Asset;
use Illuminate\Http\Request;
use App\Models\staffBursaryData;
use App\Models\User;
use App\Models\DirectPurchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use crypt;
use Session;
use PDF;


class directPurchaseController extends Controller
{


            public function directpurchaseIndex(Request $request)
                {
                //    contracts = DB::table('bursary_contracts')
                //     ->where('status', 'open')
                //     ->where(function ($query) {
                //         $query->where('approval_status', '!=', 'Approve')
                //               ->orWhereNull('approval_status');
                //     })
                //     ->orderByDesc('created_at')
                //     ->get();


                    $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                    $department = DB::table('bursary_faculties')->distinct()->get('department');
                    $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
                    $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');


                    return view('/procurment.directpurchase')
                            ->with('data1', $data1)
                            ->with('departments', $department)
                            ->with('financial_year', $f_year)
                            ->with('faculties', $faculties);

                }



/*********************************************************************************************************************888888888888888888****************** */

            public function addDirectPurchase(Request $request)
            {

                $numinput = '0123456789';
                        $numstrength = 5;
                        $input_length = strlen($numinput);
                        $num = '';
                        for($i = 0; $i < $numstrength; $i++) {
                            $random_num = $numinput[mt_rand(0, $input_length - 1)];
                            $num.= $random_num;
                        }
                    
                        //Generating character
                        $charinput = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charstrength = 4;
                        $input_length = strlen($charinput);
                        $char = '';
                        for($i = 0; $i < $charstrength; $i++) {
                            $random_char = $charinput[mt_rand(0, $input_length - 1)];
                            $char.= $random_char;
                        }
                    
                        $itemID      = $num.$char;


                  $staffNo = User::where('staffNo', session()->get('staffNo'))->first();
                  //Verify if the staff Number is correct

                  if($staffNo->staffNo==$request->staffNumber){

                   //*************************************************** */
                   if(($request->hasFile('receipt'))){

                    $receipt_extension              =   $request->file('receipt')->getClientOriginalExtension();
                    $purchase_receipt          =   'pruchase_receipt'.time().'.'.$receipt_extension ;


                    //Upload file
                    $request->file('receipt')->storeAs('public/directPurchases_receipts/',   $purchase_receipt);

                    }

                    
                //If it is saved, save also to fixed asset table if it is asset
                if($request->itemNature=='Asset'){
                    $quantity = '';
                    
                    //If it is building
                    if($request->assetType=='land'){
                        $quantity = '';
                        $adddLandAsset                                      =    new Asset();
                        $adddLandAsset->assetID                         =    $itemID;
                        $adddLandAsset ->assetType                       =    $request->input('assetType');
                        $adddLandAsset->landSize                        =    $request->input('quantity');
                        $adddLandAsset->land_datePurchased              =    $request->input('datePurchased');
                        $adddLandAsset->landAmount                      =    $request->input('unitPrice');
                        $adddLandAsset->landReceipt                     =     $purchase_receipt;
                        $adddLandAsset->save();

                        //Upload file
                    $request->file('receipt')->storeAs('public/Assets_Receipts/',   $purchase_receipt);
                    }

                    //If it is building
                    elseif($request->assetType=='building'){
                        $quantity = '';
                        $adddbuildingAsset                                      =    new Asset();
                        $adddbuildingAsset ->assetID                         =    $itemID;
                        $adddbuildingAsset ->buildingName                    =    $request->input('itemName');
                        $adddbuildingAsset ->assetType                       =    $request->input('assetType');
                        $adddbuildingAsset ->buildingAmount                  =    $request->input('unitPrice');
                        $adddbuildingAsset ->dateofCompletion                =    $request->input('datePurchased');
                        $adddbuildingAsset ->buildingReceipt                 =     $purchase_receipt;
                        $adddbuildingAsset ->landReceipt                     =     '';

                        $adddbuildingAsset->save();
                        //Upload file
                    $request->file('receipt')->storeAs('public/Assets_Receipts/',   $purchase_receipt);
                    }

                    //If it is equipment
                    elseif($request->assetType=='equipment'){
                        $quantity = $request->quantity;

                        $adddequipmentAsset                                   =    new Asset();
                        $adddequipmentAsset->assetID                         =    $itemID;
                        $adddequipmentAsset ->equipmentName                   =    $request->input('itemName');
                        $adddequipmentAsset ->quantity                        =    $quantity;
                        $adddequipmentAsset ->equipmentUnitCost               =    $request->input('unitPrice')*$quantity;
                        $adddequipmentAsset ->datePurchased                   =    $request->input('datePurchased');
                        $adddequipmentAsset ->equipmentReceipt                =     $purchase_receipt;
                        
                        $adddequipmentAsset->save();
                        //Upload file
                    $request->file('receipt')->storeAs('public/Assets_Receipts/',   $purchase_receipt);
                    }
                    
                }

                //IF it is consumeables
                else{
                    $quantity = $request->quantity;
                   }


                    $total_price = $request->unitPrice*$request->quantity;
                       //Save to database
                      $adddirectPurchase                              =    new DirectPurchase();
                      $adddirectPurchase->itemName                    =    $request->input('itemName');
                      $adddirectPurchase->itemNature                  =     $request->input('itemNature');
                      $adddirectPurchase->quantity                    =      $quantity;
                      $adddirectPurchase->unitPrice                   =     $request->input('unitPrice');
                      $adddirectPurchase->totalPrice                  =      $total_price;  
                      $adddirectPurchase->datePurchased               =     $request->input('datePurchased');
                      $adddirectPurchase->purchaseBy                  =     $request->input('purchaseBy');
                      $adddirectPurchase->staffNumber                 =     $request->input('staffNumber');
                      $adddirectPurchase->designation                 =     $request->input('designation');
                      $adddirectPurchase->receipt                     =     $purchase_receipt;
                      $adddirectPurchase->itemID                      =     $itemID;


                      if($adddirectPurchase->save()){

                
                

    //********************IF it is an asset item purchase, also save the information in the asset table*******************
                        


    //********************IF it is an asset item purchase, also save the information in the asset table*******************
                          return redirect()->route('directpurchaseIndex')
                                  ->with('success', 'Direct Purchase Added');

                      }

            }
            //Closing brace of staff number verification above: Else statement is below
            else{
                return redirect()->route('directpurchaseIndex')
                ->with('error', 'Purchase not added, Invalid Staff number'); 
            }


        }
 //************************************************************************************************************************************************ */
 public function fetchDirectPurchase(Request $request)
 {
                $purchases = DB::table('bursary_direct_purchases')
                ->whereYear('datePurchased', $request->year)
                ->get();

                $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                $department = DB::table('bursary_faculties')->distinct()->get('department');
                $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
                $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');


     return view('/procurment.directpurchase')
             ->with('purchases', $purchases)
             ->with('data1', $data1)
             ->with('departments', $department)
             ->with('financial_year', $f_year)
             ->with('faculties', $faculties);

 }



//****************************************************************************************************************^^^^^^^******************************** */ 
public function updateDirectPurchase(Request $request)
{
        
    //*************************************************** */
    if(($request->hasFile('receipt'))){

        $receipt_extension              =   $request->file('receipt')->getClientOriginalExtension();
        $purchase_receipt          =   'pruchase_receipt'.time().'.'.$receipt_extension ;


        //Upload file
        $request->file('receipt')->storeAs('public/directPurchases_receipts/',   $purchase_receipt);

        }

        else{
            $purchase_receipt =$request->update_receiptVal;
        }

        $total_price = $request->update_unitPrice*$request->update_quantity; 
        $update_directPurchase                               =    DirectPurchase::where('id', $request->update_id)->first();
        $update_directPurchase->itemName                    =    $request->input('update_itemName');
        $update_directPurchase->itemNature                  =     $request->input('update_itemNature');
        $update_directPurchase->quantity                    =     $request->input('update_quantity');
        $update_directPurchase->unitPrice                   =     $request->input('update_unitPrice');
        $update_directPurchase->totalPrice                  =      $total_price;  
        $update_directPurchase->datePurchased               =     $request->input('update_datePurchased');
        $update_directPurchase->purchaseBy                  =     $request->input('update_purchaseBy');
        $update_directPurchase->staffNumber                 =     $request->input('update_staffNumber');
        $update_directPurchase->designation                 =     $request->input('update_designation');
        $update_directPurchase->receipt                     =     $purchase_receipt;
        

        if($update_directPurchase->save()){
                
            return redirect()->route('fetchDirectPurchase')
                   ->with('year', $request->update_datePurchased)
                    ->with('success', 'Purchase updated successfully');
            
        }
    
    }  

// ****************** ***************************************DeleteSERVICES***********************************************************************************
public function deleteDirectPurchase(Request $request)
{

                $id = $request->id;

                $delete = DirectPurchase::where('id', '=', $id)->first();
                if($delete->delete()){

                    $receipt = 'public/directPurchases_receipts'.$request->receipt;
                    
                    //DELETE PAYMENT RECEIPT
                    if (Storage::exists($receipt)) {

                        //Delete the file
                        Storage::delete($receipt);
                    }

                return redirect()->route('fetchDirectPurchase')
                            ->with('year', $request->datePurchased)
                            ->with('success', 'Service Deleted Successfully');
                //END OF DELETE SECTION
                }

                
                }  
// ****************** ***************************************DeleteSERVICES***********************************************************************************


}
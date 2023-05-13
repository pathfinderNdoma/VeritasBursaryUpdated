<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\staffBursaryData;
use App\Models\User;
use App\Models\Asset;
use Illuminate\Support\Facades\DB;
use crypt;
use Session;
use PDF;

use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function assetsIndex(Request $request)
    {
    
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $department = DB::table('bursary_faculties')->distinct()->get('department');
        $faculties = DB::table('bursary_faculties')->distinct()->get('faculty');
        $f_year = DB::table('bursary_financial_years')->distinct()->pluck('year');
        
        
        
            
        return view ('/audit.fixedAssets')
                ->with('data1', $data1)
                ->with('departments', $department)
                ->with('financial_year', $f_year)
                ->with('faculties', $faculties);
                
    }
// ***********************************************************************************************************************************************************

public function fetchAssets(Request $request)
{
            $data1          = User::where('staffNo', session()->get('staffNo'))->first();
            $department     = DB::table('bursary_faculties')->distinct()->get('department');
            $faculties      = DB::table('bursary_faculties')->distinct()->get('faculty');
            $f_year         = DB::table('bursary_financial_years')->distinct()->pluck('year');

           
                if($request->item_nature=='land'){
                    $assets  = DB::table('bursary_assets')
                    ->where('assetType', $request->item_nature)
                    ->whereYear('land_datePurchased', $request->year)
                    ->get();
                    
                }

                elseif($request->item_nature=='building'){
                    $assets  = DB::table('bursary_assets')
                    ->where('assetType', $request->item_nature)
                    ->whereYear('dateofCompletion', $request->year)
                    ->get();
                    
                }

                elseif($request->item_nature=='equipment'){
                    $assets  = DB::table('bursary_assets')
                    ->where('assetType', $request->item_nature)
                    ->whereYear('datePurchased', $request->year)
                    ->get();
                    
                }
                // return  $assets;
                return view('/audit.fixedAssets')
                ->with('assets', $assets)
                ->with('itemNature', $request->item_nature)
                ->with('data1', $data1)
                ->with('departments', $department)
                ->with('financial_year', $f_year)
                ->with('faculties', $faculties);

    
        
   
            
}
// *************************************************************************************************************************************************************

public function addAsset(Request $request)
    {
        
        //*********************If it is land*******************************
        if($request->itemNature=='land'){
            if(($request->hasFile('landReceipt'))){
                                       
                $landreceipt_extension              =   $request->file('landReceipt')->getClientOriginalExtension();
                $land_receipt          =   'landReceipt'.time().'.'.$landreceipt_extension ;
             
                                            
                //Upload file
                $request->file('landReceipt')->storeAs('public/Assets_Receipts/',   $land_receipt);
                
                }
                $addlandAsset                          =    new Asset();
                $addlandAsset->assetType               =    $request->input('itemNature');
                $addlandAsset->landSize                =    $request->input('landSize');
                $addlandAsset->landAmount              =    $request->input('landAmount');
                $addlandAsset->landLocation            =    $request->input('landLocation');
                $addlandAsset->land_datePurchased      =    $request->input('land_datePurchased');
                $addlandAsset->sightedBy               =    $request->input('sightedBy');
                $addlandAsset->sighteby_designation    =    $request->input('sighteby_designation');
                $addlandAsset->dateofSightation        =    $request->input('dateofSightation');
                $addlandAsset->landReceipt             =    $land_receipt;
                $addlandAsset->buildingReceipt         =    '';
                $addlandAsset->equipmentReceipt        =    '';
            


            if($addlandAsset->save()){

                
                return redirect()->route('fetchAssets', ['year'=>$request->land_datePurchased, 'item_nature'=>$request->itemNature])
                        ->with('success', 'Assets Added');
                
            }
        }

    // **********************************************************IF IT IS A BUILDDING **********************************************************************
                    if($request->itemNature=='building'){
                        // return $request->input('sightedBy');
                            if(($request->hasFile('buildingReceipt'))){
                                                   
                                $buildingreceipt_extension              =   $request->file('buildingReceipt')->getClientOriginalExtension();
                                $building_receipt          =   'buildingReceipt'.time().'.'.$buildingreceipt_extension ;
                             
                                                            
                                //Upload file
                                $request->file('buildingReceipt')->storeAs('public/Assets_Receipts/',   $building_receipt);
                                
                                }

                        $addbuildingAsset                                    =       new Asset();
                        $addbuildingAsset->assetType                         =       $request->input('itemNature');
                        $addbuildingAsset->buildingName                      =       $request->input('buildingName');
                        $addbuildingAsset->buildingLocation                  =       $request->input('buildingLocation');
                        $addbuildingAsset->constructed_donatedBy             =       $request->input('constructed_donatedBy');
                        $addbuildingAsset->buildingAmount                    =       $request->input('buildingAmount');
                        $addbuildingAsset->dateofCompletion                  =       $request->input('dateofCompletion');
                        $addbuildingAsset->buildingsupervisedBy              =       $request->input('buildingsupervisedBy');
                        $addbuildingAsset->sightedBy                             =       $request->input('sightedBy');
                        $addbuildingAsset->sighteby_designation                  =       $request->input('sighteby_designation');
                        $addbuildingAsset->dateofSightation                      =       $request->input('dateofSightation');
                        $addbuildingAsset->buildingReceipt                   =       $building_receipt;
                        $addbuildingAsset->landReceipt                       =       '';
                        $addbuildingAsset->equipmentReceipt                  =       '';

    
                        if($addbuildingAsset->save()){
                            return redirect()->route('fetchAssets', ['year'=>$request->dateofCompletion, 'item_nature'=>$request->itemNature])
                            ->with('success', 'Assets Added'); 
                        }
                    }
// **********************************************************IF IT IS A BUILDDING **************************************************************************
// **********************************************************IF IT IS AN EQUIPMENT *************************************************************************
                    if($request->itemNature=='equipment'){
                        if(($request->hasFile('equipmentReceipt'))){
                                           
                            $equipmentreceipt_extension              =   $request->file('equipmentReceipt')->getClientOriginalExtension();
                            $equipmentreceipt          =   'equipmentReceipt'.time().'.'.$equipmentreceipt_extension ;
                         
                                                        
                            //Upload file
                            $request->file('equipmentReceipt')->storeAs('public/Assets_Receipts/',   $equipmentreceipt);
                            
                            }
                        $addequipmentAsset                                              =   new Asset();
                        $addequipmentAsset->assetType                                   =   $request->input('itemNature');
                        $addequipmentAsset ->equipmentName                              =   $request->input('equipmentName');
                        $addequipmentAsset ->quantity                                   =   $request->input('quantity');
                        $addequipmentAsset ->equipmentUnitCost                          =   $request->input('equipmentUnitCost');
                        $addequipmentAsset ->datePurchased                              =   $request->input('datePurchased_constructed');
                        $addequipmentAsset ->purchaseBy                                 =   $request->input('purchased_supervisedBy');
                        $addequipmentAsset ->designation                                =   $request->input('designation');
                        $addequipmentAsset ->staffnumber                                =   $request->input('staffnumber');
                        $addequipmentAsset ->controlBy                                  =   $request->input('controlBy');
                        $addequipmentAsset ->inUseAt                                    =   $request->input('inUseAt');
                        $addequipmentAsset->equipmentReceipt                            =   $equipmentreceipt ;
                        $addequipmentAsset->sightedBy                                   =   $request->input('sightedBy');
                        $addequipmentAsset->sighteby_designation                        =   $request->input('sighteby_designation');
                        $addequipmentAsset->dateofSightation                            =   $request->input('dateofSightation');
                        $addequipmentAsset->LandReceipt                                 =       '';
                        $addequipmentAsset->buildingReceipt                             =       '';

                        if($addequipmentAsset->save()){
                            return redirect()->route('fetchAssets', ['year'=>$request->datePurchased_constructed,
                             'item_nature'=>$request->itemNature])
                            ->with('success', 'Assets Added');  
                        }
            }
        }
// *********************************************************IF IT IS AN EQUIPMENT ENDS************************************************************************  

                    public function updateAsset(Request $request)
                    {   
                        
                        if($request->update_itemNature=='land'){
                            

                            if(($request->hasFile('update_landReceipt'))){
                               
                                $update_landreceipt_extension              =   $request->file('update_landReceipt')->getClientOriginalExtension();
                                $update_land_receipt                       =   'landReceipt'.time().'.'.$update_landreceipt_extension ;
                             
                                                            
                                //Upload file
                                $request->file('update_landReceipt')->storeAs('public/Assets_Receipts/',   $update_land_receipt);
                                
                                }
                                else{
                                    $update_land_receipt = $request->update_landReceiptID;  
                                }
                                                
                            $updatelandAsset                          =   Asset::where('id', $request->update_land_ID)->first();
                            $updatelandAsset->assetType               =    $request->input('update_itemNature');
                            $updatelandAsset->landSize                =    $request->input('update_landSize');
                            $updatelandAsset->landAmount               =    $request->input('update_landAmount');
                            $updatelandAsset->landLocation            =    $request->input('update_landLocation');
                            $updatelandAsset->land_datePurchased      =    $request->input('update_land_datePurchased');
                            $updatelandAsset->sightedBy               =    $request->input('update_sightedBy');
                            $updatelandAsset->sighteby_designation    =    $request->input('update_sighteby_designation');
                            $updatelandAsset->dateofSightation        =    $request->input('update_dateofSightation');
                            $updatelandAsset->landReceipt             =    $update_land_receipt;
                        
            
            
                        if($updatelandAsset->save()){
            
                            
                            return redirect()->route('fetchAssets', ['year'=>$request->update_land_datePurchased, 'item_nature'=>$request->update_itemNature])
                                    ->with('success', 'Assets Updated');
                        }
                    }
                       
                    
// *********************************************************UPDATE BUILDING STARTS************************************************************************
 
                    if($request->update_itemNature=='building'){

                        if(($request->hasFile('update_buildingReceipt'))){
                                                                       
                            $update_buildingreceipt_extension              =   $request->file('update_buildingReceipt')->getClientOriginalExtension();
                            $update_building_receipt                       =   'buildingReceipt'.time().'.'.$update_buildingreceipt_extension ;
                         
                                                        
                            //Upload file
                            $request->file('update_buildingReceipt')->storeAs('public/Assets_Receipts/',   $update_building_receipt);
                            
                            }
                            else{
                                $update_building_receipt = $request->update_buildingReceiptID;  
                            }
                                                      
                        $update_buildingAsset                                    =       Asset::where('id', $request->update_building_ID)->first();
                        $update_buildingAsset->assetType                         =       $request->input('update_itemNature');
                        $update_buildingAsset->buildingName                      =       $request->input('update_buildingName');
                        $update_buildingAsset->buildingLocation                  =       $request->input('update_buildingLocation');
                        $update_buildingAsset->constructed_donatedBy             =       $request->input('update_constructed_donatedBy');
                        $update_buildingAsset->buildingAmount                    =       $request->input('update_buildingAmount');
                        $update_buildingAsset->dateofCompletion                  =       $request->input('update_dateofCompletion');
                        $update_buildingAsset->buildingsupervisedBy              =       $request->input('update_buildingsupervisedBy');
                        $update_buildingAsset->sightedBy                         =       $request->input('update_sightedBy');
                        $update_buildingAsset->sighteby_designation              =       $request->input('update_sighteby_designation');
                        $update_buildingAsset->dateofSightation                  =      $request->input('update_dateofSightation');
                        $update_buildingAsset->buildingReceipt                   =      $update_building_receipt;
    
                        if($update_buildingAsset->save()){
                            return redirect()->route('fetchAssets', ['year'=>$request->update_dateofCompletion, 'item_nature'=>$request->update_itemNature])
                            ->with('success', 'Assets Updated'); 
                            }

                            }
                      
// *********************************************************UPDATE EQUIPMENT STARTS************************************************************************
                if($request->update_itemNature=='equipment'){

                    if(($request->hasFile('update_equipmentReceipt'))){
                                
                                           
                        $update_equipmentreceipt_extension              =   $request->file('update_equipmentReceipt')->getClientOriginalExtension();
                        $update_equipment_receipt                       =   'equipmentReceipt'.time().'.'.$update_equipmentreceipt_extension ;
                     
                                                    
                        //Upload file
                        $request->file('update_equipmentReceipt')->storeAs('public/Assets_Receipts/',   $update_equipment_receipt);
                        
                        }
                        else{
                            $update_equipment_receipt = $request->update_equipmentReceiptID;  
                        }

                    $update_equipmentAsset                                              =   Asset::where('id', $request->update_equipment_ID)->first();
                    $update_equipmentAsset->assetType                                   =   $request->input('update_itemNature');
                    $update_equipmentAsset ->equipmentName                              =   $request->input('update_equipmentName');
                    $update_equipmentAsset ->quantity                                   =   $request->input('update_quantity');
                    $update_equipmentAsset ->equipmentUnitCost                          =   $request->input('update_equipmentUnitCost');
                    $update_equipmentAsset ->datePurchased                              =   $request->input('update_datePurchased_constructed');
                    $update_equipmentAsset ->purchaseBy                                 =   $request->input('update_purchased_supervisedBy');
                    $update_equipmentAsset ->designation                                =   $request->input('update_designation');
                    $update_equipmentAsset ->staffnumber                                =   $request->input('update_staffnumber');
                    $update_equipmentAsset ->controlBy                                  =   $request->input('update_controlBy');
                    $update_equipmentAsset ->inUseAt                                    =   $request->input('update_inUseAt');
                    $update_equipmentAsset->sightedBy                                   =   $request->input('update_sightedBy');
                $update_equipmentAsset->sighteby_designation                            =   $request->input('update_sighteby_designation');
                $update_equipmentAsset->dateofSightation                                =    $request->input('update_dateofSightation');
                $update_equipmentAsset->equipmentReceipt                                 =    $update_equipment_receipt;

                    if($update_equipmentAsset->save()){
                        return redirect()->route('fetchAssets', ['year'=>$request->update_datePurchased_constructed,
                        'item_nature'=>$request->update_itemNature])
                        ->with('success', 'Assets Updated');  
                    }
                }
}

/*********************************************************************************************************************888888888888888888****************** */
    public function deleteAsset(Request $request)
            {


            if($request->item_nature=='land'){

                $id = $request->id;
                $delete = Asset::where('id', $id)->first();
                    if($delete->delete()){
    
                        $landRreceipt = 'public/Assets_Receipts'.$request->receipt;
                         ///DELETE  RECEIPT
                        if (Storage::exists($landRreceipt)) {
                            //Delete the file
                            Storage::delete($landRreceipt);
    
                        }
                        
          return redirect()->route('fetchAssets', ['year'=>$request->year, 'item_nature'=>$request->item_nature])
                ->with('success', 'Purchase Deleted');

            } 
                    
        }
 // *********************************************************************************************************************************************************
            if($request->item_nature=='building'){

                $id = $request->id;
                $delete = Asset::where('id', $id)->first();
                    if($delete->delete()){

                        $buildingRreceipt = 'public/Assets_Receipts'.$request->receipt;
                        ///DELETE  RECEIPT
                        if (Storage::exists($buildingRreceipt)) {
                            //Delete the file
                            Storage::delete($buildingRreceipt);

                        }
                        
            return redirect()->route('fetchAssets', ['year'=>$request->year, 'item_nature'=>$request->item_nature])
                ->with('success', 'Purchase Deleted');

            } 
        
            } 
       
    



/*********************************************************************************************************************888888888888888888****************** */

            if($request->item_nature=='equipment'){

                $id = $request->id;
                $delete = Asset::where('id', $id)->first();
                    if($delete->delete()){

                        $equipmentRreceipt = 'public/Assets_Receipts'.$request->receipt;
                        ///DELETE  RECEIPT
                        if (Storage::exists($equipmentRreceipt)) {
                            //Delete the file
                            Storage::delete($equipmentRreceipt);

                        }
                        
            return redirect()->route('fetchAssets', ['year'=>$request->year, 'item_nature'=>$request->item_nature])
                ->with('success', 'Purchase Deleted');

            } 

            } 

}

/*********************************************************************************************************************888888888888888888****************** */
    
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\refundApp;
use App\Models\processRefund;

class refundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $data = refundApp::where('vcApproval',  null)
                ->orWhere('bursarApproval', null)
                ->orWhere('vcApproval', '')
                ->orWhere('bursarApproval', '')
                ->get();

        return view('/studentAcc.refundApp')->with('data1', $data1)->with('data', $data);
    }

    
    public function refundAppAction(Request $request, $role)
    {
     
      if($role==='bursar'){
        //append this message to the message sent by the bursar to that sent by the vc............We will later explode it
        $msg_append = 'Bursar Message#';
      }

      if($role==='vc'){
        //append this message to the message sent by the vc to that sent by the bursar....We will later explode it
        $msg_append = 'VC Message##';
      }
        $action = $request->action;
       
        $message = $request->message;
        
        
        //$update                       =   disbursementApplication::where('id', $request->edit_id)->first(); 
        $save                          = new processRefund();
        $save = refundApp::where('id', $request->id)->first();
        
        if($role==='vc'){
            $save->vcApproval          =  $action ; 
        }

        if($role==='bursar'){
            $save->bursarApproval      =  $action ; 
        }

        if($role==='bursar'){
            $save->message             = $message; 
        }

        if($role==='vc'){
            $save->message                 = $msg_append.$message; 
        }

        if($role==='bursar'){
            $save->message                 = $msg_append.$message; 
        }
      

            if($save->save()){

              // $records = refundApp::where('transactionCode', $request->id)->first();
               
                // if($records->delete()){

                //     $data1 = User::where('staffNo', session()->get('staffNo'))->first();
                //     $statusMsg = strtoupper($action);
                //     
                // }
                $statusMsg = strtoupper($action);
                return redirect()->route('refundApp')
                ->with('success', 'Application has been sucessfully '. $statusMsg);
            }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function processRefund()
    {
        $data1 = User::where('staffNo', session()->get('staffNo'))->first();
        $data = processRefund::all();
        return view('/studentAcc.processrefund')->with('data1', $data1)->with('data', $data);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

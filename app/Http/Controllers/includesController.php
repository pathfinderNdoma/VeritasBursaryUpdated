<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class includesController extends Controller
{
    //Function to upload Device Imagess
    // public function deviceImage(Request $request, $id){
    //     //Handle the file upload
    //     $receipt= $id;
    //     // $devices =  $device = Devices::where('deviceID', $id)->first();
    //     // $deviceID =$devices->deviceID;
    //    // return $deviceID;
    //     $filenameExtension = $request->file('receipt');
    //     $extension = $request->file('receipt')->getClientOriginalExtension();
    //     $filenameToStore = $request->input('device_name').'_'.$deviceID.'.'.$extension;
    //     //Upload the image
    //     $path = $request->file('device_image')->storeAs('public/device_images', $filenameToStore); 
    //     return $filenameToStore;
    // }


    //Function to generate Unique ID
    function generate_ID() {
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
       
        $unique_id = $num.$char;
        return $unique_id;
    }
}

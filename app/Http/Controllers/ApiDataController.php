<?php

namespace App\Http\Controllers;

use App\Models\SaveDataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiDataController extends Controller
{
    public function saveData(Request $request){
       
        $data = $request->all();          

        $data['item_id'] = $request->envato_res['item']['id'];
        $data['item_name'] = $request->envato_res['item']['name'];
        $data['buyer'] = $request->envato_res['buyer'];
        $data['purchase_code'] = $request['purchase_code'];
        $data['purchase_count'] = $request->envato_res['purchase_count'];
        $data['license'] = $request->envato_res['license'];
        $data['purchase_time']= $request->envato_res['sold_at'];
        unset($data['envato_res']);

        $valuex = valueExistsInTable("purchase_code_verifier","purchase_code",$request['purchase_code']);
        if($valuex==true){
            return response()->json([
                "status" => 400,
                "message"=>"This Purchase code is already is being Used. Sorry..."            

            ]);
        }
        
        $verfication_id =  $data['item_id'] ."|". $data['item_name'] ."|". $data['buyer'] ."|". $data['purchase_count'] ."|". $data['license'];
        
        $convert_data = [
            "purchase_code"=>$data['purchase_code'],
            "buyer"=>$data['buyer'],
            "activated_domain"=>$data['activated_domain'],
            "ip"=>$data['ip'],
            "purchase_time"=>$data['purchase_time'],
            "check_interval"=>604800,
            "item_id" => $data['item_id'],
            "purchase_count" => $data['purchase_count'],
        ];

        $con_encode = json_encode($convert_data);
        $hashrec = encodeHMACToken($convert_data, $data['purchase_code']);  
        $insert = SaveDataModel::create($data);
        if($insert){
        return response()->json(['status'=>true,  "message"=>"purchase code has been registered","data"=>["verification_id"=>$verfication_id, "token"=>$hashrec]]);
        }
    }

}

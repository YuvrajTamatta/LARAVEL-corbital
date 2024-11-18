<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name'=> 'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required'
            ]
        );
        if($validator->fails()){
            return response()->json([])
        }
    }

    public function login(Request $request){

    }

    public function logout(Request $request){

    }
}

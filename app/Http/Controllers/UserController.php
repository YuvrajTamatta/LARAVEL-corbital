<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function dt($name=null){
       if (empty($name)) {
        $data = DB::table('users')->get();
       }else{
        $data = DB::table('users')->where('name',$name)->get();
       }
        return $data;
    }
    public function show()
    {
        $data = User::all();
        return view('Crud.dataView', compact('data'));
    }

    public function delete($id)
    {
        $del = User::where('id', $id)->delete();
        return redirect()->route('show')->with('status', 'Delete Successfull');
    }


    public function adduser(UserRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $message = $data['id'] ? "Update Successfull" : "Insert Succesfull";
        $user = User::updateOrCreate(['id' => $data['id']], $data);

        return redirect()->route('show')->with(['status' => $message]);
    }

    public function edit(string $id)
    {
        $data = User::find($id);

        return view('Crud.form', compact('data'))->with(['status' => 'Record Update Successfully']);

    }

    public function login(){
        return view('Crud.login');
    }

    public function logindata(Request $request){
       $credential = $request->validate([
        'email'=>'required|email',
        'password'=>'required'
       ]);

       if(Auth::attempt($credential)){
        return redirect()->route('dashboard');
       }
    }

    public function dashboardpage(){
       return redirect()->route('show');
        
    }   

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
} 

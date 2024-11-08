<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showUser(){
        return view('layouts.master');
    }
    public function user($id){
        return view('data',compact('id'));
    }

    public function blog(){
        return view('blog');
    }
}

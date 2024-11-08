<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function home(){
        return view('project.pages.home');
    }

    public function contact(string $id='', string $naam='', string $city='',string $phone=''){
        return view('project.pages.contact',['id'=>$id, 'naam'=>$naam,'city'=>$city,'phone'=>$phone]);
    }

    public function about(){
        return view('project.pages.about');
    }

    public function service(){
        return view('project.pages.service');
    }
}

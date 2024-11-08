<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('welcome');
    }
}

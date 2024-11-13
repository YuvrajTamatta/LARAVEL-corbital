<?php

namespace App\Http\Controllers;


use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $data = DB::table('users')->get();
        return $data;
    }
}

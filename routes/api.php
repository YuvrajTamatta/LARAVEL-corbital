<?php

use App\Http\Middleware\apiMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDataController;
use App\Models\SaveDataModel;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/saveData',[ApiDataController::class,'saveData'])->middleware(apiMiddleware::class);

<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;



Route::get('/', function () {
    return view('welcome');
})->name('name');

Route::get('/posts', function () {
    return view('post');
});

Route::prefix('/uv')->group(function () {
    Route::get('/a', function () {
        return "This is a A";
    });
    Route::get('/b', function () {
        return "This is a B";
    });
    Route::get('/c', function () {
        return "This is a C";
    });
});

Route::get('pic/{id?}/{comment}', function (string $id = null, string $comment) {
    if ($id) {
        return "<h2>Post id : " . $id . $comment . "</h2>";
    } else {
        return "<h2>Id Not Found</h2>";
    }
})->whereNumber('id')->whereAlpha('comment');

Route::fallback(function () {
    return view('error');
});

Route::get('uvi', function () {
    return view('hello.php');
});

Route::get('uv', function () {
    return view('layouts.master');
});

function getUser()
{
    return [
        1 => ['name' => 'ravi', 'phone' => '123456', 'city' => 'rajot'],
        2 => ['name' => 'milan', 'phone' => '46987', 'city' => 'surat'],
        3 => ['name' => 'uvraj', 'phone' => '4659754', 'city' => 'jamnager'],
        4 => ['name' => 'raj', 'phone' => '3654789', 'city' => 'dubai'],
        5 => ['name' => 'gaurav', 'phone' => '36547', 'city' => 'goa'],
    ];
}
;

// Route::get('/records', function(){
//     $na=getUser();
//     return view('records', ['name'=>$na]);
// });

// Route::get('/single/{id}', function($id){
//     $users = getUser();
//     $disp = $users[$id];
//     return view('pages.single',['id'=>$disp]);
// })->name('single');

// Route::get('test', function () {
//     $users = 'raviRaj';
//     $names=getUser();

//     return view('test', ['name' => $users, 'city' => $names]);
// });

// Route::get('/user/{id}', function (string $id) {
//     $users = getUser();
//     abort_if(!isset($users[$id]), 404);
//     $user = $users[$id];

//     return view('user', ['id'=> $user]);
// })->name('view');


// Controllers Routes
Route::controller(PageController::class)->group(function () {
    Route::get('/cont', 'showUser')->name('home');

    Route::get('/user/{name}', 'user');

    Route::get('/blog', 'blog')->name('blog');

});


Route::get('/invoke', TestingController::class);


// Projects Routes
Route::controller(ProjectController::class)->group(function () {

    Route::get('/project', 'home')->name('home');

    Route::get('/contact/{id?}/{naam?}/{city?}/{phone?}', 'contact')->name('contactus');

    Route::get('/about', 'about')->name('about');

    Route::get('/service', 'service')->name('service');
});

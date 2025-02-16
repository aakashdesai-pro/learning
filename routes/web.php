<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::group(['middleware' => ['auth', 'is_having_role:admin']], function(){
    Route::get('/posts', [PostController::class, 'posts'])->name('post');
});

Route::group(['middleware' => ['auth', 'is_having_role:client']], function(){
    Route::get('/user', [PostController::class, 'user'])->name('user');
});

Route::get('/login', function(){
    if (Auth::loginUsingId(2)) {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return to_route('post');
        }
        return to_route('user');
    }
})->name('main-login');

Route::get('/lg', function(){
    echo "redirected";
})->name('login');

Route::view('/view', 'view');
Route::post('/view', [PostController::class, 'test'])->name('view');

Route::get('session', function(){
    session()->put('username', 'TEST');
    session(['mobile' => '123123123123']);
    session()->put('username', 'aakash');
    session()->forget('username');
    dd(session());

    $route = route('post')."?name=asdasd"; //http://laravel.test/posts?name=asdasd
    $route = url(route('post'), ['name' => 'nameasdasd']);
});

Route::get('/test2', [PostController::class, 'test'])->name('test2');


Route::get('/logout', function(){
    cache()->flush();
    auth()->logout();
});

Route::get('/array', function(){
    $users = [
        [
            'name' => 'Ramesh',
            'mobile' => 1231231231
        ],
        [
            'name' => 'Jayesh',
            'mobile' => 1231231232,
        ],
        [
            'name' => 'Jayesh',
            'mobile' => 1231231239,
        ],
        [
            'name' => 'Vijay',
            'mobile' => 1231231235,
        ],
        [
            'name' => 'Suresh',
            'mobile' => 1231231233
        ],
    ];

    // is_array
    // if (is_array($users)) {
        
    // }

    // array_key_exists
    // if (array_key_exists(3, $users)) {
    //     if (array_key_exists('name', $users[3])) {
    //         echo '<pre>'; print_r($users[3]['name']); exit;
    //     }
    // }

    // in_array
    // if (in_array('Suresh', $users[3])) {
    //     echo '<pre>'; print_r('yes'); exit;
    // }

    //array filter
    // $users = array_filter($users, function($user){
    //     return $user['name'] == 'Jayesh';
    // });

    // if (count($users) > 0) {
    // }

    echo '<pre>'; print_r($users); exit;
});


Route::get('/collection', function(){
    $users = [
        [
            'name' => 'Ramesh',
            'mobile' => 1231231231,
            'age' => 19
        ],
        [
            'name' => 'Jayesh',
            'mobile' => 1231231232,
            'age' => 30
        ],
        [
            'name' => 'Jayesh',
            'mobile' => 1231231239,
            'age' => 21
        ],
        [
            'name' => 'Vijay',
            'mobile' => 1231231235,
            'age' => 16
        ],
        [
            'name' => 'Suresh',
            'mobile' => 1231231233,
            'age' => 45
        ],
    ];

    $users = collect($users);

    echo '<pre>'; print_r($users->where('age', '>=', 30)); exit;
});
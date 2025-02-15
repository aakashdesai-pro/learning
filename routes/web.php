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
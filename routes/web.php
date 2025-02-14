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
<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

Route::view('/view', 'view')->middleware('locale');
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



Route::group(['prefix' => 'auth'], function(){
    Route::get('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);
});

Route::get('storage123', function(){
    $userId = User::find(1)->id;
    Storage::disk('public')->put($userId.'/demo.jpg', file_get_contents(public_path('images/1.jpg')));
    // Storage::disk('public')->put('text/text1.txt', "This is demo text.");
    
    // $file = Storage::disk('public')->get('text/text1.txt');
    // Storage::download('text/text1.txt', 'testname.txt');
    // if (Storage::disk('public')->exists('test/text1.txt')) {
    // }
});

Route::group(['middleware' => ['locale']], function(){
    Route::get('/language', function(){
        return view('pages.language');
    });
    
    Route::get('/language3', function(){
        return view('pages.language');
    });
    
    Route::get('/language4', function(){
        return view('pages.language');
    });
    
    Route::get('/language5', function(){
        return view('pages.language');
    });
    
    Route::get('/language2', function(){
        return view('pages.language');
    });
});


Route::post('/change-language', function(Request $request){
    session()->put('locale', $request->locale);
    return back();
})->name('change-language');

Route::get('mailer', function(){
    $name = "Aakash";
    $otp = 1234;
    // return new App\Mail\Auth\RegistrationOtp($name, $otp);
    Mail::to('aakashdesai.pro@gmail.com')->send(new App\Mail\Auth\RegistrationOtp($name, $otp));

    Mail::raw('hello', function($mail){
        $mail->to('aakashdesai.pro@gmail.com');
    });
});

Route::get('process', function(){
    // $output = '';
    // exec('php artisan make:controller TestController', $output);
    // print_r($output);

    // $output=null;
    // $retval=null;
    // exec('whoami', $output, $retval);
    // print_r($output);


    $result = Illuminate\Support\Facades\Process::run('ls');
    if($result->successful()){
        return $result->output();
    } else {
        $result->errorOutput();
    }
});
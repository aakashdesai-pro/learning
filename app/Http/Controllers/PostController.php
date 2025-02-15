<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MinimumPostRule;
use function Laravel\Prompts\error;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Http\Requests\FormSubmitRequest;
use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;

class PostController extends Controller
{
    public function posts(){
        $posts = Post::with('user')->paginate(5);
        return PostResource::collection($posts);
    }

    public function user(){
        $user = User::with('posts')->find(1);
        $user = User::find(1);
        return UserResource::make($user->load('posts'));
    }

    public function test(FormSubmitRequest $request){
        dd('submitted successfully');
    }

    public function test2($name, $email, $mobile=null, $address){

    }

    public function useTest2(){
        $data = $this->test2(
            address: 'address',
            name: 'asdasd',
            email: 'asdasd@asda.da',
        );
    }
}

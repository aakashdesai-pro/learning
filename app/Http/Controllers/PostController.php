<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;

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

    public function test(Request $request){
        $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required', 'email']
        ]);
    }
}

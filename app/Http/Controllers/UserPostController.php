<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserPostController extends Controller
{
    public function index(User $user)
    {
        foreach($user->userRole as $userRole) {
            var_dump($userRole->role->name);
        }
        $key = sprintf("user:%i:posts", $user->id);
        if(!Cache::has($key)){
            Cache::remember($key, 2 * 60, function () use ($user) {
                return $user->posts()->with(["likes"])->paginate(20);
            });
        }
        return view("users.posts.index", [
            "user" => $user,
            "posts" => Cache::get($key)
        ]);
    }
}

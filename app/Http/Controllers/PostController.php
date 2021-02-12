<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with("user", "likes")->latest()->paginate(20);
        return view("post.index", [
            "posts" => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "body" => "required"
        ]);

        auth()->user()->posts()->create($request->only(["body"]));

        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        $this->authorize('delete', $post);
        $request->user()->posts()->where("id", $post->id)->delete();
        return back()->with("success", "Deleted post!");
    }
}

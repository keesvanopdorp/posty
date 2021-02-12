@extends('layouts.app')

@section('title') Posty | posts @endsection

@section('content')
    @if(session('success'))
        <div class="bg-green-400 w-75 p-4 mb-6 text-white text-center">
            {{ session('status') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-400 w-75 p-4 mb-6 text-white text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                <form action="{{ route("posts") }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error("body") border-red-500 @enderror" placeholder="Post something!"></textarea>
                        @error("body")
                            <div class="text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
                            Post
                        </button>
                    </div>
                </form>
            @endauth
            <div class="m-2">
                @if($posts->count())
                    @foreach ($posts as $post)
                        <div class="mb-4">
                            <a href="{{ route("users.posts", $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
                            <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                            <p class="mb-2">{{ $post->body }}</p>
                            @auth
                                @can("delete", $post)
                                    <form action="{{ route("posts.destroy", $post) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="text-blue-500">Delete Post</button>
                                    </form>
                                @endcan
                                @if(!$post->likedBy(auth()->user()))
                                    <div class="flex items-center">
                                        <form action="{{ route("posts.likes", $post) }}" method="post" class="mr-2">
                                            @csrf
                                            <button type="submit"  class="text-blue-500"><i class="fas fa-thumbs-up"></i> Like</button>
                                        </form>
                                        @else
                                        <form action="{{ route("posts.likes", $post) }}" method="post" class="mr-2">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="text-blue-500"><i class="fas fa-thumbs-down"></i> Dislike</button>
                                        </form>
                                        @endif
                            @endauth
                                    </div>
                                    <span>{{ $post->likes->count() }} {{ Str::plural("Like", $post->likes->count()) }}</span>
                        </div>
                    @endforeach
                    {{ $posts->links()}}
                    </ul>
                @else
                    <h4>There are no posts yet</h4>
                @endif
            </div>
        </div>
    </div>
@endsection

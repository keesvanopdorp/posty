@extends('layouts.app')

@section('title') Posty | login @endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            @if(session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">email</label>
                    <input type="email" name="email" value="{{old('email')}}" required min="0" max="255" id="email" placeholder="Your email" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('email') text-red border-red-500 @enderror">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">password</label>
                    <input type="password" name="password" required min="0" max="255" id="password" placeholder="Your password" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('password') text-red border-red-500 @enderror">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div class="flex-items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <button type="submit" class="bg-green-600 text-white px-4 py-3 font-medium w-full">Login</button>
            </form>
        </div>
    </div>
@endsection

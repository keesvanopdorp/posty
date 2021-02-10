@extends('layouts.app')

@section('title') Posty | register @endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">name</label>
                    <input type="text" name="name" value="{{old('name')}}" required id="name" placeholder="Your name" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('name') text-red border-red-500 @enderror">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="sr-only">username</label>
                    <input type="text" name="username" value="{{old('username')}}" required min="0" max="100" id="username" placeholder="Username" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('username') text-red border-red-500 @enderror">
                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
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
                    <label for="password_confirmation" class="sr-only">password</label>
                    <input type="password" name="password_confirmation" required min="0" max="255" id="password_confirmation" placeholder="Your password" class="bg-gray-100 border-2 p-4 w-full rounded-lg  @error('password_confirmation') text-red border-red-500 @enderror">
                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 font-medium w-full">Register</button>
            </form>
        </div>
    </div>
@endsection

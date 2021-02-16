@extends('layouts.app')

@section('title') Posty @endsection

@section('content')
    @if(session('success'))
        <div class="bg-green-400 w-75 p-4 mb-6 text-white text-center">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-400 w-75 p-4 mb-6 text-white text-center">
            {{ session('error') }}
        </div>
    @endif
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
           <h1 class="text-center">{{ $user->name }}</h1>
        </div>
    </div>
@endsection

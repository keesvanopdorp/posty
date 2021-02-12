@extends('layouts.app')

@section('title') Posty @endsection

@section('content')
    @if(session('success'))
        <div class="bg-green-400 w-75 p-4 mb-6 text-white text-center">
            {{ session('status') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-400 w-75 p-4 mb-6 text-white text-center">
            {{ session('error') }}
        </div>
    @endif
    <div class="flex justify-center">

    </div>
@endsection

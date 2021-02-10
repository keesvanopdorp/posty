@extends('layouts.app')

@section('title') Posty | home @endsection

@section('content')
    @if(session('status'))
        <div class="bg-green-400 w-75 p-4 mb-6 text-white text-center">
            {{ session('status') }}
        </div>
    @endif
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            home
        </div>
    </div>
@endsection

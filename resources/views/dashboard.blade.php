@extends('layouts.app')

@section('title') Posty | dashboard @endsection

@section('content')
    @if(session('success'))
        <div class="bg-green-400 w-75 p-4 mb-6 text-white text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h4>Dashboard</h4>
        </div>
    </div>
@endsection

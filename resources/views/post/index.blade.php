@extends('layouts.app')

@section('title') Posty | posts @endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="post">

            </form>
        </div>
    </div>
@endsection

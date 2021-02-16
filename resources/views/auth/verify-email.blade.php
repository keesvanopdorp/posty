@extends('layouts.app')

@section('title') Posty | register @endsection

@section('content')
    @if(session('message'))
        <div class="bg-green-400 w-75 p-4 mb-6 text-white text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <h1 class="text-center w-100">check you mail to verify your account or click the button to resend the email</h1>
            <form action="{{ route("verification.send") }}" method="post">
                @csrf
                <div class="flex justify-center w-full my-3">
                    <button type="submit" class="bg-green-500 text-white mx-auto px-4 py-3 font-medium w-6/12">Resend</button>
                </div>
            </form>
        </div>
    </div>
@endsection

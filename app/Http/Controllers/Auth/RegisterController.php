<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(["guest"]);
    }

    public function index()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|max:255",
            "username" => "required|max:100|unique:users,username",
            "email" => "required|email|max:255|unique:users,email",
            "password" => "required|confirmed"
        ]);

        $user = User::create([
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        event(new Registered($user));

        auth()->attempt($request->only(["email", "password"]));

        return redirect()->route("dashboard");
    }
}

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard')->middleware(["auth", "verified"]);

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get("/users/{user}/posts", [UserPostController::class, "index"])->name("users.posts");

Route::post('/logout', [LogoutController::class, "index"])->name('logout');

Route::get('/login', [LoginController::class, "index"])->name('login');
Route::post('/login', [LoginController::class, "store"]);

Route::get('/register', [RegisterController::class, "index"])->name('register');
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/posts', [PostController::class, "index"])->name('posts');
Route::post('/posts', [PostController::class, "store"])->middleware(["auth", "verified"]);
Route::delete('/posts/{post}', [PostController::class, "destroy"])->name("posts.destroy")->middleware(["auth", "verified"]);;

Route::post('/posts/{post}/likes', [PostLikeController::class, "store"])->name("posts.likes");
Route::delete('/posts/{post}/likes', [PostLikeController::class, "destroy"])->name("posts.likes");

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

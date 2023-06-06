<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\Backend\Common\CommonController;
use App\Http\Controllers\Backend\WorkHistory\WorkHistoryController;

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

Route::get('/', function () {
    return view('Frontend.index');
});

Route::post('/user-login', [AuthController::class, 'login'])->name('user.signin');
Route::get('/signout', [AuthController::class, 'signOut'])->name('logout');
Route::get('/auth', [AuthController::class, 'loginPage'])->name('loginPage');
Route::get('/admin-dashboard', [AuthController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

    Route::get('/work-history', [WorkHistoryController::class, 'index'])->name('workHistoryPage');
});

Route::controller(SocialLoginController::class)->group(function () {
    Route::get('authorized/{platform}', 'redirectTo')->name('social.auth.redirectTo');
    Route::get('authorized/{platform}/callback', 'handleCallback')->name('social.auth.handleCallback');
});

Route::controller(GoogleController::class)->group(function () {
    Route::get('authorized/google', 'redirectToGoogle')->name('auth.google');
    Route::get('authorized/google/callback', 'handleGoogleCallback');
});

Route::controller(FacebookController::class)->group(function () {
    Route::get('authorized/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('authorized/facebook/callback', 'handleFacebookCallback');
});

// Auth::routes();
// //Language Translation
// Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

// Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

// //Update User Details
// Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
// Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');


Route::get('{path}', [CommonController::class, 'index'])->where('path', '.*')->name('pagePath');

// Route::get('{any}', [HomeController::class, 'index'])->name('index');

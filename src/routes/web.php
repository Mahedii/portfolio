<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\Backend\Common\CommonController;
use App\Http\Controllers\Common\Command\ArtisanController;
use App\Http\Controllers\Common\Command\PackageController;
use App\Http\Controllers\Backend\Common\Ajax\AddDataController;
use App\Http\Controllers\Backend\Common\Ajax\FetchDataController;
use App\Http\Controllers\Backend\Common\Ajax\DeleteDataController;
use App\Http\Controllers\Backend\Common\Ajax\UpdateDataController;
use App\Http\Controllers\Backend\WorkHistory\WorkHistoryController;
use App\Http\Controllers\Backend\Common\Ajax\ValidationDataController;
use App\Http\Controllers\Backend\Common\LoadDataAndRedirectController;
use App\Http\Controllers\Backend\Common\UpdateDataAndRedirectController;

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
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

    Route::get('admin/{path}', [CommonController::class, 'index'])->where('path', '.*')->name('pagePath');

    // Route::get('{tableData}', [FetchDataController::class, 'index'])->where('tableData', '.*')->name('ajaxFetchData');

    Route::get('/fetch/{table}/{data}', [FetchDataController::class, 'index'])->name('ajaxFetchData');
    Route::post('/add', AddDataController::class)->name('ajaxAddData');
    Route::post('/update', UpdateDataController::class)->name('ajaxUpdateData');
    Route::delete('/delete/{table}/{data}', DeleteDataController::class)->name('ajaxDeleteData');
    Route::post('/validate', ValidationDataController::class)->name('ajaxValidationData');

    Route::get('/load/{path}/{table}/{data}', [LoadDataAndRedirectController::class, 'index'])->name('loadDataAndRedirect');
    Route::post('/data/update', UpdateDataAndRedirectController::class)->name('updateDataAndRedirect');

    Route::get('/artisan/command/{value}', ArtisanController::class)->name('artisanController');
    Route::post('/composer-package/require', PackageController::class)->name('composerPackageController');

    Route::get('/test', function () {
        return view('Backend.pages.test');
    });
    Route::post('/test', TestController::class)->name('testData');
});

Route::controller(SocialLoginController::class)->group(function () {
    Route::get('authorized/{platform}', 'redirectTo')->name('social.auth.redirectTo');
    Route::get('authorized/{platform}/callback', 'handleCallback')->name('social.auth.handleCallback');
});


// Auth::routes();
// //Language Translation
// Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

// Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

// //Update User Details
// Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
// Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');



// Route::get('{any}', [HomeController::class, 'index'])->name('index');

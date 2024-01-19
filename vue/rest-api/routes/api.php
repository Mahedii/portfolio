<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\v1\Expenses\ExpenseController;
use App\Http\Controllers\v1\Measurement\UnitsController;
use App\Http\Controllers\v1\Payment\PaymentMethodsController;
use App\Http\Controllers\v1\Expenses\Category\CategoryController;
use App\Http\Controllers\v1\Expenses\SubCategory\SubCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user-signin', [AuthController::class, 'userSignin'])->name('user.signin');

Route::middleware('auth:api')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/details', [AuthController::class, 'userDetails'])->name('user.details');
        Route::get('/signout', [AuthController::class, 'signOut'])->name('user.signout');
    });

    Route::prefix('category')->group(function () {
        Route::post('/data', CategoryController::class)->name('category.data');
        Route::post('/create', CategoryController::class)->name('category.create');
    });

    Route::prefix('sub-category')->group(function () {
        Route::post('/data', SubCategoryController::class)->name('subcategory.data');
        Route::post('/create', SubCategoryController::class)->name('subcategory.create');
        Route::post('/update', SubCategoryController::class)->name('subcategory.update');
        Route::post('/delete', SubCategoryController::class)->name('subcategory.delete');
    });

    Route::controller(PaymentMethodsController::class)->group(function () {
        Route::prefix('payment-methods')->group(function () {
            Route::post('/data', '__invoke')->name('paymentMethods.data');
            Route::post('/create', '__invoke')->name('paymentMethods.create');
            Route::post('/update', '__invoke')->name('paymentMethods.update');
            Route::post('/delete', '__invoke')->name('paymentMethods.delete');

            // Route::prefix('/info')->group(function () {});
        });
    });

    Route::prefix('measurement-units')->group(function () {
        Route::post('/data', UnitsController::class)->name('units.data');
        Route::post('/create', UnitsController::class)->name('units.create');
        Route::post('/update', UnitsController::class)->name('units.update');
        Route::post('/delete', UnitsController::class)->name('units.delete');
    });

    Route::prefix('expenses')->group(function () {
        Route::post('/data', ExpenseController::class)->name('expenses.data');
        Route::post('/create', ExpenseController::class)->name('expenses.create');
        Route::post('/update', ExpenseController::class)->name('expenses.update');
        Route::post('/delete', ExpenseController::class)->name('expenses.delete');
    });
});

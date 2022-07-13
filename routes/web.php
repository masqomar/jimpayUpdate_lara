<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/* ------------- Admin Route Start -------------- */
Route::prefix('admin')->group(function () {
    Route::get('login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'login'])->name('admin.login');
    Route::get('logout', [\App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('member', \App\Http\Controllers\Admin\MemberController::class);
        Route::resource('blog', \App\Http\Controllers\Admin\BlogController::class);
        Route::resource('producttype', \App\Http\Controllers\Admin\ProductTypeController::class);
        Route::resource('kopkarproduct', \App\Http\Controllers\Admin\KopkarProductController::class);
        Route::resource('accounttransaction', \App\Http\Controllers\Admin\AccountTransactionController::class);
    });
});

/* ------------- Admin Route Start -------------- */
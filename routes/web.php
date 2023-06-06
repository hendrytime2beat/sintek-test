<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\ProductsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('access.login');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('access')->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/', [AccessController::class, 'login'])->name('access.login');
        Route::post('act', [AccessController::class, 'login_act'])->name('access.login.act');
    });
    Route::group(['prefix' => 'profile', 'middleware' => 'userauth'], function () {
        Route::get('/', [AccessController::class, 'profile'])->name('access.profile');
        Route::post('act', [AccessController::class, 'profile_act'])->name('access.profile.act');
    });
    Route::get('logout', [AccessController::class, 'logout'])->name('access.logout');
});

Route::group(['prefix' => 'produk', 'middleware' => 'userauth'], function () {
    Route::get('list', [ProductsController::class, 'list'])->name('produk.list');
    Route::post('list/json', [ProductsController::class, 'list_json'])->name('produk.list.json');
    Route::get('add', [ProductsController::class, 'add'])->name('produk.add');
    Route::post('add/act', [ProductsController::class, 'add_act'])->name('produk.add.act');
    Route::get('detail/{id}', [ProductsController::class, 'detail'])->name('produk.detail');
    Route::get('edit/{id}', [ProductsController::class, 'edit'])->name('produk.edit');
    Route::post('edit/act/{id}', [ProductsController::class, 'edit_act'])->name('produk.edit.act');
    Route::get('delete/{id}', [ProductsController::class, 'delete'])->name('produk.delete');
});
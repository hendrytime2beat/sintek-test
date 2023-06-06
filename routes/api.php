<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::group(['middleware' => 'headerauth'], function(){
    Route::post('login', [ApiController::class, 'login']);
    Route::prefix('book')->group(function(){
        Route::get('recommendation_list', [ApiController::class, 'recommendation_list']);
        Route::get('latest_list', [ApiController::class, 'latest_list']);
    });
    Route::prefix('mybook')->group(function(){
        Route::post('list', [ApiController::class, 'list_mybook']);
        Route::post('get', [ApiController::class, 'get_mybook']);
        Route::post('act', [ApiController::class, 'act_mybook']);
    });
    Route::prefix('koleksi')->group(function(){
        Route::post('list', [ApiController::class, 'koleksi_list']);
    });
    Route::get('kategori_list', [ApiController::class, 'kategori_list']);
    Route::get('slide_list', [ApiController::class, 'slide_list']);
    Route::get('saran_list', [ApiController::class, 'saran_list']);
    Route::post('saran_act', [ApiController::class, 'saran_act']);
    Route::prefix('access')->group(function(){
        Route::post('profile', [ApiController::class, 'profile']);
    });
});

Route::post('book', [ApiController::class, 'get_book'])->name('api.book');
Route::post('reader_book', [ApiController::class, 'reader_book'])->name('api.reader_book');
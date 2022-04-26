<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/import', [BookController::class, 'import'])->middleware('admin');

Route::get('/', [BookController::class, 'home']);
Route::get('/search', [BookController::class, 'search'])->name('search');
Route::get('/{id}', [BookController::class, 'getBookById']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware'=> ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    //Route::post('/import', [BookController::class, 'import']);
});

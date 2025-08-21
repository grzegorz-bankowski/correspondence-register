<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomingLetterController;
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

Route::get('/', [UserController::class, 'index']);
Route::post('login', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout']);
Route::get('account', [UserController::class, 'create']);
Route::post('account/store', [UserController::class, 'store']);
Route::get('incoming/add', [IncomingLetterController::class, 'add']);
Route::post('incoming/store', [IncomingLetterController::class, 'store']);
Route::get('incoming/browse', [IncomingLetterController::class, 'browse']);
});

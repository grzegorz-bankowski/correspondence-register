<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomingLetterController;
use App\Http\Controllers\OutgoingLetterController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\AdminController;

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
Route::get('outgoing/add', [OutgoingLetterController::class, 'add']);
Route::post('outgoing/store', [OutgoingLetterController::class, 'store']);
Route::get('outgoing/browse', [OutgoingLetterController::class, 'browse']);
Route::get('forget', [ForgetPasswordController::class, 'forgetPasswordForm']);
Route::post('forget', [ForgetPasswordController::class, 'submitForgetPasswordForm']);
Route::get('reset-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm']);
Route::post('reset-password', [ForgetPasswordController::class, 'submitResetPasswordForm']);
Route::get('user/add', [AdminController::class, 'add']);
Route::post('user/store', [AdminController::class, 'store']);
Route::get('incoming/edit/{id}', [IncomingLetterController::class, 'edit']);
Route::put('incoming/update/{id}', [IncomingLetterController::class, 'update']);
Route::delete('incoming/delete/{id}', [IncomingLetterController::class, 'delete']);
Route::get('outgoing/edit/{id}', [OutgoingLetterController::class, 'edit']);
Route::put('outgoing/update/{id}', [OutgoingLetterController::class, 'update']);
});

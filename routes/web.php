<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'index']);
Route::post('post-login', [AuthController::class, 'postLogin']);
Route::get('incoming_post', [AuthController::class, 'incomingPost']);
Route::get('outgoing_post', [AuthController::class, 'outgoingPost']);
Route::post('incoming_post/add', [AuthController::class, 'addIncoming']);
Route::post('outgoing_post/add', [AuthController::class, 'addOutgoing']);
Route::get('browse_incoming', [AuthController::class, 'browseIncoming']);
Route::get('browse_outgoing', [AuthController::class, 'browseOutgoing']);
Route::get('add_user', [AuthController::class, 'addUser']);
Route::post('add_user/add', [AuthController::class, 'createUser']);
Route::get('logout', [AuthController::class, 'logout']);
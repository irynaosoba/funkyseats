<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Middleware\HasRole;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SeatController;

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

Route::get('/', [RoomController::class, 'index_withCountSeats']);

Route::get('/room/{id}', [RoomController::class, 'show']);


Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/admin', function () {
        return View('admin');
    })->name('admin');
});
Route::get('/auth/logout', [LogoutController::class, 'perform']);

Route::get('/auth/google', [GoogleController::class, 'googleRedirect'])->name('login');
Route::get('/callback/google', [GoogleController::class, 'googleCallback']);

Route::post('/booking/seat/{seat_id}', [BookingController::class, 'store']);


Route::get('/rooms/edit', [RoomController::class, 'edit']);
Route::post('/rooms/{id}/save', [RoomController::class, 'save']);
Route::post('/rooms/{id}/delete', [RoomController::class, 'delete']);

Route::get('/room/{id}/seats/edit', [SeatController::class, 'edit']);
Route::post('/seats/{id}/save', [SeatController::class, 'save']);
Route::post('/seats/{id}/delete', [SeatController::class, 'delete']);

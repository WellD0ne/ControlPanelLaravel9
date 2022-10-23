<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NotificationsController;
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



Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/control', [ControlController::class, 'index'])->name('control');
    Route::post('/control/changepassword', [ControlController::class, 'changePassword'])->name('change.password');
    Route::get('/media', [MediaController::class, 'index'])->name('media');
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');
    Route::get('/message/{id}', [NotificationsController::class, 'message'])->name('message');
    Route::post('/mark-as-read', [NotificationsController::class, 'markAsReadNotifications'])->name('markAsReadNotifications');
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

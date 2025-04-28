<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Models\Player;
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
    return view('welcome');
});
Route::get('/screen', function () {
    return view('screen');
});

Route::get('/players/getall', function () {
    $players = Player::all(); // إذا كان لديك موديل Player

    return view('players.getall',compact('players'));
});

// web.php
Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('reset.form');
Route::post('/reset-password', [ResetPasswordController::class, 'handleReset'])->name('reset.handle');
Route::post('/profile_user', [ProfileController::class, 'store']);
Route::get('/change-password', [ResetPasswordController::class, 'showChangePasswordForm'])->name('password.change.form');
Route::post('/change-password', [ResetPasswordController::class, 'changePassword'])->name('password.change');


// Route::get('/players/create', [PlayerController::class, 'create']);
//  Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
//  Route::post('/players/getall', [PlayerController::class, 'getall'])->name('players.getall');

//  Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
//  Route::post('/players/{id}/mark-day', [PlayerController::class, 'markDay'])->name('players.markDay');
//  Route::post('/players/{id}/renew',[PlayerController::class,'renew'])->name('players.renew');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/players/create', [PlayerController::class, 'create']);

    Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
    Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
    Route::post('/players/{id}/mark-day', [PlayerController::class, 'markDay'])->name('players.markDay');
    Route::post('/players/{id}/renew',[PlayerController::class,'renew'])->name('players.renew');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

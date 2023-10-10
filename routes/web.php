<?php

use App\Http\Controllers\OAuth\FacebookController;
use App\Http\Controllers\OAuth\GoogleController;
use App\Http\Controllers\OAuth\LinkedinController;
use App\Http\Controllers\OAuth\TwitterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * third parties logins
 */
Route::group(['prefix' => '/auth'], function () {

    Route::controller(GoogleController::class)->group(function () {
        Route::get('/google', 'redirectToGoogle')->name('auth.google');
        Route::get('/google/callback', 'handleGoogleCallback');
    });

    Route::controller(FacebookController::class)->group(function () {
        Route::get('/facebook', 'redirectToFacebook')->name('auth.facebook');
        Route::get('/facebook/callback', 'handleFacebookCallback');
    });

    Route::controller(LinkedinController::class)->group(function () {
        Route::get('/linkedin', 'redirectToLinkedin')->name('auth.linkedin');
        Route::get('/linkedin/callback', 'handleLinkedinCallback');
    });

    Route::controller(TwitterController::class)->group(function () {
        Route::get('/twitter', 'redirectToTwitter')->name('auth.twitter');
        Route::get('/twitter/callback', 'handleTwitterCallback');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', function () {
    /**
     * test route for some code logics testing
     */
});

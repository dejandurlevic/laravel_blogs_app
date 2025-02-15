<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-deposit', [App\Http\Controllers\HomeController::class, 'addDeposit'])->name('home.addDeposit');
Route::post('/add-deposit', [App\Http\Controllers\HomeController::class, 'updateDeposit'])->name('home.addDeposit');

Route::get('/show-ad-form', [App\Http\Controllers\AdController::class, 'showAdForm'])->name('ads.showAdForm');
Route::post('/show-ad-form', [App\Http\Controllers\AdController::class, 'showAdNewForm'])->name('ads.storeAd');

Route::get('/show-all-ads', [App\Http\Controllers\AdController::class, 'showAllAds'])->name('ads.showAllAds');
Route::get('/ad/{id}', [App\Http\Controllers\AdController::class, 'showSingleAd'])->name('ads.showSingleAd');

Route::post('/single-ad/{id}/send-message', [App\Http\Controllers\MessageController::class, 'contactOwner'])->name('home.contactOwner');
Route::get('/show-message', [App\Http\Controllers\MessageController::class, 'showMessage'])->name('home.showMessage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('welcome');
});

Route::get('/terms-of-service', function () {
    return view('terms'); // Povezivanje sa odgovarajućim Blade fajlom
})->name('terms.show');


Route::get('/policy-of-service', function () {
    return view('policy'); // Povezivanje sa odgovarajućim Blade fajlom
})->name('policy.show');

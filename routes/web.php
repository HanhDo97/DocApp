<?php

use App\Livewire\Home\HomePage;
use App\Livewire\Login\LoginPage;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', LoginPage::class)->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/', HomePage::class);
    Route::get('/home', HomePage::class)->name('home');
});

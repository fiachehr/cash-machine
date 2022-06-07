<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashTransactionController;
use App\Http\Controllers\CardTransactionController;
use App\Http\Controllers\BankTransactionController;

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

Route::get('/', function () {
    return view('index');
});


Route::get('/cash', [CashTransactionController::class, 'index'])->name('cash.index');
Route::post('/cash/store', [CashTransactionController::class, 'store'])->name('cash.store');

Route::get('/card', [CardTransactionController::class, 'index'])->name('card.index');
Route::post('/card/store', [CardTransactionController::class, 'store'])->name('card.store');

Route::get('/bank', [BankTransactionController::class, 'index'])->name('bank.index');
Route::post('/bank/store', [BankTransactionController::class, 'store'])->name('bank.store');


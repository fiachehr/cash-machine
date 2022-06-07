<?php

use App\Http\Controllers\BankTransactionController;
use App\Http\Controllers\CardTransactionController;
use App\Http\Controllers\CashTransactionController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/cash', [CashTransactionController::class, 'index'])->name('cash.index');
Route::get('/card', [CardTransactionController::class, 'index'])->name('card.index');
Route::get('/bank', [BankTransactionController::class, 'index'])->name('bank.index');

Route::group(['middleware' => ['source.access']], function () {
    Route::post('/bank/store', [BankTransactionController::class, 'store'])->name('bank.store');
    Route::post('/card/store', [CardTransactionController::class, 'store'])->name('card.store');
    Route::post('/cash/store', [CashTransactionController::class, 'store'])->name('cash.store');
});

Route::get('/transaction/{id}', [TransactionController::class, 'transaction'])->name('transaction');
Route::get('/list', [TransactionController::class, 'list'])->name('list');

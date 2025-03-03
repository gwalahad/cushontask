<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\InvestmentsController;

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
})->name('welcome');

Route::post('/login', [LoginController::class, 'login']);
Route::get('/account', [AccountController::class, 'home'])->name('accountHome');
Route::post('/invest', [InvestmentsController::class, 'invest']);
Route::post('/investtransact', [InvestmentsController::class, 'investtransact']);
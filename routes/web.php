<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

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

Route::get('/login', function () {
    return view('login');
})->name('login');

// Redirect root to login
Route::get('/', function () {
    return redirect('/login');
});


Route::post('/login', [InvoiceController::class, 'login'])->name('login');



Route::middleware('auth')->group(function () {
    Route::get('/invoice', function () {
        return view('invoice');
    });
    // Route::get('/invoice', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::post('/logout', [InvoiceController::class, 'logout'])->name('logout');

});


// Route::get('/', [InvoiceController::class, 'loginView'])->name('login');


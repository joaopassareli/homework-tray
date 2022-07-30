<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesReportController;


Route::get('/', function () {
    return view('vendors.index');
});

Route::resource('/vendors', VendorsController::class)
    ->except(['show']);

Route::resource('/sales', SalesController::class)
    ->except(['show']);

Route::get('/sales-report', [SalesReportController::class, 'index'])->name('sales-report');

<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\SalesReportController;


Route::get('/', function () {
    return view('sales.index');
});

Route::resource('/vendors', VendorsController::class)
    ->except(['show']);

Route::resource('/sales', SalesController::class)
    ->except(['show']);

Route::resource('/sales-report', SalesReportController::class)
    ->only(['show']);

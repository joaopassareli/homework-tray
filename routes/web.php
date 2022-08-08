<?php

use App\Mail\SendSalesReport;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
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

Route::get('sales/all', [SalesController::class, 'all'])->name('all');

Route::resource('/sales-report', SalesReportController::class)
    ->only(['show']);

Route::get('send-report', function(){
    Mail::send(new SendSalesReport());
    return to_route('sales.index');
})->name('send-report');

<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vendor;
use App\Services\CalculateComission;
use App\Events\DailySalesReportEvent;
use App\Services\CalculateTotalSales;

class SalesReportController extends Controller
{
    public function show ($id)
    {
        $vendor = Vendor::find($id);
        $sales = Sale::whereVendor_id($vendor->id)->get();

        $totalComission = CalculateComission::calculateComission($sales);
        $totalSalesValue = CalculateTotalSales::calculateTotalSales($sales);

        return view('sales-report.show')
            ->with('vendor', $vendor)
            ->with('sales', $sales)
            ->with('totalSalesValue', $totalSalesValue)
            ->with('totalComission', $totalComission);
    }

}

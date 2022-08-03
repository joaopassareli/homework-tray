<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vendor;
use App\Services\CalculateComission;
use App\Events\DailySalesReportEvent;

class SalesReportController extends Controller
{
    public function show ($id)
    {
        $vendor = Vendor::find($id);
        $sales = Sale::whereVendor_id($vendor->id)->get();
        $sales1 = Sale::all();
        $vendors = Vendor::all();

        $totalComission = CalculateComission::calculateComission($sales);

        foreach ($sales1 as $sale) {
            DailySalesReportEvent::dispatch(
                $sale->id,
                $sale->sale_value,
                $sale->created_at,
                $vendors->find($sale->vendor_id)->name,
            );
        }

        return view('sales-report.show')
            ->with('vendor', $vendor)
            ->with('sales', $sales)
            ->with('totalComission', $totalComission);
    }

}

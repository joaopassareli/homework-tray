<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vendor;
use App\Services\CalculateComission;

class SalesReportController extends Controller
{
    public function show ($id)
    {
        $vendor = Vendor::find($id);
        $sales = Sale::whereVendor_id($vendor->id)->get();

        $totalComission = CalculateComission::calculateComission($sales);

        return view('sales-report.show')
            ->with('vendor', $vendor)
            ->with('sales', $sales)
            ->with('totalComission', $totalComission);
    }

}

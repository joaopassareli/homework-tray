<?php

namespace App\Repository;

use App\Models\Vendor;
use App\Services\SaleService;
use Illuminate\Support\Facades\DB;
use App\Services\CalculateTotalSales;

class SaleRepository
{
    public function getSalesFromTheDay ()
    {
        $sales = DB::table('sales')->whereDate('created_at', date('Y-m-d'))->get();
        $vendors = Vendor::all();

        $totalSalesValue = SaleService::calculateTotalSales($sales);

        $data = array(
            'sales' => $sales,
            'vendors' => $vendors,
            'totalSalesValue' => $totalSalesValue
        );

        return $data;
    }
}

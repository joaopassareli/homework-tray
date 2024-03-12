<?php

namespace App\Repository;

use App\Models\Sale;
use App\Models\Vendor;
use App\Services\SaleService;

class SalesReportRepository
{
    public function getAllSalesFromVendorId(int $id): array
    {
        $vendor = Vendor::find($id);
        $sales = Sale::whereVendor_id($vendor->id)->get();

        $totalComission = SaleService::calculateComission($sales);
        $totalSalesValue = SaleService::calculateTotalSales($sales);

        return array(
            'vendor' => $vendor,
            'sales' => $sales,
            'totalComission' => $totalComission,
            'totalSalesValue' => $totalSalesValue
        );
    }
}

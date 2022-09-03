<?php

namespace App\Services;

use App\Models\Vendor;
use App\Repository\SaleRepository;
use Illuminate\Support\Collection;
use App\Http\Requests\SalesFormRequest;

class SaleService
{
    public function __construct(protected SaleRepository $saleRepository)
    {
    }

    public function index()
    {
        return $this->saleRepository->getSalesFromTheDay();
    }

    public function createSale (float $sale_value, int $vendor_id)
    {
        return $this->saleRepository->add($sale_value, $vendor_id);
    }

    public static function calculateTotalSales (Collection $sales): float
    {
        $totalSalesValue = 0;

        foreach($sales as $sale){
            $totalSalesValue += $sale->sale_value;
        }

        return $totalSalesValue;
    }

    // public function calculateComission ()
    // {

    // }
}

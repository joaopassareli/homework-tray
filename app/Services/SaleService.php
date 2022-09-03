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

    public function createSale (Vendor $vendors, string $name, string $email)
    {
        return $this->saleRepository->add($name, $email);
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

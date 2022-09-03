<?php

namespace App\Services;

use App\Repository\SaleRepository;
use App\Http\Requests\SalesFormRequest;
use Illuminate\Support\Collection;

class SaleService
{
    public function __construct(protected SaleRepository $saleRepository)
    {
    }

    public function index()
    {
        return $this->saleRepository->getSalesFromTheDay();
    }

    // public function createSale (string $name, string $email)
    // {
    //     return $this->saleRepository->add($name, $email);
    // }

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

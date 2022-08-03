<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

class CalculateTotalSales
{
    public static function calculateTotalSales(Collection $sales){

        static $teste;
        $totalSalesValue = 0;

        foreach($sales as $sale){
            $totalSalesValue += $sale->sale_value;
        }

        return $totalSalesValue;
    }
}


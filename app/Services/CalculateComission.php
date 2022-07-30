<?php

namespace App\Services;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Collection;

class CalculateComission
{
    public static function calculateComission(Collection $sales){

        static $comission = 8.5;
        $totalComission = 0;

        foreach($sales as $sale){
            $totalComission += $sale->sale_value * ($comission / 100);
        }

        return $totalComission;
    }
}

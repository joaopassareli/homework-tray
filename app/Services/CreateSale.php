<?php

namespace App\Services;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class CreateSale
{
    public function add (float $sale_value, int $vendor_id): Sale
    {
        return DB::transaction(function () use($sale_value, $vendor_id) {
            $sale = Sale::create([
                'sale_value' => $sale_value,
                'vendor_id' => $vendor_id,
            ]);

            return $sale;
        });
    }
}

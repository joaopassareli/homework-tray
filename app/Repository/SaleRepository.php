<?php

namespace App\Repository;

use App\Models\Sale;
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

    public function add (float $sale_value, int $vendor_id)
    {
        return DB::transaction(function () use($sale_value, $vendor_id) {
            $sale = Sale::create([
                'sale_value' => $sale_value,
                'vendor_id' => $vendor_id,
            ]);

            $vendor = Vendor::find($sale->vendor_id);
            $sale->sale_value = number_format($sale->sale_value, 2, ',', '.');

            $mensagemSucesso = "Registrada a venda no valor de R$ {$sale->sale_value} efetuada pelo vendedor {$vendor->name}";

            return $mensagemSucesso;
        });
    }

    public function getAllSales()
    {
        $sales = Sale::all();
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

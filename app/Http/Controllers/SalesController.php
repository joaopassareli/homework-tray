<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vendor;
use App\Services\CreateSale;
use Illuminate\Http\Request;
use App\Services\SaleService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SalesFormRequest;

class SalesController extends Controller
{
    public function __construct(protected SaleService $saleService)
    {
    }

    public function index ()
    {
        $mensagemSucesso = session('mensagem.sucesso');

        $data = $this->saleService->index();

        return view('sales.index')
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('sales', $data['sales'])
            ->with('vendors', $data['vendors'])
            ->with('totalSalesValue', $data['totalSalesValue']);
    }

    public function create ()
    {
        // $vendors = Vendor::all();

        return view('sales.create');
            // ->with('vendors', $vendors);
    }

    public function store (SalesFormRequest $request, CreateSale $createSale)
    {
        $sale = $createSale->add(
            $request->sale_value, $request->vendor_id
        );

        $vendor = Vendor::find($sale->vendor_id);
        $sale->sale_value = number_format($sale->sale_value, 2, ',', '.');

        return to_route('sales.index')
            ->with('mensagem.sucesso', "Registrada a venda no valor de R$ {$sale->sale_value} efetuada pelo vendedor {$vendor->name}");
    }

    public function all ()
    {
        $sales = Sale::all();
        $vendors = Vendor::all();

        $mensagemSucesso = session('mensagem.sucesso');

        $totalSalesValue = CalculateTotalSales::calculateTotalSales($sales);

        return view('sales.all')
            ->with('sales', $sales)
            ->with('vendors', $vendors)
            ->with('totalSalesValue', $totalSalesValue)
            ->with('mensagemSucesso', $mensagemSucesso);
    }
}

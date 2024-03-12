<?php

namespace App\Http\Controllers;

use App\Services\SaleService;
use App\Repository\VendorRepository;
use App\Http\Requests\SalesFormRequest;

class SalesController extends Controller
{
    public function __construct(
        protected SaleService $saleService,
        protected VendorRepository $vendorRepository
    ){}

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
        return view('sales.create')
            ->with('vendors', $this->vendorRepository->getAllVendors());
    }

    public function store (SalesFormRequest $request)
    {
        return to_route('sales.index')
            ->with(
                'mensagem.sucesso',
                $this->saleService->createSale($request->sale_value, $request->vendor_id)
            );
    }

    public function all ()
    {
        $data = $this->saleService->showAllSales();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('sales.all')
            ->with('sales', $data['sales'])
            ->with('vendors', $data['vendors'])
            ->with('totalSalesValue', $data['totalSalesValue'])
            ->with('mensagemSucesso', $mensagemSucesso);
    }
}

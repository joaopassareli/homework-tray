<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Services\VendorService;
use App\Http\Requests\VendorsFormRequest;

class VendorsController extends Controller
{
    public function __construct(protected VendorService $vendorService)
    {
    }

    public function index ()
    {
        $mensagemSucesso = session('mensagem.sucesso');

        return view('vendors.index')
            ->with('vendors', $this->vendorService->index())
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create ()
    {
        return view('vendors.create');
    }

    public function store (VendorsFormRequest $request)
    {
        $vendor = $this->vendorService->createVendor($request->name, $request->email);

        return to_route('vendors.index')
            ->with('mensagem.sucesso', "Vendedor '{$vendor->name}' cadastrado com sucesso!");
    }

    public function edit (Vendor $vendor)
    {
        return view('vendors.edit')
            ->with('vendor', $vendor);
    }

    public function update (Vendor $vendor, VendorsFormRequest $request)
    {
        return to_route('vendors.index')
            ->with('mensagem.sucesso', $this->vendorService->updateVendorData($vendor, $request));
    }

    public function destroy (Vendor $vendor)
    {
        return to_route('vendors.index')
            ->with('mensagem.sucesso', $this->vendorService->destroyVendor($vendor));
    }
}

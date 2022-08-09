<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Services\CreateVendor;
use App\Http\Requests\VendorsFormRequest;

class VendorsController extends Controller
{
    public function index ()
    {
        $vendors = Vendor::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('vendors.index')
            ->with('vendors', $vendors)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create ()
    {
        return view('vendors.create');
    }

    public function store (VendorsFormRequest $request, CreateVendor $createVendor)
    {
        $vendor = $createVendor->add(
            $request->name, $request->email
        );

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
        $oldName = $vendor->name;
        $oldEmail = $vendor->email;

        $vendor->fill($request->all());
        $vendor->save();

        return to_route('vendors.index')
            ->with('mensagem.sucesso', "O vendedor '{$oldName}' teve seu nome alterado para '{$vendor->name}' e seu e-mail de '{$oldEmail}' para '{$vendor->email}'");
    }

    public function destroy (Vendor $vendor)
    {
        $vendor->delete();

        return to_route('vendors.index')
            ->with('mensagem.sucesso', "Vendedor '{$vendor->name}' excluído com sucesso!");
    }
}

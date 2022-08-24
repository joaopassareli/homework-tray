<?php

namespace App\Repository;

use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\VendorsFormRequest;
use Illuminate\Database\Eloquent\Collection;

class VendorRepository
{
    public function getAllVendors(): Collection
    {
        return Vendor::all();
    }

    public function add (string $name, string $email): Vendor
    {
        return DB::transaction(function () use($name, $email) {
            $vendor = Vendor::create([
                'name' => $name,
                'email' => $email,
            ]);

            return $vendor;
        });
    }

    public function update (Vendor $vendor, VendorsFormRequest $request)
    {
        $oldName = $vendor->name;
        $oldEmail = $vendor->email;

        $vendor->fill($request->all());
        $vendor->save();

        return $mensagemSucesso = "O vendedor '{$oldName}' teve seu nome alterado para '{$vendor->name}' e seu e-mail de '{$oldEmail}' para '{$vendor->email}'";
    }
}

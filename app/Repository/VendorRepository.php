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
            return Vendor::create([
                'name' => $name,
                'email' => $email,
            ]);
        });
    }

    public function update (Vendor $vendor, VendorsFormRequest $request)
    {
        $oldName = $vendor->name;
        $oldEmail = $vendor->email;

        $vendor->fill($request->all());
        $vendor->save();

        return "O vendedor '{$oldName}' teve seu nome alterado para '{$vendor->name}' e seu e-mail de '{$oldEmail}' para '{$vendor->email}'";
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return "Vendedor {$vendor->name} excluído com sucesso!";
    }
}

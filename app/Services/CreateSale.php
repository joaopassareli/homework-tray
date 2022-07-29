<?php

namespace App\Services;

use App\Models\Vendor;
use Illuminate\Support\Facades\DB;

class CreateVendor
{
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
}

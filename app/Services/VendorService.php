<?php

namespace App\Services;

use App\Models\Vendor;
use App\Repository\VendorRepository;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\VendorsFormRequest;

class VendorService
{
    public function __construct(protected VendorRepository $vendorRepository)
    {
    }

    public function index()
    {
        return $this->vendorRepository->getAllVendors();
    }

    public function createVendor (string $name, string $email)
    {
        return $this->vendorRepository->add($name, $email);
    }

    public function updateVendorData (Vendor $vendor, VendorsFormRequest $request)
    {
        return $this->vendorRepository->update($vendor, $request);
    }
}

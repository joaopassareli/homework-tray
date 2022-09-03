<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Vendor;
use App\Repository\SaleRepository;
use App\Repository\VendorRepository;
use App\Http\Requests\SalesFormRequest;
use App\Http\Requests\VendorsFormRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaleControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testConfirmThatSaleIsCreated()
    {
        $vendor = $this->createVendor();
        //Arrange
        /** @var SaleRepository $repository */
        $saleRepository = $this->app->make(SaleRepository::class);

        $request = new SalesFormRequest();
        $request->sale_value = 3000.00;
        $request->vendor_id = 1;

        //Act
        $saleRepository->add($request->sale_value, $request->vendor_id);

        //Assert
        $this->assertDatabaseHas('sales', [
            'sale_value' => 3000,
            'vendor_id' => 1,
        ]);
    }

    private function createVendor()
    {
        /** @var VendorRepository $repository */
        $vendorRepository = $this->app->make(VendorRepository::class);

        $request = new VendorsFormRequest();
        $request->name = 'João Passareli';
        $request->email = 'joaopassareli@gmail.com';

        return $vendorRepository->add($request->name, $request->email);
    }
}

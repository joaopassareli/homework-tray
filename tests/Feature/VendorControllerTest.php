<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Vendor;
use App\Repository\VendorRepository;
use App\Http\Requests\VendorsFormRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VendorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testConfirmThatVendorIsCreated()
    {
        //Arrange
        /** @var VendorRepository $repository */
        $vendorRepository = $this->app->make(VendorRepository::class);

        $request = new VendorsFormRequest();
        $request->name = 'João Passareli';
        $request->email = 'joaopassareli@gmail.com';

        //Act
        $vendorRepository->add($request->name, $request->email);

        //Assert
        $this->assertDatabaseHas('vendors', [
            'name' => 'João Passareli',
            'email' => 'joaopassareli@gmail.com'
        ]);
        // $this->assertDatabaseHas('vendors', ['email' => 'joaopassareli@gmail.com']);
    }

    public function testConfirmThatVendorIsEdited ()
    {
        //Arrange
        /** @var VendorRepository $repository */
        $vendorRepository = $this->app->make(VendorRepository::class);

        $request = new VendorsFormRequest();
        $request->name = 'João Passareli';
        $request->email = 'joaopassareli@gmail.com';

        // Updating the data from Vendor
        $vendor = new Vendor();
        $vendor->name = 'João Victor Passareli';
        $vendor->email = 'joao.passareli@gmail.com';

        //Act
        $vendorRepository->add($request->name, $request->email);
        $vendorRepository->update($vendor, $request);


        //Assert
        $this->assertDatabaseHas('vendors', [
            'name' => 'João Victor Passareli',
            'email' => 'joao.passareli@gmail.com'
        ]);
    }

    public function testConfirmThatVendorWasDeleted ()
    {
        //Arrange
        /** @var VendorRepository $repository */
        $vendorRepository = $this->app->make(VendorRepository::class);

        $request = new VendorsFormRequest();
        $request->name = 'João Passareli';
        $request->email = 'joaopassareli@gmail.com';

        //Act
        $vendor = $vendorRepository->add($request->name, $request->email);
        $vendorRepository->destroy($vendor);

        // Assert
        $this->assertDatabaseMissing('vendors', ['name' => 'João Passareli']);
    }
}

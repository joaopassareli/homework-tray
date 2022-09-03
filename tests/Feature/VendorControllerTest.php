<?php

namespace Tests\Feature;

use Tests\TestCase;
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
        $this->assertDatabaseHas('vendors', ['name' => 'João Passareli']);
        $this->assertDatabaseHas('vendors', ['email' => 'joaopassareli@gmail.com']);
    }
}

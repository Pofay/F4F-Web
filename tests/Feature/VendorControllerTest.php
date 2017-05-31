<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VendorControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
	use DatabaseMigrations;

    public function testGetReturnsResponseWithCorrectStatusCode()
    {
        $response = $this->get('/api/v1/vendor');

        $response->assertStatus(200);
    }

	public function testGetWithIdReturnsCorrespondingVendor()
	{
		$vendor = factory(\App\Vendor::class)->create([
			'name' => 'Pofay'
		]);

		$item = factory(\App\Item::class)->create([
			'vendor_id' => $vendor->id,
			'name' => 'Potato',
			'quantity' => 6,
			'price' => 4.25
		]);
	
		$expected = [
			'vendor_name' => 'Pofay',
			'items' => 
			[
				'vendor_id' => $vendor->id,
				'id' => $item->id,
				'name' => 'Potato',
				'quantity' => 6,
				'price' => 4.25
			]
		];

		$response = $this->get('/api/v1/vendor/'.$vendor->id);

		$response->assertJson($expected);
	}

	public function testGetReturnsAListOfAllVendors() 
	{
        $vendor = factory(\App\Vendor::class)->create([
			'name' => 'Pofay'
		]);


		$expected = [
			'vendors' =>
		   	[
				[
				    'id' => $vendor->id,
				    'name' => $vendor->name
				]
			]
		];


		$response = $this->get('api/v1/vendor');

		$response->assertJson($expected);
	}
}

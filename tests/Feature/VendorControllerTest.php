<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
class VendorControllerTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetReturnsResponseWithCorrectStatusCode()
    {
        $response = $this->get('api/vendors');

        $response->assertStatus(200);
    }

	public function testPostReturnsResponseWithCorrectStatusCode()
	{
		$json = [
			'name' => 'John Doe',
			'password' => Hash::make('doe456')
		];

		$response = $this->post('api/vendors', $json);

		$response->assertStatus(201);
    }

	public function testGetAfterPostReturnsPostedVendor()
	{
         $json = [
			'name' => 'Johnny Blaze',
			'password' => Hash::make('blazing')
		];

		$this->post('api/vendors', $json);
		$response = $this->get('api/vendors');

		$response->assertJsonFragment(
			['id' => 1,'name' => 'Johnny Blaze']
		);
	}

	public function testGetWithVendorIdReturnsVendorInformation()
	{
		$user = factory(\App\User::class)->create(
			[
				'name' => 'Pofay'
			]
		);

		$response = $this->get('api/vendors/'. $user->id);
		
		$response->assertJsonFragment(
			[
			'id' => $user->id,
			'name' => $user->name ,
			'products_link' => 'api/vendors/'.$user->id.'/products' ,
			'method' => 'GET'
		    ]
		);
	}


}

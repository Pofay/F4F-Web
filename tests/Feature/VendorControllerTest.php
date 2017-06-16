<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
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


}

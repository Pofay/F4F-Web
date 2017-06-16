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


}

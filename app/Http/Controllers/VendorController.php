<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{

	public function index()
	{
		return response()->json(['vendors' => [ 'vendor' => ['id' => 1, 'name' => 'Johnny Blaze']]]);
	}

	public function create(Request $request)
	{
		return $this->response->created();
	}

	public function show($id)
	{
		return response()->json(['vendor' => ['id' => 1, 'name' => 'Pofay', 'products_link' => 'api/vendors/'.$id.'/products',
			                                  'method' => 'GET']]);
	}
}

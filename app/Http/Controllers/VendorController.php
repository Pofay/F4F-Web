<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Item;

class VendorController extends Controller
{
	public function index()
	{
		return response('',200);
	}

	public function create(Request $request)
	{
		return $this->response->created();
	}
}

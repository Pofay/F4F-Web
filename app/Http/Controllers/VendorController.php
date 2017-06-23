<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;

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
		$user = User::findOrfail($id);
/*		return response()->json([
			'vendor' => 
			[
				'id' => $user->id,
				'name' => $user->name,
				'products_link' => 'api/vendors/'.$user->id.'/products',
				'method' => 'GET'
			]
		]); */
		return $this->response->item($user, new UserTransformer);
	}
}

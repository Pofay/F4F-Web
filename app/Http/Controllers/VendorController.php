<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Item;

class VendorController extends Controller
{
	public function index()
	{

	}
   public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$items = Item::where('vendor_id' , $id)->first();
		$response = [
			'vendor_name' => 'Pofay',
			'items' => 
			[
				'id' => $items->id,
				'vendor_id' => $items->vendor_id,
				'name' => $items->name,
				'quantity' => $items->quantity,
				'price' => $items->price
			]
		];

		return response()->json($response,200);
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}

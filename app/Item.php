<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $fillable = ['vendor_id', 'name', 'quantity', 'price'];
}
?>

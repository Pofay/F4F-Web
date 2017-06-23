<?php
namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	public function transform(User $user)
	{
		return [
			'id' => $user->id,
			'name' => $user->name,
			'products_link' => 'api/vendors/'.$user->id.'/products',
			'method' => 'GET'
		];
	}
}
?>

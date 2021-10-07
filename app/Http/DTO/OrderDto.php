<?php

namespace App\Http\DTO;

use App\Http\Requests\OrderRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class OrderDto
{
    public int $id;
    public int $productId;

    public function transform(OrderRequest $request, $id = null)
    {
        if ($request->filled('productId') !== null) {
            $this->productId = $request->get('productId');
        }
        if (Auth::user()->getAuthIdentifier() !== null) {
            $this->id = Auth::user()->getAuthIdentifier();
        }

        return $this;
    }

}

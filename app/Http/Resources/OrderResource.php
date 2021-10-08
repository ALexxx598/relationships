<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'Order' => [
                'time' => $this->created_at,
                'product_id' =>$this->product_id,
                'cash_of_order' => $this->cashProduct,
            ],
            'Product' => [
                'product_name' => $this->name,
                'product_price' => $this->price,
                'product_size' => $this->size,
            ],
        ];
    }
}

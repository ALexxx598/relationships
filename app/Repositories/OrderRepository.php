<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\User;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class OrderRepository.
 */
class OrderRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Order::class;
    }

    public function insert($dto)
    {
        $user = User::find($dto->id);
        $user->orders()->create([
            'product_id' => $dto->productId
        ]);
        return true;
    }
}

<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

    public function insert($dto, $price)
    {
        $user = User::find($dto->id);
        $result = $user->orders()->create([
            'cashProduct' => $price,
            'product_id' => $dto->productId,
        ]);
        return $result;
    }

    public function show($user_id)
    {
        $user = User::find($user_id);
        $orders = $user->orders()->select('orders.created_at','orders.product_id','orders.cashProduct','products.name', 'products.price', 'products.size')
            ->join('products','orders.product_id','=','products.product_id')
            ->get();
        return $orders;
    }

    public function showWithProduct($id)
    {
        $order = Order::find($id);
        $result = $order->products()->select("*")->get();
        return $result;
    }

    public function destroy(int $id)
    {
        $result = DB::delete("DELETE FROM `orders` WHERE `id` = $id");
        return $result;
    }

    public function getPriceById($productId)
    {
        $price = DB::select("SELECT `price` FROM `products` WHERE `product_id` = $productId");
        return $price[0]->price;
    }
}

<?php

namespace App\Services;


use App\Repositories\OrderRepository;
use Illuminate\Foundation\Auth\User;
use mysql_xdevapi\CollectionModify;

/**
 * Class OrderService
 * @package App\Services
 */
class OrderService
{
    public OrderRepository $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    public function store($dto)
    {
        $price = $this->orderRepository->getPriceById($dto->productId);
        $result = $this->orderRepository->insert($dto, $price);
        return $result;
    }

    public function showOrders($user_id)
    {
        $result = $this->orderRepository->show($user_id);
        return $result;
    }

    public function showWithProduct($id)
    {
        $result = $this->orderRepository->showWithProduct($id);
        return $result;
    }

    public function deleteOrder(int $id)
    {
        $result = $this->orderRepository->destroy($id);
        return $result;
    }

}

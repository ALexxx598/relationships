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
        $result = $this->orderRepository->insert($dto);
        return $result;
    }

    public function showOrders($user_id)
    {
        $result = $this->orderRepository->show($user_id);
        return $result;
    }

    public function showWithProduct($product_id)
    {
        $result = $this->orderRepository->showWithProduct($product_id);
        return $result;
    }
}

<?php

namespace App\Services;


use App\Repositories\OrderRepository;

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
}

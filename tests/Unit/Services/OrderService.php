<?php

namespace Tests\Unit\Services;

use App\Http\DTO\OrderDto;
use App\Repositories\OrderRepository;
use mysql_xdevapi\Result;
use PHPUnit\Framework\TestCase;

class OrderService extends TestCase
{
    public OrderRepository $orderRepositoryMock;

    public OrderDto $orderDto;

    public function setUp(): void
    {
        $this->orderRepositoryMock = $this->createMock(OrderRepository::class);
        $this->orderDto = new OrderDto();
        $this->orderDto->productId = rand(1,10);
    }

    public function testStore()
    {
        $this->orderRepositoryMock->expects($this->once())->method('getPriceById')->willReturn(rand(1,5000));
        $this->orderRepositoryMock->expects($this->once())->method('insert')->willReturn(true);
        $orderService = new \App\Services\OrderService($this->orderRepositoryMock);
        $result = $orderService->store($this->orderDto);
        $this->assertTrue($result);
    }
}

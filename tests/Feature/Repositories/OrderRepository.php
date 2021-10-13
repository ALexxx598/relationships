<?php

namespace Tests\Feature\Repositories;

use App\Http\DTO\OrderDto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderRepository extends TestCase
{
    public \App\Repositories\OrderRepository $orderRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->orderRepository = new \App\Repositories\OrderRepository();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShow()
    {
        $id = rand(1,10);
        $this->assertDatabaseHas('orders', [
            'id' => $id,
        ]);
        $response = $this->orderRepository->show($id);
        $this->assertNotNull($response);
    }

    public function testShowWithProduct()
    {
        $id = rand(1,10);
        $this->assertDatabaseHas('orders', [
            'id' => $id,
        ]);
        $response = $this->orderRepository->showWithProduct($id);
        $this->assertNotNull($response);
    }

    public function testDestroy()
    {
        $id = rand(1,10);
        $response = $this->orderRepository->destroy($id);
        $this->assertDeleted('orders',[
            'id' => $id
        ]);
        $this->assertEquals(1, $response);
    }

    public function testGetPriceById()
    {
        $id = rand(1,10);
        $this->assertDatabaseHas('products', [
            'id' => $id,
        ]);
        $response = $this->orderRepository->getPriceById($id);
        $this->assertNotNull($response);
        $this->assertIsFloat($response);
    }

    public function testInsert()
    {
        $dto = new OrderDto();
        $dto->productId = rand(1,50);
        $dto->id = rand(1,10);
        $this->assertDatabaseHas('users', [
            'id' => $dto->id,
        ]);
        $this->assertDatabaseHas('products', [
            'id' => $dto->productId,
        ]);
        $price = $this->orderRepository->getPriceById($dto->productId);
        $this->assertNotNull($price);
        $this->assertIsFloat($price);

        $response = $this->orderRepository->insert($dto,$price);
        $this->assertNotNull($response);
    }

}

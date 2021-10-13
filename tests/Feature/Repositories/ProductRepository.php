<?php

namespace Tests\Feature\Repositories;

use App\Http\DTO\ProductDTO;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use League\CommonMark\Extension\CommonMark\Node\Block\ThematicBreak;
use Tests\TestCase;

class ProductRepository extends TestCase
{
    public \App\Repositories\ProductRepository  $productRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->productRepository = new \App\Repositories\ProductRepository();
    }

    public function testShow()
    {
        $id = rand(1,50);
        $this->assertDatabaseHas('products', [
            'id' => $id
        ]);
        $response = $this->productRepository->show($id);
        $this->assertNotNull($response);
    }

    public function testDeleteProduct()
    {
        $id = rand(1,50);
        $this->assertDatabaseHas('products', [
            'product_id' => $id
        ]);
        $response = $this->productRepository->deleteProduct($id);
        $this->assertDeleted('products', ['product_id' => $id]);
        $this->assertEquals(1 , $response);
    }
    public function testInsert()
    {
        $dto = new ProductDTO();
        $dto->name = rand(1,100) . "name";
        $dto->price = doubleval(rand(100, 50000));
        $dto->color = rand(1,100) . "color";
        $response = $this->productRepository->insert($dto);
        $this->assertEquals(1, $response);
    }
    public function testUpdateProduct()
    {
        $dto = new ProductDTO();
        $dto->id = rand(1,50);
        $this->assertDatabaseHas('products', ['id' => $dto->id]);
        $dto->name = rand(1,100) . "name";
        $dto->price = rand(100, 50000);
        $dto->color = rand(1,100) . "color";
        $response = $this->productRepository->updateproduct($dto);
        $this->assertEquals(1, $response);
    }
    public function testShowAll()
    {
        $perPage = 10;
        $response = $this->productRepository->showAll($perPage);
        $this->assertNotNull($response);
    }
}

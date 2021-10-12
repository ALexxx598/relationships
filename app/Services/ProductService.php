<?php

namespace App\Services;

use App\Exceptions\PriceExeption;
use App\Repositories\ProductRepository;
use League\CommonMark\Extension\CommonMark\Node\Block\ThematicBreak;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService
{
    public ProductRepository $productrepo;

    public function __construct(?ProductRepository $productRepository)
    {
        if($productRepository==null){ $this->productrepo = new ProductRepository();}
        else {$this->productrepo = $productRepository;}
    }

    public function show($id)
    {
        $response = $this->productrepo->show($id);
        return $response;
    }

    public function delete(int $id)
    {
        $result = $this->productrepo->deleteProduct($id);
        return $result;
    }

    public function store($dto)
    {
        if($dto->price!=null && $dto->price > 0) {
            $result = $this->productrepo->insert($dto);
        } else {
            throw new PriceExeption();
        }
        return $result;
    }

    public function update($dto)
    {
        if($dto->price!=null && $dto->price > 0) {
            $result = $this->productrepo->updateproduct($dto);
        } else {
            throw new PriceExeption();
        }
        return $result;
    }

    public function showAll($perPage)
    {
        $result = $this->productrepo->showAll($perPage);
        return $result;
    }

}

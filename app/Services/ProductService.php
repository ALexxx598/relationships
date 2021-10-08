<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use League\CommonMark\Extension\CommonMark\Node\Block\ThematicBreak;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService
{
    public ProductRepository $productrepo;

    public function __construct()
    {
        $this->productrepo = new ProductRepository();
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

}

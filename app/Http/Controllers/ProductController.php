<?php

namespace App\Http\Controllers;

use App\Exceptions\NotStoreException;
use App\Exceptions\NotUpdateException;
use App\Http\DTO\ProductDTO;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public ProductService $productService;

    public ProductDTO $productDTO;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->productDTO =  new ProductDTO();
    }

    public function index()
    {
        //
    }

    public function store(ProductRequest $request)
    {
        $dto = $this->productDTO->transform($request);
        $result = $this->productService->store($dto);
        if(!$result){ throw new NotStoreException;}
        return response()->json($result);
    }

    public function show($id)
    {
        //
    }

    public function showAll(?int $perPage = 10)
    {
        $response = $this->productService->showAll($perPage);
        return response()->json($response);
    }

    public function showProductWithOrders($id)
    {
        $response = $this->productService->show($id);
        return ProductResource::make($response);
    }

    public function update(ProductRequest $request, $id)
    {
        $dto = $this->productDTO->transform($request);
        $result = $this->productService->update($dto);
        if(!$result){ throw new NotUpdateException;}
        return response()->json($result);
    }

    public function destroy($id)
    {
        $response = $this->productService->delete($id);
        return $response ;
    }
}

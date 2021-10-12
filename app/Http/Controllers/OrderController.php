<?php

namespace App\Http\Controllers;



use App\Http\DTO\OrderDto;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Services\OrderService;
use App\Services\UserService;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public OrderDto $orderDto;

    public OrderService $orderService;

    public function __construct()
    {
        $this->orderDto = new OrderDto();
        $this->orderService = new OrderService();
    }

    public function index()
    {
        return 0;
    }

    public function store(OrderRequest $request)
    {
        $dto = $this->orderDto->transform($request);
        $response = $this->orderService->store($dto);
        return response()->json(OrderResource::make($response));
    }
    public function show($id)
    {
        $response = $this->orderService->showWithProduct($id);
        return response()->json($response);
    }

    public function showAllOrders()
    {
        $response = $this->orderService->showOrders(auth()->user()->getAuthIdentifier());
        return OrderResource::collection($response);
    }

    public function update(Request $request, $id)
    {
        return  0;
    }

    public function destroy($id)
    {
        $response = $this->orderService->deleteOrder($id);
        return response()->json($response);
    }

}

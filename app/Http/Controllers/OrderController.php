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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 4;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $dto = $this->orderDto->transform($request);
        $response = $this->orderService->store($dto);
        return response()->json(OrderResource::make($response));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return  0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  2;
    }

}

<?php

namespace App\Http\Controllers;



use App\Http\DTO\OrderDto;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use App\Services\UserService;
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
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  1;
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

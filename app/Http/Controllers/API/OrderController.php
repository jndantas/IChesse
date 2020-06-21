<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function store(StoreOrder $request)
    {
        $order = $this->orderService->createNewOrder($request->all());

        return new OrderResource($order);
    }

    public function show($identify)
    {
        if (!$order = $this->orderService->getOrderByIdentify($identify)) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new OrderResource($order);
    }
}

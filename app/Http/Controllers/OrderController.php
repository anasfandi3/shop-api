<?php

namespace App\Http\Controllers;

use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Order\OrdersResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrdersResource::collection(Order::all());
        return response()->json(compact('orders'));
    }

    public function show(Order $order)
    {
        return response()->json(['order' => new OrderResource($order)]);
    }
}

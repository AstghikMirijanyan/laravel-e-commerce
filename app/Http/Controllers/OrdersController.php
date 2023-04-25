<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeOrderStatusRequest;
use App\Http\Requests\CreateOrdersRequest;
use App\Models\Orders;
use App\Services\Interfaces\OrdersServicesInterfaces;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * @var OrdersServicesInterfaces
     */
    private $orderService;

    /**
     * Create products Controller constructor.
     * @param OrdersServicesInterfaces $orderService
     */
    public function __construct(OrdersServicesInterfaces $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = $this->orderService->getOrders(auth()->user()->id);

        return view('orders.index', compact('orders'));
    }

    /**
     * Create Order
     * @param CreateOrdersRequest $request
     */
    public function createOrder(CreateOrdersRequest $request)
    {
        $data = $request->all();
        $this->orderService->createOrder($data);

        return back()->with('success', 'Order successfully created.');
    }

    /**
     * Create Order
     * @param ChangeOrderStatusRequest $request
     */
    public function changeOrderStatus(ChangeOrderStatusRequest $request)
    {
        $request->validated();
        $this->orderService->changeOrderStatus($request['order_id'], $request['status']);

        return back()->with('success', 'Order successfully updated.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}

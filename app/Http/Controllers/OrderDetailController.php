<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::with(['order', 'product'])->get(); // Relación con órdenes y productos
        return view('Laptops.order_details.index', compact('orderDetails'));
    }

    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        return view('Laptops.order_details.create', compact('orders', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        OrderDetail::create($request->all());
        return redirect()->route('order_details.index')->with('success', 'Order detail created successfully!');
    }

    public function show(OrderDetail $orderDetail)
    {
        return view('order_details.show', compact('orderDetail'));
    }

    public function edit(OrderDetail $orderDetail)
    {
        $orders = Order::all();
        $products = Product::all();
        return view('Laptops.order_details.edit', compact('orderDetail', 'orders', 'products'));
    }

    public function update(Request $request, OrderDetail $orderDetail)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $orderDetail->update($request->all());
        return redirect()->route('order_details.index')->with('success', 'Order detail updated successfully!');
    }

    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return redirect()->route('order_details.index')->with('success', 'Order detail deleted successfully!');
    }
}

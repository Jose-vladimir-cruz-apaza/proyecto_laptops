<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get(); // Incluye información del usuario
        return view('Laptops.orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all(); // Para seleccionar un usuario en el formulario
        return view('Laptops.orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Completed,Cancelled',
        ]);

        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $users = User::all(); // Para el select de usuarios
        return view('Laptops.orders.edit', compact('order', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Completed,Cancelled',
        ]);

        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Mostrar el carrito
    public function index()
    {
        $carts = Cart::with('product')->get(); // Incluye los datos del producto
        return view('Laptops.cart.index', compact('carts'));
    }

    // Mostrar el formulario para agregar un producto al carrito
    public function create()
    {
        $products = Product::all(); // Obtiene todos los productos
        return view('Laptops.cart.create', compact('products'));
    }

    // Almacenar un producto en el carrito
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Cart::create($request->all());
        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito.');
    }

    // Mostrar el formulario para editar un producto en el carrito
    public function edit(Cart $cart)
    {
        $products = Product::all();
        return view('Laptops.cart.edit', compact('cart', 'products'));
    }

    // Actualizar un producto en el carrito
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->update($request->all());
        return redirect()->route('cart.index')->with('success', 'Producto actualizado en el carrito.');
    }

    // Eliminar un producto del carrito
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
    }
}

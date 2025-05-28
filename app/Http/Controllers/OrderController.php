<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('items.product')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*' => 'integer|min:0',
            'comment' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'comment' => $request->comment,
                'status' => 'new',
                'total_price' => 0,
            ]);

            $total = 0;

            foreach ($request->products as $productId => $quantity) {
                if ($quantity > 0) {
                    $product = Product::findOrFail($productId);
                    $total += $product->price * $quantity;

                    $order->items()->create([
                        'product_id' => $productId,
                        'quantity' => $quantity,
                    ]);
                }
            }

            $order->update(['total_price' => $total]);
        });

        return redirect()->back()->with('success', 'Заказ успешно создан');
    }

    public function show(Order $order)
    {
        $order->load('items.product');

        return view('orders.show', compact('order'));
    }


    public function complete(Order $order)
    {
        $order->update(['status' => 'completed']);
        return redirect()->route('orders.show', $order)->with('success', 'Статус обновлён');
    }
}

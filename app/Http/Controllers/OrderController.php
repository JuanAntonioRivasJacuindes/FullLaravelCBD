<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        // Crear una nueva orden
        $order = new Order();
        $order->order_id = 'ORD-' . uniqid();
        $order->user_id = $user->id;
        $order->address_id = $request->input('address_id');
        $order->amount = 0; // Se calculará más adelante
        $order->status = 'pending';
        $order->payment_method = $request->input('payment_method');
        $order->transaction_id = $request->input('transaction_id');
        $order->save();

        // Agregar productos a la orden
        $products = $request->input('products', []);
        foreach ($products as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $order->products()->attach($product->id, ['quantity' => $quantity]);
            }
        }

        // Calcular el total de la orden
        $order->amount = $order->products()->sum('price');
        $order->save();

        return response()->json(['message' => 'Orden creada exitosamente.', 'order_id' => $order->order_id], 201);
    }
    public function markAsPaid(Order $order)
    {
        $order->status = 'paid';
        $order->save();

        return response()->json(['message' => 'Orden marcada como pagada.'], 200);
    }

    public function markAsCancelled(Order $order)
    {
        $order->status = 'cancelled';
        $order->save();

        return response()->json(['message' => 'Orden marcada como cancelada.'], 200);
    }

    public function markAsProcessing(Order $order)
    {
        $order->status = 'processing';
        $order->save();

        return response()->json(['message' => 'Orden marcada como en proceso.'], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function order(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $product = Product::query()->find($productId);

        if ($product->available_stock < $quantity) {
            return response()->json([
                'message' => 'Failed to order this product due to unavailability of the stock'
            ], 400);
        }

        $product->decrement('available_stock', $quantity);

        return response()->json([
            'message' => 'You have successfully ordered this product.'
        ], 201);
    }
}

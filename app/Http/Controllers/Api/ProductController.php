<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product); // fails returning 404 http status code in response
    }

    public function store(Request $request)
    {
        try {
            $product = Product::create([
                'name' => $request->input('name'),
                'sku' => $request->input('sku'),
            ]);

            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "couldn't create new product"
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        try {
            $product->name = $reuest->input('name');
            $product->sku = $reuest->input('sku');

            $product->save();

            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "couldn't update product"
            ], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        try {
            $product->delete();

            return response()->json([
                'message' => 'product deleted'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "couldn't delete product"
            ], 500);
        }
    }
}

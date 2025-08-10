<?php
// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'food_name' => 'required|string|max:255',
            'food_rating' => 'required|numeric|between:0,5',
            'food_image' => 'required|url',
            'restaurant_name' => 'required|string|max:255',
            'restaurant_logo' => 'required|url',
            'restaurant_status' => 'required|in:open,closed'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'food_name' => 'required|string|max:255',
            'food_rating' => 'required|numeric|between:0,5',
            'food_image' => 'required|url',
            'restaurant_name' => 'required|string|max:255',
            'restaurant_logo' => 'required|url',
            'restaurant_status' => 'required|in:open,closed'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
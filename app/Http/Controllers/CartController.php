<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct(ProductService $pservices)
    {
        $this->pservices = $pservices;
    }

    public function AddProductInCart(Request $request)
    {
        try {

            if (Auth::check()) {
                $product = Product::where('id', $request->product_id)->whereDoesntHave('users')->first();

                if ($product) {
                    $product->users()->attach(Auth::user()->id);
                    $data['product_id'] = $product->id;
                    $data['getUserCart'] = count($this->pservices->getUserCart());
                    return response()->json(['statusCode' => 200, 'message' => 'Added to cart!', 'data' => $data]);
                } else {
                    return response()->json(['statusCode' => 404, 'message' => 'Already Added!']);
                }
            } else {
                return response()->json(['statusCode' => 500, 'message' => 'Please Login First']);
            }
        } catch (Exception $e) {
            return response()->json(['statusCode' => 500, 'message' => 'Something Went Wrong!', 'error' => $e->getMessage()]);
        }
    }

    public function RemoveProductInCart(Request $request)
    {
        try {

            if (Auth::check()) {
                $product = Product::where('id', $request->product_id)->whereHas('users')->first();

                if ($product) {
                    $product->users()->detach();
                    $data['product_id'] = $product->id;
                    $data['getUserCart'] = count($this->pservices->getUserCart());
                    return response()->json(['statusCode' => 200, 'message' => 'Removed from cart!', 'data' => $data]);
                } else {
                    return response()->json(['statusCode' => 404, 'message' => 'Already Removed!']);
                }
            } else {
                return response()->json(['statusCode' => 500, 'message' => 'Please Login First']);
            }
        } catch (Exception $e) {
            return response()->json(['statusCode' => 500, 'message' => 'Something Went Wrong!', 'error' => $e->getMessage()]);
        }
    }
}

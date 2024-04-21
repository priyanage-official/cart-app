<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct(ProductService $pservices)
    {
        $this->pservices = $pservices;
    }

    public function index($id)
    {
        $data['productData'] = Product::where('id', $id)->first();
        $data['userCart'] = Auth::check() ? $this->pservices->getUserCart() : [];

        return view('product-details', $data);
    }
}

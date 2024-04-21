<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct(ProductService $pservices)
    {
        $this->pservices = $pservices;
    }

    public function index()
    {
        $data['productData'] = Product::all();
        $data['userCart'] = [];
        if (Auth::check()) {
            $data['userCart'] = $this->pservices->getUserCart();
        }

        return view('welcome', $data);
    }
}

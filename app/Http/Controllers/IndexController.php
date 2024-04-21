<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data['productData'] = Product::all();
        return view('welcome', $data);
    }
}

<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    public function getUserCart()
    {
        return Product::whereHas('users', function ($query) {
            $query->where('id',  Auth::user()->id);
        })->pluck('id')->toArray();
    }
}

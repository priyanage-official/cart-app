<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

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

    //Product Admin Blade Page
    public function productListView()
    {
        return view('admin.modules.product_list');
    }

    //Product Datatable
    public function fetchProductList()
    {
        $data = Product::orderBy('id', 'desc');

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('product_image', function ($row) {
                return '<img src="' . $row->product_image . '" class="img-responsive" style="width: 100px;height: 100px;">';
            })
            ->addColumn('product_price', function ($row) {
                return '$'. $row->product_price;
            })
            ->rawColumns(['product_image','product_price'])
            ->make(true);
    }
}

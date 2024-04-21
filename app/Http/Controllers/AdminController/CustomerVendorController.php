<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerVendorController extends Controller
{
    public function customerListView()
    {
        return view('admin.modules.customer_list');
    }
}

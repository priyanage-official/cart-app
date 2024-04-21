<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;

class CustomerVendorController extends Controller
{
    //Customer Blade Page
    public function customerListView()
    {
        return view('admin.modules.customer_list');
    }

    //Customer Datatable
    public function fetchCustomerList()
    {
        $data = User::whereHas('roles', function ($query) {
            $query->where('id', 1);
        });

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('profile_pic', function ($row) {
                return '<img src="assets/' . $row->profile_pic . '" class="img-responsive" style="width: 100px;height: 100px;">';
            })
            ->addColumn('dob', function ($row) {
                $dob = '';
                if ($row->dob) {
                    $dob = Carbon::createFromFormat('Y-m-d', $row->dob)->format('d-m-Y');
                }
                return $dob;
            })
            ->rawColumns(['profile_pic', 'dob'])
            ->make(true);
    }

    //Vendor Blade Page
    public function vendorListView()
    {
        return view('admin.modules.vendor_list');
    }

    //Vendor Datatable
    public function fetchVendorList()
    {
        $data = User::whereHas('roles', function ($query) {
            $query->where('id', 2);
        });

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('profile_pic', function ($row) {
                return '<img src="assets/' . $row->profile_pic . '" class="img-responsive" style="width: 100px;height: 100px;">';
            })
            ->addColumn('dob', function ($row) {
                $dob = '';
                if ($row->dob) {
                    $dob = Carbon::createFromFormat('Y-m-d', $row->dob)->format('d-m-Y');
                }
                return $dob;
            })
            ->rawColumns(['profile_pic', 'dob'])
            ->make(true);
    }
}

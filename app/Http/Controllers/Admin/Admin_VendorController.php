<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class Admin_VendorController extends Controller
{
    //
    public function index()
    {
        $vendors = Vendor::orderBy('id', 'desc')
                           ->paginate(20);
        return view('admin.vendors.index', compact('vendors'));
    }
}

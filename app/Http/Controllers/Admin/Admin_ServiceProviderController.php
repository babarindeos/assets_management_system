<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;

class Admin_ServiceProviderController extends Controller
{
    //
    public function index()
    {
        $service_providers = ServiceProvider::orderBy('provider_name','asc')->paginate(20);
        return view('admin.maintenance.service_providers.index', compact('service_providers')); 
    }
}

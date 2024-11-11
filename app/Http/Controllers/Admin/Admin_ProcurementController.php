<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procurement;

class Admin_ProcurementController extends Controller
{
    //
    public function index()
    {
        $requests = Procurement::orderBy('id', 'desc')
                                 ->paginate(10);                 
        return view('admin.procurements.purchase_requests.index', compact('requests'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrder;

class Admin_WorkOrderController extends Controller
{
    //
    public function index()
    {
        
        $workorders = WorkOrder::orderBy('id', 'desc')->paginate(20);
        return view('admin.maintenance.work_orders.index', compact('workorders'));
    }
   
}

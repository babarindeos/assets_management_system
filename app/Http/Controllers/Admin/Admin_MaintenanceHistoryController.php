<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrder;

class Admin_MaintenanceHistoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $maintainable_assets = "";
        $history_data = null;
        $isPostBack = false;

        /* $maintainable_assets = WorkOrder::select('id', 'asset_id')
                                          ->where('user_id', auth()->user()->id)->distinct()
                                          ->with(['asset'=>function($query){
                                                    $query->select('id', 'uuid', 'item');
                               }])->get(); */

        $maintainable_assets = WorkOrder::select('id', 'asset_id')
                                         ->distinct()
                                         ->get();

        if ($request->input('asset') != '')
        {
           $isPostBack = true;
           $history_data = WorkOrder::where('asset_id', $request->input('asset'))->get();           
        }
        
        

        return view('admin.maintenance.history.index')->with(['maintenance_history'=>$history_data, 'isPostBack'=>$isPostBack, 'assets'=>$maintainable_assets]); 
    }
}

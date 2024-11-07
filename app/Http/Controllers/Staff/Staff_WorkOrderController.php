<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\WorkOrder;
use Illuminate\Support\Facades\Auth;


class Staff_WorkOrderController extends Controller
{
    //
    

    public function create()
    {
        $assets = Asset::where('user_id', auth()->user()->id)
                         ->orderBy('item', 'asc')->get();
        return view('staff.maintenance.workorders.create', compact('assets'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'asset' => 'required',
            'maintenance_type' => 'required',
            'priority_level' => 'required',
            'assigned_personnel' => 'required',
            'scheduled_date_time' => 'required',

        ]);

        $formFields['asset_id'] = $request->input('asset');
        $formFields['description'] = $request->input('description');
        $formFields['requirements'] = $request->input('requirements');
        $formFields['user_id'] = Auth::user()->id;

        try
        {
            $create = WorkOrder::create($formFields);

            if ($create)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'The Work Order has been successfully submitted'
                ];
            }
            else
            {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred submitting the Work Order'
                ];
            }
        }
        catch(\Exception $e)
        {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => $e->getMessage()
                ];
        }

        return redirect()->back()->with($data);
    }

    public function history()
    {
        $workorders = WorkOrder::where('user_id', Auth::user()->id)
                                 ->orderBy('id', 'desc')->paginate(20);
        return view('staff.maintenance.workorders.history', compact('workorders'));
    }

    public function show(WorkOrder $workorder)
    {
        return view('staff.maintenance.workorders.show', compact('workorder'));
    }

    public function edit(WorkOrder $workorder)
    {
        $assets = Asset::where('user_id', auth()->user()->id)
        ->orderBy('item', 'asc')->get();

        return view('staff.maintenance.workorders.edit', compact('workorder', 'assets'));
    }

    public function update(Request $request, WorkOrder $workorder)
    {
        $formFields = $request->validate([
            'asset' => 'required',
            'maintenance_type' => 'required',
            'priority_level' => 'required',
            'assigned_personnel' => 'required',
            'scheduled_date_time' => 'required',

        ]);

        $formFields['asset_id'] = $request->input('asset');
        $formFields['description'] = $request->input('description');
        $formFields['requirements'] = $request->input('requirements');
        $formFields['user_id'] = Auth::user()->id;

        try
        {
            $update = $workorder->update($formFields);

            if ($update)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'The Work Order has been successfully updated'
                ];
            }
            else
            {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred updating the Work Order'
                ];
            }
        }
        catch(\Exception $e)
        {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => $e->getMessage()
                ];
        }

        return redirect()->back()->with($data);
    }

    public function confirm_delete(WorkOrder $workorder)
    {
        return view('staff.maintenance.workorders.confirm_delete', compact('workorder'));
    }

    public function destroy(WorkOrder $workorder)
    {
        $workorder->delete();

        return redirect()->route('staff.maintenance.workorders.history');
    }

}

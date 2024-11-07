<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MaintenanceSchedule;
use App\Models\Asset;
use Illuminate\Support\Facades\Auth;

class Staff_MaintenanceScheduleController extends Controller
{
    //
    public function index()
    {
        $schedules = MaintenanceSchedule::where('user_id', auth()->user()->id)
                                         ->orderBy('id', 'desc')->paginate(10);
        return view('staff.maintenance.schedule.index', compact('schedules'));
    }

    public function create()
    {
        $assets = Asset::where('user_id', auth()->user()->id)
                        ->orderBy('item', 'desc')->get();
        return view('staff.maintenance.schedule.create', compact('assets'));
    }

    public function store(Request $request)
    {
        
        $formFields = $request->validate([
            'asset' => ['required', 'unique:maintenance_schedules,asset_id'],
            'frequency' => 'required',
        ]);



        $formFields['asset_id'] = $request->input('asset');
        $formFields['description'] = $request->input('description');
        $formFields['user_id'] =  Auth::user()->id;

       

        try
        {
            $create = MaintenanceSchedule::create($formFields);

            if ($create)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'The Maintenance Schedule has been created for the Item'
                ];
            }
            else
            {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred creating the Maintenance Schedule'
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

    public function edit(MaintenanceSchedule $maintenance_schedule)
    {
        $assets = Asset::where('user_id', auth()->user()->id)
                         ->orderBy('item', 'desc')->get();
        return view('staff.maintenance.schedule.edit', compact('assets', 'maintenance_schedule'));
    }

    public function update(Request $request, MaintenanceSchedule $maintenance_schedule)
    {
        $formFields = $request->validate([
            'asset' => ['required'],
            'frequency' => ['required']
        ]);

        $formFields['description'] = $request->input('description');
        $formFields['asset_id'] = $request->input('asset');

        try
        {
            $update = $maintenance_schedule->update($formFields);

            if ($update)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'The Maintenance Schedule has been successfully updated'
                ];
            }
            else
            {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred updating the Maintenance Schedule'
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

    public function confirm_delete(MaintenanceSchedule $maintenance_schedule)
    {
        return view('staff.maintenance.schedule.confirm_delete', compact('maintenance_schedule'));
    }

    public function destory(MaintenanceSchedule $maintenance_schedule)
    {
        $maintenance_schedule->delete();

        return redirect()->route('staff.maintenance.maintenance_schedules.index');
    }
}

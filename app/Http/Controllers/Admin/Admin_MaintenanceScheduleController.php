<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MaintenanceSchedule;

class Admin_MaintenanceScheduleController extends Controller
{
    //
    public function index()
    {
        $schedules = MaintenanceSchedule::orderBy('id', 'desc')->paginate(20);
        return view('admin.maintenance.schedule.index', compact('schedules'));
    }
}

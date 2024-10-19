<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\LocationType;

class Admin_LocationController extends Controller
{
    //
    public function index()
    {
        $locations = Location::orderBy('id', 'desc')->paginate(20);
        return view('admin.locations.index')->with('locations', $locations);
    }

    public function create()
    {
        $location_types = LocationType::orderBy('name', 'asc')->get();
        return view('admin.locations.create', compact('location_types'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'location_type' => 'required',
            'name' => 'required|unique:locations,name',
            'code' => 'required|unique:locations,code',
        ]);

        try
        {
            $formFields['location_type_id'] = $formFields['location_type'];

            $create = Location::create($formFields);

            if ($create)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'The Location has been successfully created'
                ];
            }
            else
            {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred creating the Location'
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


    public function show(Location $location)
    {
        return view('admin.locations.show', compact('location'));
    }

    public function confirm_delete()
    {

    }
}

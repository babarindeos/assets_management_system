<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationType;

class Admin_LocationTypeController extends Controller
{
    //
    public function index()
    {
        $location_types = LocationType::orderBy('id', 'desc')->paginate(10);
        
        return view('admin.location_types.index', compact('location_types'));
    }

    public function create()
    {
        return view('admin.location_types.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|unique:location_types,name'
        ]);

        try
        {
            $create = LocationType::create($formFields);

            if ($create)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'The Location Type has been successfully created'
                ];
            }
            else
            {
                throw new \Exception("An error occurred creating the Location Type");
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

    public function edit(LocationType $location_type)
    {
        return view('admin.location_types.edit', compact('location_type'));
    }

    public function update(Request $request, LocationType $location_type)
    {
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        try
        {
            $update = $location_type->update($formFields);

            if ($update)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'The Location Type is successfully updated'
                ];
            }
            else
            {
                throw new \Exception("An error occurred updating the Location Type");
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

    public function confirm_delete(LocationType $location_type)
    {
        return view('admin.location_types.confirm_delete', compact('location_type'));
    }
}

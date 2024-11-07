<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organ;
use App\Models\LocationType;

class Admin_OrganController extends Controller
{
    //
    public function index()
    {

        $organs = Organ::orderBy('name', 'desc')->paginate(20);
        return view('admin.organs.index', compact('organs'));
    }

    public function create()
    {
        $location_types = LocationType::orderBy('name', 'desc')->get();
        return view('admin.organs.create', compact('location_types'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'location_type' => 'required',
            'name' => 'required|unique:organs,name',
            'code' => 'required|unique:organs,code'
        ]);

        try
        {
            $formFields['location_type_id'] = $request->location_type;
            $create = Organ::create($formFields);


            if ($create)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => ' The Organ has been successfully created'
                ];

            }
            else
            {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred creating the Organ'
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

    public function edit(Organ $organ)
    {
        $location_types = LocationType::orderBy('name', 'asc')->get();

        return view('admin.organs.edit', compact('organ', 'location_types'));
    }

    public function update(Request $request, Organ $organ)
    {
        $formFields = $request->validate([
            'location_type' => 'required',
            'name' => 'required|string',
            'code' => 'required|string'
        ]);

        $formFields['location_type_id'] = $request->location_type;

        try
        {
            $update = $organ->update($formFields);

            if ($update)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'The Organ has been updated successfully'
                ];
            }
            else
            {   
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred updating the Organ'
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

    public function confirm_delete(Organ $organ)
    {
        return view('admin.organs.confirm_delete', compact('organ'));
    }
}


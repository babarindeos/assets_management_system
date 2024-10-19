<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\UserLocation;
use App\Models\Staff;

class Admin_LocationUserController extends Controller
{
    //
    public function index(Location $location)
    {
        $location_users = UserLocation::where('location_id', $location->id)->paginate(20);

                
        return view('admin.location_users.index', compact('location', 'location_users'));
    }

    public function create(Location $location)
    {
        return view('admin.location_users.create', compact('location'));
    }

    public function store(Request $request, Location $location)
    {
        $formFields = $request->validate([
            'fileno' => 'required'
        ]);

        // get userid by fileno
        $staff = Staff::where('fileno', $request->input('fileno'))->first();

        if ($staff == null)
        {
            $data = [
                'error' => true,
                'status' => 'fail',
                'message' => "There's no User with that File No."
            ];

            return redirect()->back()->with($data);
        }

        // if user has already been created for the location
        $user_already_added = UserLocation::where('user_id', $staff->user_id)
                                            ->where('location_id', $location->id)
                                            ->first();
        if($user_already_added != null)
        {
            $data = [
                'error' => true,
                'status' => 'fail',
                'message' => "The User has already been added to the Location, cannot be duplicated"
            ];

            return redirect()->back()->with($data);
        }


        try
        {
            $formFields['user_id'] = $staff->user_id;
            $formFields['location_id'] = $location->id;
           
            $create = UserLocation::create($formFields);

            if ($create)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => "The User has been successfully added to the Location"
                ];
            }
            else
            {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => "An error occurred adding the user to the location"
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


    public function destroy(Request $request, Location $location, UserLocation $location_user)
    {
        $location_user->delete();

        return redirect()->back();
    }
}

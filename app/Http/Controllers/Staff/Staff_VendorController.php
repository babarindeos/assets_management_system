<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;


class Staff_VendorController extends Controller
{
    //
    public function index()
    {
        $vendors = Vendor::where('user_id', auth()->user()->id)
                           ->orderBy('id', 'desc')
                           ->paginate(20);
        return view('staff.vendors.index', compact('vendors'));
    }

    public function create()
    {
        return view('staff.vendors.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'business_name' => 'required|string|unique:vendors,business_name',
            'contact_person' => 'required',
            'contact_phone' => 'required',
        ]);

        $formFields['email'] = $request->input('email');
        $formFields['user_id'] = auth()->user()->id;

        try
        {
            $create = Vendor::create($formFields);

            if ($create)
            {
                $data = [
                    'error'=> true,
                    'status'=> 'success',
                    'message'=> 'The Vendor is successfully created'
                ];
            }
            else
            {
                $data = [
                    'error'=> true,
                    'status'=> 'fail',
                    'message'=> 'An error occurred creating the Vendor'
                ];

            }
        }
        catch(\Exception $e)
        {
            $data = [
                'error'=> true,
                'status'=> 'fail',
                'message'=> $e->getMessage()
            ];
        }

        return redirect()->back()->with($data);
    }

    public function edit(Vendor $vendor)
    {
        return view('staff.vendors.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $formFields = $request->validate([
            'business_name' => 'required|string',
            'contact_person' => 'required',
            'contact_phone' => 'required',
        ]);

        $formFields['email'] = $request->input('email');
        $formFields['user_id'] = auth()->user()->id;

        try
        {
            $update = $vendor->update($formFields);

            if ($update)
            {
                $data = [
                    'error'=> true,
                    'status'=> 'success',
                    'message'=> 'The Vendor has been successfully updated'
                ];
            }
            else
            {
                $data = [
                    'error'=> true,
                    'status'=> 'fail',
                    'message'=> 'An error occurred updating the Vendor'
                ];

            }
        }
        catch(\Exception $e)
        {
            $data = [
                'error'=> true,
                'status'=> 'fail',
                'message'=> $e->getMessage()
            ];
        }

        return redirect()->back()->with($data);
    }

    public function confirm_delete(Vendor $vendor)
    {
        return view('staff.vendors.confirm_delete', compact('vendor'));
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('staff.procurements.vendors.index');
    }
}

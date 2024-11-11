<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use App\Models\Procurement;

class Staff_ProcurementController extends Controller
{
    //
    public function index()
    {   
        $requests = Procurement::where('user_id', Auth::user()->id)
                                ->orderBy('id', 'desc')
                                ->paginate(10);                 
        return view('staff.procurements.purchase_requests.index', compact('requests'));
    }

    public function create()
    {
        $vendors = Vendor::where('user_id', auth()->user()->id)
                          ->orderBy('business_name', 'asc')
                          ->get();
        $locations = Auth::user()->locations;
        return view('staff.procurements.purchase_requests.create', compact('vendors','locations'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'item' => 'required|string',
            'quantity' => 'required',
            'cost' => 'required',
            'location' => 'required',
            'vendor' => 'required'
        ]);

        $formFields['location_id'] = $request->location;
        $formFields['vendor_id'] = $request->vendor;
        $formFields['user_id'] = Auth::user()->id;

        try
        {
            $create = Procurement::create($formFields);

            if ($create)
            {
                $data = [
                    'error'=> true,
                    'status'=> 'success',
                    'message'=> 'The Purchase Request has been successfully submitted'
                ];
            }
            else
            {
                $data = [
                    'error'=> true,
                    'status'=> 'fail',
                    'message'=> 'An error occurred submitting the Purchase Request'
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


    public function edit(Procurement $purchase_request)
    {
        $vendors = Vendor::where('user_id', auth()->user()->id)
                          ->orderBy('business_name', 'asc')
                          ->get();
        $locations = Auth::user()->locations;
         return view('staff.procurements.purchase_requests.edit', compact('purchase_request', 'locations', 'vendors'));
    }

    public function update(Request $request, Procurement $purchase_request)
    {
        $formFields = $request->validate([
            'item' => 'required|string',
            'quantity' => 'required',
            'cost' => 'required',
            'location' => 'required',
            'vendor' => 'required'
        ]);

        $formFields['location_id'] = $request->location;
        $formFields['vendor_id'] = $request->vendor;
       

        try
        {
            $update = $purchase_request->update($formFields);

            if ($update)
            {
                $data = [
                    'error'=> true,
                    'status'=> 'success',
                    'message'=> 'The Purchase Request has been successfully updated'
                ];
            }
            else
            {
                $data = [
                    'error'=> true,
                    'status'=> 'fail',
                    'message'=> 'An error occurred updating the Purchase Request'
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

    public function confirm_delete(Procurement $purchase_request)
    {
        return view('staff.procurements.purchase_requests.confirm_delete', compact('purchase_request'));
    }

    public function destroy(Procurement $purchase_request)
    {
        $purchase_request->delete();

        return redirect()->route('staff.procurements.purchase_requests.index');
    }
}

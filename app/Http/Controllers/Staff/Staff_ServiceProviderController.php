<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;


class Staff_ServiceProviderController extends Controller
{
    //
    public function index()
    {
        $service_providers = ServiceProvider::where('user_id', auth()->user()->id)
                                             ->orderBy('provider_name','asc')->paginate(10);
        return view('staff.maintenance.service_providers.index', compact('service_providers'));
    }

    public function create()
    {
        return view('staff.maintenance.service_providers.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'provider_name' => 'required|string|unique:service_providers,provider_name',
            'provider_type' => 'required',
            'contact_person' => 'required',
            'contact_phone' => 'required',
            'service_categories' => 'required'
        ]);

        $formFields['email'] = $request->input('email');
        $formFields['user_id'] = auth()->user()->id;

        try
        {
            $create = ServiceProvider::create($formFields);

            if ($create)
            {
                $data = [
                    'error'=> true,
                    'status'=> 'success',
                    'message'=> 'The Service Provider is successfully created'
                ];
            }
            else
            {
                $data = [
                    'error'=> true,
                    'status'=> 'fail',
                    'message'=> 'An error occurred creating the Service Provider'
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

    public function edit(ServiceProvider $service_provider)
    {
        return view('staff.maintenance.service_providers.edit', compact('service_provider'));
    }

    public function update(Request $request, ServiceProvider $service_provider)
    {
        $formFields = $request->validate([
            'provider_name' => 'required|string',
            'provider_type' => 'required',
            'contact_person' => 'required',
            'contact_phone' => 'required',
            'service_categories' => 'required'
        ]);

        $formFields['email'] = $request->input('email');
       

        try
        {
            $update = $service_provider->update($formFields);

            if ($update)
            {
                $data = [
                    'error'=> true,
                    'status'=> 'success',
                    'message'=> 'The Service Provider is successfully updated'
                ];
            }
            else
            {
                $data = [
                    'error'=> true,
                    'status'=> 'fail',
                    'message'=> 'An error occurred updating the Service Provider'
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

    public function confirm_delete(ServiceProvider $service_provider)
    {
        return view('staff.maintenance.service_providers.confirm_delete', compact('service_provider'));
    }

    public function delete(Request $request, ServiceProvider $service_provider)
    {

    }

}

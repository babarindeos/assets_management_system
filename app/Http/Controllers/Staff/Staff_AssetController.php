<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AssetCategory;
use App\Models\Asset;

class Staff_AssetController extends Controller
{
    //
    public function index()
    {
        $my_assets = Asset::where('user_id', Auth::id())->paginate();
        
        return view('staff.assets.index')->with('assets', $my_assets);
    }

    public function create()
    {
        $locations = Auth::user()->locations;
        $categories = AssetCategory::orderBy('name','desc')->get();
        return view('staff.assets.create', compact('locations', 'categories'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'uuid' => 'required|string|unique:assets,uuid',
            'location' => 'required',
            'category' => 'required',
            'item' => 'required'
        ]);

        $formFields['userlocation_id'] = $request->location;
        $formFields['category_id'] = $request->category; 
        $formFields['description'] = $request->input('description');
        $formFields['purchase_date'] = $request->input('purchase_date');
        $formFields['supplier'] = $request->input('supplier');
        $formFields['cost'] = $request->input('cost');
        $formFields['life_span'] = $request->input('life_span');
        $formFields['depreciation_rate'] = $request->input('depreciation_rate');
        $formFields['disposal_date'] = $request->input('disposal_date');
        $formFields['disposal_revenue'] = $request->input('disposal_revenue');
        $formFields['dispose_authority'] = $request->input('dispose_authority');
        $formFields['comment'] = $request->input('comment');
        $formFields['user_id'] = Auth::user()->id;

        try
        {
            $create = Asset::create($formFields);

            if ($create)
            {
                $data = [
                    'error'=>true,
                    'status'=>'success',
                    'message'=> 'The Asset has been successfully saved'
                ];

            }
            else
            {
                $data = [
                    'error'=>true,
                    'status'=>'fail',
                    'message'=> 'An error occurred saving the Asset'
                ];
            }

        }
        catch(\Exception $e)
        {
            $data = [
                'error'=>true,
                'status'=>'fail',
                'message'=> $e->getMessage()
            ];
        }

        return redirect()->back()->with($data);
    }

    public function show(Asset $asset)
    {
        return view('staff.assets.show', compact('asset'));
    }

    public function edit(Asset $asset)
    {
        $locations = Auth::user()->locations;
        $categories = AssetCategory::orderBy('name','desc')->get();
        return view('staff.assets.edit', compact('asset','locations','categories'));
    }

    public function update(Request $request, Asset $asset)
    {
        $formFields = $request->validate([
            'uuid' => 'required|string',
            'location' => 'required',
            'category' => 'required',
            'item' => 'required'
        ]);

        $formFields['userlocation_id'] = $request->location;
        $formFields['category_id'] = $request->category; 
        $formFields['description'] = $request->input('description');
        $formFields['purchase_date'] = $request->input('purchase_date');
        $formFields['supplier'] = $request->input('supplier');
        $formFields['cost'] = $request->input('cost');
        $formFields['life_span'] = $request->input('life_span');
        $formFields['depreciation_rate'] = $request->input('depreciation_rate');
        $formFields['disposal_date'] = $request->input('disposal_date');
        $formFields['disposal_revenue'] = $request->input('disposal_revenue');
        $formFields['dispose_authority'] = $request->input('dispose_authority');
        $formFields['comment'] = $request->input('comment');
        $formFields['user_id'] = Auth::user()->id;

        try
        {
            $update = $asset->update($formFields);

            if ($update)
            {
                $data = [
                    'error'=>true,
                    'status'=>'success',
                    'message'=> 'The Asset has been successfully updated'
                ];

            }
            else
            {
                $data = [
                    'error'=>true,
                    'status'=>'fail',
                    'message'=> 'An error occurred updating the Asset'
                ];
            }

        }
        catch(\Exception $e)
        {
            $data = [
                'error'=>true,
                'status'=>'fail',
                'message'=> $e->getMessage()
            ];
        }

        return redirect()->back()->with($data);

    }

    public function confirm_delete(Asset $asset)
    {
        return view('staff.assets.confirm_delete', compact('asset'));
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()->route('staff.assets.index');
    }
}

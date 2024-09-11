<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Branch;

class Admin_BranchController extends Controller
{
    //
    public function index()
    {
        $branches = Branch::orderBy('name', 'asc')->paginate();
        return view('admin.branches.index')->with('branches', $branches);
    }

    public function create()
    {
        $divisions = Division::orderBy('name', 'asc')->get();
        return view('admin.branches.create', compact('divisions'));
    }


    public function store(Request $request)
    {
        $formFields = $request->validate([
            'division' => ['required', 'string'],
            'name' => ['required', 'string', 'unique:branches,name'],
            'code' => ['required', 'string', 'unique:branches,code']
        ]);

        $formFields['division_id'] = $formFields['division'];

        try
        {
            $create = Branch::create($formFields);

            if ($create)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'Branch has been successfully created'
                ];
            }
            else
            {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred creating the Branch'
                ];
            }
            
        }
        catch(\Exception $e)
        {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'An error occurred'.$e->getMessage()
                ];
        }
        
        return redirect()->back()->with($data);
    }

    public function edit(Branch $branch)
    {
        $divisions = Division::orderBy('name', 'asc')->get();

        return view('admin.branches.edit', ['divisions' => $divisions, 'branch' => $branch]);
    }

    public function update(Request $request, Branch $branch)
    {
        $formFields = $request->validate([
            'division' => ['required', 'string'],
            'name' => ['required', 'string'],
            'code' => ['required', 'string'],
        ]);

        $formFields['division_id'] = $formFields['division'];

        try
        {
            $update = $branch->update($formFields);

            if ($update)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'Branch has been successfully updated'
                ];
            }
            else
            {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred updating the Branch'
                ];
            }
        }
        catch(\Exception $e)
        {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred '.$e->getMessage()
                ];
        }
        
        return redirect()->back()->with($data);

    }

    public function destroy(Branch $branch)
    {
        if ($branch == null)
        {
            return redirect()->back();
        }

        return view('admin.branches.destroy', compact('branch'));
    }

    public function confirm_delete()
    {

    }


}

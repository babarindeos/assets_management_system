<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssetCategory;

class Admin_AssetCategoryController extends Controller
{
    //
    public function index()
    {
        $categories = AssetCategory::orderBy('id','desc')->paginate(20);
        
        return view('admin.asset_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.asset_categories.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|unique:asset_categories,name'
        ]);


        try
        {
            $create = AssetCategory::create($formFields);

           if ($create)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'The Category has been successfully created'
                ];
            }
            else
            {   
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred'
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

    public function edit(AssetCategory $category)
    {
        return view('admin.asset_categories.edit', compact('category'));
    }

    public function update(Request $request, AssetCategory $category)
    {
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        try
        {
            $update = $category->update($formFields);

            if ($update)
            {
                $data = [
                    'error' => true,
                    'status' => 'success',
                    'message' => 'The Category has been successfully updated'
                ];

            }
            else
            {
                $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'An error occurred updating the category'
                ];
            }
            

        }
        catch(\Exception $e)
        {
            $data = [
                'error' => true,
                'status' => 'success',
                'message' => $e->getMessage()
            ];
        }

        return redirect()->back()->with($data);
    }
}

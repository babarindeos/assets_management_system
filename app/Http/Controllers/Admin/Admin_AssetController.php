<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\AssetCategory;

class Admin_AssetController extends Controller
{
    //
    public function index()
    {

        $assets = Asset::orderBy('id', 'desc')->paginate(20);
        return view('admin.assets.index', compact('assets'));
    }

    public function categories()
    {
        $categories = AssetCategory::with(['assets' => function($query){
            $query->orderBy('item', 'desc');
        }])->paginate(10);

        return view('admin.assets.categories', compact('categories'));
    }

    public function category_show(AssetCategory $category)
    {
        $assets = Asset::where('category_id', $category->id)->paginate(10);
        return view('admin.assets.category_show', compact('assets', 'category'));
    }

    public function show(Asset $asset)
    {
        return view('admin.assets.show', compact('asset'));
    }

    public function find_asset(Request $request)
    {
        
        $asset_data = null;
        $isPostBack = false;

        if ($request->input('q') != '')
        {
            $scope = $request->input('scope');
            $search_term = $request->input('q');
            $isPostBack = true;

            switch ($scope)
            {
                case "uuid":
                    $asset_data = Asset::where('uuid', 'LIKE', "%{$search_term}%")->orderBy('item','asc')->get();
                    break;
                case "item":
                    $asset_data = Asset::where('item', 'LIKE', "%{$search_term}%")->orderBy('item','asc')->get();
                    break;
                case 'location':
                  
                    $asset_data = Asset::query()
                                        ->with(['location.location'])                                        
                                        ->whereHas('location.location', function($query) use ($search_term){
                                                $query->where('name', 'LIKE', "%{$search_term}%");
                                        })
                                        ->orderBy('item','asc')
                                        ->get();
                                        
                    break;
                case 'supplier':
                    $asset_data = Asset::where('item', 'LIKE', "%{$search_term}%")->orderBy('item','asc')->get();
                    break;
            }
        }   


        return view('admin.assets.find_asset')->with(['assets'=>$asset_data, 'isPostBack'=>$isPostBack]);;
    }

    public function post_find_asset(Request $request)
    {
        $asset_data = null;
        $isPostBack = false;

        if ($request->input('q') != '')
        {
            $scope = $request->input('scope');
            $search_term = $request->input('q');
            $isPostBack = true;

            switch ($scope)
            {
                case "uuid":
                    $asset_data = Asset::where('uuid', 'LIKE', "%{$search_term}%")->orderBy('item','asc')->get();
                    break;
                case "item":
                    $asset_data = Asset::where('item', 'LIKE', "%{$search_term}%")->orderBy('item','asc')->get();
                    break;
                case 'location':
                  
                    $asset_data = Asset::query()
                                        ->with(['location.location'])                                        
                                        ->whereHas('location.location', function($query) use ($search_term){
                                                $query->where('name', 'LIKE', "%{$search_term}%");
                                        })
                                        ->orderBy('item','asc')
                                        ->get();
                                        
                    break;
                case 'supplier':
                    $asset_data = Asset::where('item', 'LIKE', "%{$search_term}%")->orderBy('item','asc')->get();
                    break;
            }
        }   
        
        
        return redirect()->route('admin.assets.get_find_asset')->with(['assets'=>$asset_data, 'isPostBack'=>$isPostBack]);
    }
}

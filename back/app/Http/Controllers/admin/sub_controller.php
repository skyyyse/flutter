<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\sub_categories;
use Illuminate\Support\Facades\Auth;

class sub_controller extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $sub_categories = sub_categories::select('sub_categories.*', 'categories.name AS categoryName')->join('categories', 'categories.id', '=', 'sub_categories.categories_id')->get();
        return view("admins.sub_category.index", compact("sub_categories", "admin"));
    }
    public function find(Request $request)
    {
        $sub_categories = sub_categories::find($request->id);
        return response()->json([
            'status' => 200,
            'sub_categories' => $sub_categories,
        ]);
    }
    public function delete(Request $request)
    {
        $sub_categories = sub_categories::find($request->id);
        if ($sub_categories->delete()) {
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_categories' => 'required',
            'name' => 'required',
            'slug' => 'required',
        ]);
        if ($validator->passes()) {

        $sub_categories = sub_categories::find($request->id);
        $sub_categories->name = $request->name;
        $sub_categories->categories_id = $request->sub_categories;
        $sub_categories->slug = $request->slug;
        $sub_categories->status = $request->active;
        $sub_categories->save();
            return response()->json(
                [
                    'status' => true,
                    'massage' => "Create sub_categories sucessfull",
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'massage' => $validator->errors(),
                ]
            );
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categories_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
        ]);
        if ($validator->passes()) {
            $sub_categories = new sub_categories();
            $sub_categories->categories_id = $request->categories_id;
            $sub_categories->name = $request->name;
            $sub_categories->slug = $request->slug;
            $sub_categories->status = $request->active;
            $sub_categories->save();
            return response()->json(
                [
                    'status' => true,
                    'massage' => "Create sub_categories sucessfull",
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'massage' => $validator->errors(),
                ]
            );
        }
    }
    public function create()
    {
        $admin = Auth::guard('admin')->user();
        $category = categories::orderBy('name')->get();
        return view('admins.sub_category.create', compact('category', "admin"));
    }
    public function get(Request $request)
    {
        $sub_categories = sub_categories::where('categories_id', $request->id)->orderBy('name')->get();
        return response()->json([
            'status' => 200,
            'sub_categories' => $sub_categories,
        ]);
    }
}

<?php

namespace App\Http\Controllers\admin;
use App\Models\brands;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class brands_controller extends Controller
{
    public function index(){
        $brands=brands::all();
        $admin=Auth::guard('admin')->user();
        return view("admins.brands.index",compact('brands','admin'));
    }
    public function create(){
        $admin=Auth::guard('admin')->user();
        return view("admins.brands.create_brands",compact('admin'));
    }
    public function store(Request $request){
        $brands=new brands();
        $brands->name=$request->name;
        $brands->slug=$request->slug;
        $brands->status=$request->active;
        $brands->save();
    }
    public function find(Request $request){
        $brands=brands::find($request->id);
        return response()->json([
            'status' => 200,
            'brands' => $brands,
        ]);
    }
    public function update(Request $request){
        $brands=brands::find($request->id);
        $brands->name=$request->name;
        $brands->slug=$request->slug;
        $brands->status=$request->active;
        $brands->save();
    }
    public function delete(Request $request){
        $brands=brands::find($request->id);
        $brands->delete();
        return redirect()->back();
    }
        public function get()
    {
        $brands = brands::orderBy('name', 'ASC')->get();
        return response()->json([
            'status' => 200,
            'brands' => $brands,
        ]);
    }
}

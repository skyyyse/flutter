<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class slider_controller extends Controller
{
    public function index()
    {
        $slider = slider::all();
        $admin = Auth::guard('admin')->user();
        $data = [
            'slider' => $slider,
            'admin' => $admin,
        ];
        return view('admins.slider.index', $data);
    }
    public function create()
    {
        $slider = slider::all();
        $admin = Auth::guard('admin')->user();
        $data = [
            'slider' => $slider,
            'admin' => $admin,
        ];
        return view('admins.slider.create', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required|unique:slider',
            'description' => 'required',
            'active' => 'required',
        ]);
        if ($validator->passes()) {
            $slider = new slider();
            $image = $request->fileInput;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $slider->title = $request->title;
            $slider->slug = $request->slug;
            $slider->description = $request->description;
            $slider->active = $request->active;
            $slider->image = $imageName;
            $slider->save();
            return response()->json(
                [
                    'status' => true,
                    'massage' => "Create categories sucessfull",
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
    public function find(Request $request){
        $slider=slider::find($request->id);
        return response()->json(
            [
                'status' => 200,
                'slider' => $slider,
            ]
        );
    }
    public function delete(Request $request){
        $slider=slider::find($request->id);
        if($slider->delete()){
            return redirect()->back();
        }
    }
    public function update(Request $request){
        echo '11111111111111111111111111111';
    }
}

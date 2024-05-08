<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\products;
use App\Models\products_image;
use Response;
use Illuminate\Support\Facades\DB;


class products_controller extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $products = products::with('products_image')->get();
        return view('admins.products.index', compact('admin', 'products'));
    }
    public function create()
    {
        $admin = Auth::guard('admin')->user();
        return view("admins.products.create", compact('admin'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pro_category' => 'required',
            'sub_category' => 'required',
            'pro_brands' => 'required',
        ]);
        if ($validator->passes()) {
            $products = new products();
            $image = $request->fileInput;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $products->title = $request->title;
            $products->slug = $request->slug;
            $products->description = $request->description;
            $products->status = $request->pro_status;
            $products->categories_id = $request->pro_category;
            $products->sub_categories_id = $request->sub_category;
            $products->brands_id = $request->pro_brands;
            $products->is_featured = $request->pro_featured;
            $products->price = $request->pro_pricing;
            $products->compare_price = $request->pro_compare;
            $products->aku = $request->pro_stock;
            $products->barcode = $request->pro_barcode;
            $products->track_qty = $request->track_qty;
            $products->qty = $request->pro_qty;
            $products->save();
            $products_image = new products_image();
            $products_image->image = $imageName;
            $products_image->products_id = $products->id;
            $products_image->save();
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

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fileInput' => 'required',
        ]);
        if ($validator->passes()) {
            $products_image = products_image::where('products_id', $request->id)->first();
            $image = $request->fileInput;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $products_image->image = $imageName;
            $products_image->save();
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
    public function find(Request $request)
    {
        $products = products::select('products.*', 'products_image.image')->join('products_image', 'products_image.products_id', '=', 'products.id')->find($request->id);
        return response()->json([
            'status' => 200,
            'products' => $products,
        ]);
    }
    public function delete(Request $request)
    {
        $products = products::find($request->id);
        $products->delete();
        $products_image = products_image::where('products_id', $request->id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pro_category' => 'required',
            'sub_category' => 'required',
            'pro_brands' => 'required',
        ]);
        if ($validator->passes()) {
            $products = products::find($request->id);
            $products->title = $request->title;
            $products->slug = $request->slug;
            $products->description = $request->description;
            $products->status = $request->pro_status;
            $products->categories_id = $request->pro_category;
            $products->sub_categories_id = $request->sub_category;
            $products->brands_id = $request->pro_brands;
            $products->is_featured = $request->pro_featured;
            $products->price = $request->pro_pricing;
            $products->compare_price = $request->pro_compare;
            $products->aku = $request->pro_stock;
            $products->barcode = $request->pro_barcode;
            $products->qty = $request->pro_qty;
            $products->track_qty = $request->track_qty;
            $products->save();
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
}

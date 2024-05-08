<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use App\Models\brands;
use App\Models\slider;
use App\Models\categories;
use App\Models\products;
use App\Models\sub_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class front_controller extends Controller
{
    public function index(){
        $categories=categories::with('sub_categories')->where('status','1')->get();
        $slider=slider::where('active',1)->get();
        $last_products=products::where('status',1)->take(8)->get();
        $products=products::where('status',1)->get();
        $data=[
            'categories'=>$categories,
            'last_products'=>$last_products,
            'products'=>$products,
            'slider'=>$slider,
        ];
        return view('shop.index',$data);
    }
}

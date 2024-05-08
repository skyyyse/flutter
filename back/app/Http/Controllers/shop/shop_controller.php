<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use App\Models\brands;
use App\Models\categories;
use App\Models\products;
use App\Models\sub_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class shop_controller extends Controller
{
    // public function index(){
    //     $categories=categories::with('sub_categories')->where('status','1')->get();
    //     $brands = brands::orderBy('name', 'ASC')->where('status', 1)->get();
    //     $products = products::all();
    //     $data=[
    //         'categories'=>$categories,
    //         'brands'=>$brands,
    //         'products'=>$products,
    //     ];
    //     return view('shop.shop',$data);
    // }
    public function index(Request $request,$categoriesSlug=null,$subcategoriesSlug=null)
    {
        $select_ca=[];
        $select_sub=[];
        $categories = categories::orderBy('name','ASC')->with('sub_categories')->where('status', '1')->get();
        $brands = brands::orderBy('name', 'ASC')->where('status', 1)->get();
        $products = products::where('status',1);
        // $products = products::orderBy('id','DESC')->where('status',1)->get();
        if(!empty($categoriesSlug)){
            $category=categories::where('slug',$categoriesSlug)->first();
            $products=$products->where('categories_id',$category->id);
            $select_ca=$category->id;
        }
        if(!empty($subcategoriesSlug)){
            $subcategory=sub_categories::where('slug',$subcategoriesSlug)->first();
            $products=$products->where('sub_categories_id',$subcategory->id);
            $select_sub=$subcategory->id;
        }
        $products=$products->orderBy('id','DESC');
        $products=$products->get();
        $data = [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products,
            'select_ca'=> $select_ca,
            'select_sub' => $select_sub,
        ];
        return view('shop.shop', $data);
    }
}

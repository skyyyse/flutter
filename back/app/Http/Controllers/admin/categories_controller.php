<?php
namespace App\Http\Controllers\Admin;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\products;
use Dotenv\Parser\Value;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Can;

class categories_controller extends Controller
{
      public function index(){
            $admin=Auth::guard('admin')->user();
            $categories = categories::all();
            return view("admins.categories.index",compact("categories","admin"));
      }
      public function create(){
            $admin=Auth::guard('admin')->user();
            return view('admins.categories.create',compact("admin"));
      }
      public function store(Request $request){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => 'required|unique:categories',
                'active' => 'required',
            ]);
            if ($validator->passes()) {
                $image = $request->fileInput;
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $categories = new categories();
                $categories->name = $request->name;
                $categories->slug = $request->slug;
                $categories->status = $request->active;
                $categories->image = $imageName;
                $categories->save();
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
            $categories=categories::find($request->id);
            return response()->json([
                'status' => 200,
                'categories' => $categories,
            ]);
        }
        public function delete(Request $request){
            $categories = categories::find($request->id);
            if ($categories->delete()) {
                return redirect()->back();
            }
        }
        public function update(Request $request){
            $catrgory=categories::find($request->id);
            $catrgory->name=$request->name;
            $catrgory->slug=$request->slug;
            $catrgory->status=$request->active;
            $catrgory->save();
        }
        public function upload(Request $request){
            $categories = categories::find($request->id);
            $image = $request->fileInput;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $categories->image = $imageName;
            $categories->save();
        }
        public function get(){
            $categories = categories::orderBy('name')->get();
            return response()->json([
                'status' => 200,
                'categories' => $categories,
            ]);
        }
}

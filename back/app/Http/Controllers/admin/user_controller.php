<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\commune;
use App\Models\district;
use App\Models\login_sucess;
use App\Models\province;
use App\Models\village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class user_controller extends Controller
{
    public function index()
    {
        $user = User::all();
        $admin=Auth::guard('admin')->user();
        if($admin->role=='1'){
            return view("admins.user.index", compact("user","admin"));
        }else{
            return redirect()->route('admin.login');
        }
    }//completed
    public function find(Request $request)
    {
        $user = User::find($request->id);
        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }//completed
    public function delete(Request $request)
    {
        $users = User::find($request->id);
        if ($users->delete()) {
            return redirect()->back();
        }
    }////completed
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->fullname;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();
    }
    public function create()
    {
        $data=[];
        $admin=Auth::guard('admin')->user();
        $province=province::all();
        $data['admin']=$admin;
        $data['province']=$province;
        return view("admins.user.create_user",$data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            "email" => "required|unique:users",
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
            'select' => 'required',
            'fileInput' => 'required',
        ]);
        if ($validator->passes()) {
            $image = $request->fileInput;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $user = new User();
            $user->name = $request->name;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->password = bcrypt($request->password);
            $user->role = $request->select;
            $user->image = $imageName;
            $user->save();
        } else {
            return response()->json(
                [
                    'status' => false,
                    'massage' => $validator->errors(),
                ]
            );
        }
    }
    public function history()
    {
        $history = login_sucess::select('login_sucess.id', 'login_sucess.email', 'login_sucess.sucess_date', 'login_error.error_date', 'login_error.error')->join('login_error', 'login_sucess.email', '=', 'login_error.email')->get();
        $admin=Auth::guard('admin')->user();
        return view("admins.user.history", compact("history","admin"));
    }
    public function upload(Request $request)
    {
        echo $request->id;
        $user = User::find($request->id);
        $image = $request->fileInput;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $user->image = $imageName;
        $user->save();
    }
    public function district(Request $request){
        $district = district::where('province_id',$request->id)->orderBy('district_khmer')->get();
        return response()->json([
            'status' => 200,
            'district' => $district,
        ]);
    }
    public function commune(Request $request){
        $commune = commune::where('district_id', $request->id)->orderBy('commune_khmer')->get();
        return response()->json([
            'status' => 200,
            'commune' => $commune,
        ]);
    }
    public function village(Request $request){
        $village = village::where('commune_id', $request->id)->orderBy('village_khmer')->get();
        return response()->json([
            'status' => 200,
            'village' => $village,
        ]);
    }

    public function chat(){
        $admin=Auth::guard('admin')->user();
        return view('admins.email.chat',compact('admin'));
    }
    public function inbox(){
        $admin=Auth::guard('admin')->user();
        return view('admins.email.inbox',compact('admin'));
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Models\login_sucess;
use App\Models\login_error;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\user_register;
class login_controller extends Controller
{
    public function page_login(){
        return view("admins.login");
    }
    public function page_register(){
        return view("admins.register");
    }
    public function user_login(Request $request){
        $validator=Validator::make($request->all(), [
            "email"=> "required|email",
            "password"=> "required"
        ]);
        if($validator->passes()){
            if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->get('remember'))){
                $admin=Auth::guard('admin')->user();
                if($admin->role=='1'){
                    $sucess=Validator::make($request->all(), [
                        "email"=> "required|unique:login_sucess",
                        "password"=> "required"
                    ]);
                    if($sucess->passes()){
                        $login_sucess=new login_sucess();
                        $login_sucess->email=$request->email;
                        $login_sucess->save();
                    }
                    else{
                        return redirect()->route('admin.login');
                    }
                    return redirect()->route('admin.dashboard');
                }
                else{
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error','You are not role admin ?');
                }
            }
            else{
                $error=Validator::make($request->all(), [
                    "email"=> "required|unique:login_error",
                    "password"=> "required"
                ]);
                if($error->passes()){
                    $login_error=new login_error();
                    $login_error->email=$request->email;
                    $login_error->save();
                    return redirect()->route('admin.login')->with('error','Enter Email and Password is incorrrect');
                }
                else{
                    return redirect()->route('admin.login')->with('error','Enter Email and Password is incorrrect');
                }
            }
        }else{
            return redirect()->route('admin.login')->withErrors($validator)->withInput($request->only('email'));
        }
    }
    public function user_register(Request $request){
        $validator=Validator::make($request->all(), [
            "username"=>"required",
            "email"=> "required|unique:users",
            "password"=> "required"
        ]);
        if($validator->passes()){
            $user = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.login');
        }
        else{
            return redirect()->route('admin.register')->with('error','The email has already been taken');
        }
    }
}

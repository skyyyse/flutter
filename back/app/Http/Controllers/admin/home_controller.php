<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class home_controller extends Controller
{
    public function dashboard()
    {
        $admin = Auth::guard('admin')->user();
        $user = User::count('id');
        if($admin->role=='1'){
            return view("admins.dashboard", compact("admin", "user"));
        }else{
            return redirect()->route('admin.clear');
        }
    }
    public function logout()
    {
        return view("admins.auth.logout");
    }
    public function clear()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function password()
    {
        return view("admins.auth.changes_password");
    }
    public function changes_password(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $user=User::find($admin->id);
        $old_password=$admin->password;
        if(password_verify($request->password,$old_password)){
            if($request->new_password==$request->confirm_password){
                $user->password=bcrypt($request->new_password);
                $user->save();
                return redirect()->route('admin.dashboard');
            }
        }
    }
    public function support()
    {
        $admin = Auth::guard('admin')->user();
        return view("admins.auth.support",compact("admin"));
    }
    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view("admins.auth.profile",compact("admin"));
    }
    public function page_dashboard()
    {
        $admin = Auth::guard('admin')->user();
        $user = User::count('id');
        return view("admins.dashboard", compact("admin", "user"));
    }

}

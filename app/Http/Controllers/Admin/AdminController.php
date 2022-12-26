<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminloginForm()
    {
    return view('backend.admin.auth.login');
    }
    public function adminlogin(Request $request)
    {
       $admin= Admin::Where ('email',$request->email)->first();
       if(!$admin){
        return redirect()->back()->with('error','Email or password not match');
       }else{
        return redirect('/admin/dashboard');
       }
    }
    public function adminDashboard ()
    {
      return view('backend.admin.home.index');
    }
    public function adminLogout()
    {
     session()->flush();
     return redirect('/');
    }
}

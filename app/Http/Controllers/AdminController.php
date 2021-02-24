<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    // Login view
    function login() {
        return view('backend/login');
    }

    // Submit Login 
    function submit_login(Request $request) {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $userCheck=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
        if($userCheck>0){
            return redirect('admin/dashbord');
        }else{
            return redirect('admin/login')->with('error', 'Invalid username/password!');
        }
    }

    // Dashbord
    function dashbord(){
        return view('backend/dashbord');
    }
}

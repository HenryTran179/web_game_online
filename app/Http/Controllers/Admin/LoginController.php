<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
   
    public function showLogin(){
        if(Auth::check()){
            if(Auth::user()->isadmin == 1){
                return view('modules.Admin.index');
            }
            else return view('modules.Admin.adminLogin');
        }else{
            return view('modules.Admin.adminLogin');
        }
    }

    public function loginprogress(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Vui long nhap email',
            'email.email' => 'Email khong hop le',
            'password.required' => 'Vui long nhap mat khau',
            'password.min' => 'Mat khau khong duoc it hon 6 ky tu'
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.index');
        }else{
            
            return redirect()->route('admin.login');
        }
    }

    public function logOut(){       
            Auth::logout();
            return redirect()->route('admin.login');
    }
}

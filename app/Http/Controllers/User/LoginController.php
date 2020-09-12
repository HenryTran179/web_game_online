<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){
        if(Auth::check()){
            if(Auth::user()->isadmin == 0){
                $data = DB::table('game')        
                ->join('gamelink', 'game.id', '=', 'gamelink.game_id')
                ->join('image', 'game.id', '=', 'image.game_id')    
                ->join('video', 'game.id', '=', 'video.game_id')  
                ->join('control', 'game.id', '=', 'control.game_id')   
                ->join('gamecategory', 'game.id', '=', 'gamecategory.game_id')
                ->join('category', 'gamecategory.category_id', '=', 'category.id')  
                ->select('game.*','gamelink.link_name', 'image.img_name', 'video.video_name', 'control.note','category_name')
                ->get();
                return view('modules.Home.home',['data'=>$data]);
            }else{
                return view('modules.User.userLogin');
            }
        }else{
            return view('modules.User.userLogin');
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
        
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }else{
            
            return redirect()->route('user.login');
        }
    }

    public function logOut(){
            Auth::logout();
            $data = DB::table('game')        
            ->join('gamelink', 'game.id', '=', 'gamelink.game_id')
            ->join('image', 'game.id', '=', 'image.game_id')    
            ->join('video', 'game.id', '=', 'video.game_id')  
            ->join('control', 'game.id', '=', 'control.game_id')   
            ->join('gamecategory', 'game.id', '=', 'gamecategory.game_id')
            ->join('category', 'gamecategory.category_id', '=', 'category.id')  
            ->select('game.*','gamelink.link_name', 'image.img_name', 'video.video_name', 'control.note','category_name')
            ->get();
            return view('modules.Home.home',['data'=>$data]);
    }

}

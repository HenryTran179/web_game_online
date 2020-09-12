<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home(){
        if(Auth::check()){
            if(Auth::user()->isadmin == 0){
                $data = DB::table('game')        
                ->join('gamelink', 'game.id', '=', 'gamelink.game_id')
                ->join('image', 'game.id', '=', 'image.game_id')    
                ->join('video', 'game.id', '=', 'video.game_id')  
                ->join('control', 'game.id', '=', 'control.game_id')   
                ->join('gamecategory', 'game.id', '=', 'gamecategory.game_id')
                ->join('category', 'gamecategory.category_id', '=', 'category.id')     
                ->select('game.*','gamelink.*', 'image.*', 'video.*', 'control.*','gamecategory.*','category.*')        
                ->get();      
                return view('modules.Home.home',['data'=>$data]); 
            }else{
                return redirect()->route('admin.index');
            }
        }else{
            $data = DB::table('game')        
            ->join('gamelink', 'game.id', '=', 'gamelink.game_id')
            ->join('image', 'game.id', '=', 'image.game_id')    
            ->join('video', 'game.id', '=', 'video.game_id')  
            ->join('control', 'game.id', '=', 'control.game_id')   
            ->join('gamecategory', 'game.id', '=', 'gamecategory.game_id')
            ->join('category', 'gamecategory.category_id', '=', 'category.id')  
            ->select('game.*','gamelink.link_name', 'image.img_name', 'video.video_name', 'control.note','category_name')
            ->get();
            return view('modules.Home.home',['data'=>$data]);}
       
    } 
    public function createsuccess(){
        return view('modules.User.userSucessCreate');
    }   
  
  
}
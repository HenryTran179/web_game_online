<?php

namespace App\Http\Controllers\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use File;

class ProfileController extends Controller
{    
    public function profile(){         
        $id = Auth::id();
        $data = DB::table('userinfo')->where('accountid',$id)->first();
        if(Auth::Check()){
            return view('modules.User.userProfile',['data'=>$data]);
        }else{
            return redirect()->route('user.login');
        }       
    }

    public function editprofile(){
        $id = Auth::id();
        $data = DB::table('userinfo')->where('accountid',$id)->first();    
        if(Auth::Check()){
            return view('modules.User.userEditProfile',['data'=>$data]);
        }else{
            return redirect()->route('user.login');
        }  
    }  

    public function update(Request $request )
    {
        $id = Auth::id();
        $this->validate($request,[
            'name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'file' => 'required'
        ]);

        $Imagename = DB::table('userinfo')->where('accountid',$id)->value('file');
        $Image = public_path("/images/User/" . $Imagename); //Finding users previous picture
        if(file_exists($Image)){ //If it exits, delete it from folder
                unlink($Image);
        }
        
        $data = $request->except('_token'); 
        $imagename = DB::table('userinfo')->where('accountid',$id)->value('file');
        $data['accountid'] = $id;
            $image = $request->file('file');
            //lay file anh va luu file nh o trong thu muc public images
            $name = time().'.'.$image->getClientOriginalExtension();        
            $image->move(public_path('images/User/'), $name);
            $data['file'] = $name;
            //insert vao database
        DB::table('userinfo')->update($data);       
        return redirect()->route('user.profile');
    }
}
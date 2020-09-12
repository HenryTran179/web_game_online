<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modules.Home.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.User.userCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:rfc,dns|unique:account,email',
            'password' => 'required|min:6|',
            'password_confirm' => 'required|required_with:password|same:password'
        ], [
            'email.required' => 'Vui long nhap email',
            'email.email' => 'Email khong hop le',
            'email.unique' => 'Email da ton tai',
            'password.required' => 'Vui long nhap mat khau',
            'password.min' => 'Mat khau khong duoc it hon 6 ky tu',
            'password_confirm.required' => 'Vui long xac nhan mat khau',
            'password_confirm.same' => 'Xac nhan mat khau khong trung khop',
            
        ]);

        $email = $request->input('email');
        $pass = bcrypt($request->input('password'));  
        $created = $request->input('created_at');
        $created = new DateTime;
        $updated = $request->input('updated_at');
        $updated = new DateTime;
        $data = DB::table('account')->insertGetId(
            ['email' => $email, 'password' => $pass , 'created_at' => $created , 'updated_at' => $updated]
        );
        return view('modules.User.userCreateInfo',['id'=>$data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('account')->where('id',$id)->first();
        //dd($data);
        return view('modules.User.userEdit',['data'=>$data]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function update(Request $request, $id)
    {   
        $data = $request->except('_token');
        $data['created_at'] = new Datetime;
        $data['updated_at'] = new Datetime;
        dd($data);
        $data = DB::table('account')->where('id',$id)->update($data);
        return redirect()->route('user.userlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('account')->where('id',$id)->delete();
        return redirect()->route('user.userlist');
    }

    public function userlist (){
        $data = DB::table('account')->where('isadmin',0)->get();
        return view('modules.User.userList',['data'=>$data]);
    }
        
}

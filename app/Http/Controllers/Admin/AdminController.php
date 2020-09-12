<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::check()){
            if(Auth::user()->isadmin == 1){
                return view('modules.Admin.index');
        }
        else{ 
                return view('modules.Admin.adminLogin');
            }
        }else {
                return view('modules.Admin.adminLogin');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.Admin.adminCreate');
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
        ], [
            'email.required' => 'Vui long nhap email',
            'email.email' => 'Email khong hop le',
            'email.unique' => 'Email da ton tai',
            'password.required' => 'Vui long nhap mat khau',
            'password.min' => 'Mat khau khong duoc it hon 6 ky tu',
            
        ]);
        $email = $request->input('email');
        $pass = bcrypt($request->input('password'));  
        $isadmin = $request->input('isadmin');
        $created = $request->input('created_at');
        $created = new DateTime;
        $updated = $request->input('updated_at');
        $updated = new DateTime;
        $data = DB::table('account')->insertGetId(
            ['email' => $email, 'password' => $pass ,'isadmin' => $isadmin, 'created_at' => $created , 'updated_at' => $updated]
        );
        return redirect()->route('admin.create');
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
        //
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
        //
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
        DB::table('userinfo')->where('id',$id)->delete();
        return redirect()->route('admin.adminlist');
    }
    public function adminlist (){
        $data = DB::table('account')->where('isadmin',1)->get();
        return view('modules.Admin.adminList',['data'=>$data]);
    }

 
}

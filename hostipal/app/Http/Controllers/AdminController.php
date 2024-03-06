<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('aid'))
        {
        
        $data=admin::all();
        return view('adminlist',['data'=>$data]);
        }
        else
        {
            return redirect('adminlogin');
        }
    }
    
    public function drindex()
    {
        if(session()->has('did'))
        {
            $drid=session('did');
            $data=admin::where('admin_id',$drid)->get()->first();
            return view('doctor/adminlist',['data'=>$data]);
        }
        else
        {
            return redirect('doctorlogin');
        }
    }

    public function stindex()
    {
        if(session()->has('sid'))
        {
            $stid=session('sid');
            $data=admin::where('admin_id',$stid)->get();
            return view('staff/adminlist',['data'=>$data]);
        }
        else
        {
            return redirect('stafflogin');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admino=new admin();
        $admino->admin_id=$request->adminid;
        $admino->name=$request->adminname;
        $admino->password=$request->adminpassword;
        $admino->save();
        return redirect('admin');
    }
    public function login(Request $request)
    {
        $name=$request->aname;
        $password=$request->apass;
        $data=admin::where('name',$name)->where('password',$password)->get()->first();
        if($data)
        {
            $request->session()->put('aid',$data->admin_id);
            $request->session()->put('aname',$data->name);
            
            return redirect('main');

        }
        else
        {
            return redirect('adminlogin');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($admin)
    {
        $data=admin::where('admin_id',$admin)->get()->first();
        //$data=DB::select('select * from admin where admin_id = ?',[$admin]);
        return view('adminedit',['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$admin)
    {
        $name=$request->adminname;
        $password=$request->adminpassword;
        DB::update('update admin set `name`= ? ,`password`= ?  where admin_id = ?',[$name,$password,$admin]);
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function deldata($admin)
    {
        DB::delete('delete from admin where admin_id = ?',[$admin]);
        return redirect('admin');
    }
}

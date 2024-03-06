<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;
use DB;

class StaffController extends Controller
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
        $data = staff::all();
        return view('stafflist',['data'=> $data]);
    }
    else
    {
        return redirect('adminlogin');
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
        $staffo=new staff();
        $staffo->staff_id=$request->staffid;
        $staffo->name=$request->name;
        $staffo->gender=$request->gendar;
        $staffo->address=$request->staffaddress;
        $staffo->email=$request->email;
        $staffo->password=$request->password;
        $staffo->Designation=$request->stafftxt;
        $staffo->qualification=$request->staffqualification;
        $staffo->save();
        return redirect('staff');
    }

    public function login(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $data=staff::where('email',$email)->where('password',$password)->get()->first();
        if($data)
        {
            $request->session()->put('sid',$data->staff_id);
            $request->session()->put('name',$data->name);
            
            return redirect('staffmain');
        }
        else
        {
            return redirect('stafflogin');
        }
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit( $staff)
    {
        $data=staff::where('staff_id',$staff)->get()->first();
        return view('staffedit',['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$staff)
    {
        
        $name=$request->staffname;
        $gender=$request->gendar;
        $address=$request->staffaddress;
        $email=$request->email;
        $password=$request->password;
        $Designation=$request->stafftxt;
        $qualification=$request->staffqualification;
        DB::update('update staff set `name`=?,`gender`= ?, `address`=?, `email` =?, `password` = ?,`qualification`=?, `designation`=? where staff_id = ?',[$name,$gender,$address,$email,$password,$Designation,$qualification,$staff]);
        return redirect('staff');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function deldata($staff)
    {
        DB::delete('delete from staff where staff_id = ?',[$staff]);
        return redirect('staff');
    
    }
}

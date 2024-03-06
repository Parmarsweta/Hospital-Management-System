<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use Illuminate\Http\Request;
use DB;

class DoctorController extends Controller
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
            $data=doctor::all();
            return view('doctorlist',['data'=> $data]);
        }
        else
        {
            return redirect('adminlogin');
        }
    }

    public function printdata()
    {
        $data=doctor::all();
        return view('doctorprint',['data'=> $data]);
    }
    

    public function drindex()
    {
        if(session()->has('did'))
        {
            $drid=session('did');
            $data=doctor::where('doctor_id',$drid)->get();
            return view('doctor/doctorlist',['data'=> $data]);
        }
        else
        {
            return redirect('doctorlogin');
        }
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=doctor::all();
        return view('doctoradd',['data'=> $data]);
    }
    public function drcreate()
    {
        $data=doctor::all();
        return view('doctor/doctoradd',['data'=> $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctoro=new doctor();
        $doctoro->doctor_id=$request->doctorid;
        $doctoro->name=$request->doctorname;
        $doctoro->qualification=$request->txt;
        $doctoro->address=$request->address;
        $doctoro->gender=$request->gendar;
        $doctoro->mobile_no=$request->doctornumber;
        $doctoro->email=$request->doctoremail;
        $doctoro->password=$request->password;
        $doctoro->visiting=$request->doctorvisiting;
        $doctoro->doctorcharge=$request->doctorcharge;
        $doctoro->save();
        return redirect('doctor');
    }

    public function drstore(Request $request)
    {
        $doctoro=new doctor();
        $doctoro->doctor_id=$request->doctorid;
        $doctoro->name=$request->doctorname;
        $doctoro->qualification=$request->txt;
        $doctoro->address=$request->address;
        $doctoro->gender=$request->gendar;
        $doctoro->mobile_no=$request->doctornumber;
        $doctoro->email=$request->doctoremail;
        $doctoro->password=$request->password;
        $doctoro->visiting=$request->doctorvisiting;
        $doctoro->doctorcharge=$request->doctorcharge;
        $doctoro->save();
        return redirect('drdoctor');
    }

    public function login(Request $request)
    {
       
        $email=$request->email;
        $password=$request->password;
        $data=doctor::where('email',$email)->where('password',$password)->get()->first();
        if($data)
        {
            $request->session()->put('did',$data->doctor_id);
            $request->session()->put('doname',$data->name);
            
            return view('doctor/drdashboard');
        }
        else
        {
            return redirect('/doctorlogin');   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($doctor)
    {
        $data=doctor::where('doctor_id',$doctor)->get()->first();
        return view('doctoredit',['data'=> $data]);
    
    }

    public function dredit($doctor)
    {
        if(session()->has('did'))
        {
        $drid=session('did');
        $data=doctor::where('doctor_id',$doctor)->get()->first();
        return view('doctor/doctoredit',['data'=> $data]);
        }
        else
        {
        return redirect('doctorlogin');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $doctor)
    {
        $name=$request->doctorname;
        $qualification=$request->txt;
        $address=$request->address;
        $gender=$request->gendar;
        $mobile_no=$request->doctornumber;
        $email=$request->doctoremail;
        $password=$request->password;
        $visiting=$request->doctorvisiting;
        $doctorcharge=$request->doctorcharge;
        DB::update('update doctor set `name` = ? ,`qualification` = ?,`address` = ?,`gender` = ?,`mobile_no` = ?,`email` = ?,`password` = ?,`visiting` = ?,`doctorcharge` = ? where doctor_id = ?',[$name,$qualification,$address,$gender,$mobile_no,$email,$password,$visiting,$doctorcharge,$doctor]);
        return redirect('doctor');
    }

    public function drupdate(Request $request, $doctor)
    {
        $name=$request->doctorname;
        $qualification=$request->txt;
        $address=$request->address;
        $gender=$request->gendar;
        $mobile_no=$request->doctornumber;
        $email=$request->doctoremail;
        $password=$request->password;
        $visiting=$request->doctorvisiting;
        $doctorcharge=$request->doctorcharge;
        DB::update('update doctor set `name` = ? ,`qualification` = ?,`address` = ?,`gender` = ?,`mobile_no` = ?,`email` = ?,`password` = ?,`visiting` = ?,`doctorcharge` = ? where doctor_id = ?',[$name,$qualification,$address,$gender,$mobile_no,$email,$password,$visiting,$doctorcharge,$doctor]);
        return redirect('drdoctor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function deldata($doctor)
    {
        DB::delete('delete from doctor where doctor_id = ?',[$doctor]);
        return redirect('doctor');
    }

    
}

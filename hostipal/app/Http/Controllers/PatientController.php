<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use DB;

class PatientController extends Controller
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
        $data = patient::all();
        return view('patientlist',['data'=> $data]);
        }
        else
        {
            return redirect('adminlogin');
        }
    }
    public function printdata()
    {
        $data = patient::all();
        return view('patientprint',['data'=> $data]);
        
    }

    public function drindex()
    {
        if(session()->has('did'))
        {
            $drid=session('did');
            $data = patient::all();
            //$data=patient::where('patient_id',$drid)->get();
            return view('doctor/patientlist',['data'=> $data]);
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

            $data=patient::where('patient_id',$stid)->get();
            $data = patient::all();
            return view('staff/patientlist',['data'=> $data]);
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
        $data = patient::all();
        return view('patientadd',['data'=> $data]);
    }

    public function stcreate()
    {
        $data = patient::all();
        return view('staff/patientadd',['data'=> $data]);
    }
    public function drcreate()
    {
        $data = patient::all();
        return view('doctor/patientadd',['data'=> $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patiento=new patient();
        $patiento->patient_id=$request->patientid;
        $patiento->name=$request->patientname;
        $patiento->weight=$request->patientweight;
        $patiento->gender=$request->gendar;
        $patiento->address=$request->address;
        $patiento->phone=$request->patientphone;
        $patiento->medicalhistory=$request->patientmedicalhistory;
        $patiento->familyhistory=$request->patientfamilyhistory;
        $patiento->dob=$request->patientdate;
        $patiento->bloodgroup=$request->patientbloodgroup;
        $patiento->habits=$request->patienthabits;
        $patiento->otherdetails=$request->otherdetalis;
        $patiento->save();
        return redirect('patient');
    }

    public function ststore(Request $request)
    {
        $patiento=new patient();
        $patiento->patient_id=$request->patientid;
        $patiento->name=$request->patientname;
        $patiento->weight=$request->patientweight;
        $patiento->gender=$request->gendar;
        $patiento->address=$request->address;
        $patiento->phone=$request->patientphone;
        $patiento->medicalhistory=$request->patientmedicalhistory;
        $patiento->familyhistory=$request->patientfamilyhistory;
        $patiento->dob=$request->patientdate;
        $patiento->bloodgroup=$request->patientbloodgroup;
        $patiento->habits=$request->patienthabits;
        $patiento->otherdetails=$request->otherdetalis;
        $patiento->save();
        return redirect('stpatient');
    }
    public function drstore(Request $request)
    {
        $patiento=new patient();
        $patiento->patient_id=$request->patientid;
        $patiento->name=$request->patientname;
        $patiento->weight=$request->patientweight;
        $patiento->gender=$request->gendar;
        $patiento->address=$request->address;
        $patiento->phone=$request->patientphone;
        $patiento->medicalhistory=$request->patientmedicalhistory;
        $patiento->familyhistory=$request->patientfamilyhistory;
        $patiento->dob=$request->patientdate;
        $patiento->bloodgroup=$request->patientbloodgroup;
        $patiento->habits=$request->patienthabits;
        $patiento->otherdetails=$request->otherdetalis;
        $patiento->save();
        return redirect('drpatient');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($patient)
    {
        $data=patient::where('patient_id',$patient)->get()->first();
        return view('patientedit',['data'=> $data]);
    }

    public function stedit($patient)
    {
        if(session()->has('sid'))
        {
        $stid=session('sid');
        $data=patient::where('patient_id',$stid)->get()->first();
        return view('staff/patientedit',['data'=> $data]);
        }
        else
        {
    return redirect('stafflogin');
        }
    }
    public function dredit($patient)
    {
        if(session()->has('did'))
        {
        $did=session('did');
        $data=patient::where('patient_id',$did)->get()->first();
        return view('doctor/patientedit',['data'=> $data]);
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
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$patient)
    {
        $name=$request->patientname;
        $weight=$request->patientweight;
        $gender=$request->gendar;
        $address=$request->address;
        $phone=$request->patientphone;
        $medicalhistory=$request->patientmedicalhistory;
        $familyhistory=$request->patientfamilyhistory;
        $dob=$request->patientdate;
        $bloodgroup=$request->patientbloodgroup;
        $habits=$request->patienthabits;
        $otherdetails=$request->otherdetalis;
        DB::update('update patient set `name`=?,`weight`=?,`gender`=?,`address`=?,`phone`=?,`medicalhistory`=?,`familyhistory`=?,`dob`=?,`bloodgroup`=?,`habits`=?,`otherdetails`=? where patient_id = ?',[$name,$weight,$gender,$address,$phone,$medicalhistory,$familyhistory,$dob,$bloodgroup,$habits,$otherdetails,$patient]);
        return redirect('patient');
    }

    public function stupdate(Request $request,$patient)
    {
        $name=$request->patientname;
        $weight=$request->patientweight;
        $gender=$request->gendar;
        $address=$request->address;
        $phone=$request->patientphone;
        $medicalhistory=$request->patientmedicalhistory;
        $familyhistory=$request->patientfamilyhistory;
        $dob=$request->patientdate;
        $bloodgroup=$request->patientbloodgroup;
        $habits=$request->patienthabits;
        $otherdetails=$request->otherdetalis;
        DB::update('update patient set `name`=?,`weight`=?,`gender`=?,`address`=?,`phone`=?,`medicalhistory`=?,`familyhistory`=?,`dob`=?,`bloodgroup`=?,`habits`=?,`otherdetails`=? where patient_id = ?',[$name,$weight,$gender,$address,$phone,$medicalhistory,$familyhistory,$dob,$bloodgroup,$habits,$otherdetails,$patient]);
        return redirect('stpatient');

    }
    public function drupdate(Request $request,$patient)
    {
        $name=$request->patientname;
        $weight=$request->patientweight;
        $gender=$request->gendar;
        $address=$request->address;
        $phone=$request->patientphone;
        $medicalhistory=$request->patientmedicalhistory;
        $familyhistory=$request->patientfamilyhistory;
        $dob=$request->patientdate;
        $bloodgroup=$request->patientbloodgroup;
        $habits=$request->patienthabits;
        $otherdetails=$request->otherdetalis;
        DB::update('update patient set `name`=?,`weight`=?,`gender`=?,`address`=?,`phone`=?,`medicalhistory`=?,`familyhistory`=?,`dob`=?,`bloodgroup`=?,`habits`=?,`otherdetails`=? where patient_id = ?',[$name,$weight,$gender,$address,$phone,$medicalhistory,$familyhistory,$dob,$bloodgroup,$habits,$otherdetails,$patient]);
        return redirect('drpatient');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function deldata($patient)
    {
        DB::delete('delete from patient where patient_id = ?',[$patient]);
        return redirect('patient');
    
    }
    public function stdeldata($patient)
    {
        DB::delete('delete from patient where patient_id = ?',[$patient]);
        return redirect('stpatient');
    
    }
}

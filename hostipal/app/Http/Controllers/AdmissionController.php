<?php

namespace App\Http\Controllers;

use App\Models\admission;
use App\Models\bed;
use App\Models\patient;
use App\Models\doctor;
use Illuminate\Http\Request;
use DB;

class AdmissionController extends Controller
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
            $data = admission::join('patient', 'admission.patient_id', '=', 'patient.patient_id')
                                ->join('bed', 'admission.bed_id', '=', 'bed.bed_id')
                                ->join('doctor', 'admission.doctor_id', '=', 'doctor.doctor_id')
                ->get(['admission.*', 'patient.name as pname','bed.bed_no','doctor.name as dname']);
            //$data=admission::all();
            return view('admissionlist',['data'=>$data]);
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
            $data = admission::join('patient', 'admission.patient_id', '=', 'patient.patient_id')
                                ->join('bed', 'admission.bed_id', '=', 'bed.bed_id')
                                ->join('doctor', 'admission.doctor_id', '=', 'doctor.doctor_id')
                                ->where('admission.doctor_id',$drid)->get(['admission.*', 'patient.name as pname','bed.bed_no','doctor.name as dname']);
            
            return view('doctor/admissionlist',['data'=>$data]);
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
            $data = admission::join('patient', 'admission.patient_id', '=', 'patient.patient_id')
                                ->join('bed', 'admission.bed_id', '=', 'bed.bed_id')
                                ->join('doctor', 'admission.doctor_id', '=', 'doctor.doctor_id')
                                ->get(['admission.*', 'patient.name as pname','bed.bed_no','doctor.name as dname']);
            return view('staff/admissionlist',['data'=>$data]);
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
        $bdata = bed::all();
        $pdata = patient::all();
        $dodata = doctor::all();
        return view('admissionadd',['bdata'=> $bdata,'pdata'=>$pdata,'dodata'=> $dodata]);
    }

    public function stcreate()
    {
        $bdata = bed::all();
        $pdata = patient::all();
        $dodata = doctor::all();
        return view('staff/admissionadd',['bdata'=> $bdata,'pdata'=>$pdata,'dodata'=> $dodata]);
    }
    public function drcreate()
    {
        $bdata = bed::all();
        $pdata = patient::all();
        $dodata = doctor::all();
        return view('doctor/admissionadd',['bdata'=> $bdata,'pdata'=>$pdata,'dodata'=> $dodata]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admission=new Admission();
        $admission->admission_id=$request->admissionid;
        $admission->admissiondate=$request->date;
        $admission->bed_id=$request->bedid;
        $admission->patient_id=$request->patientid;
        $admission->complaint=$request->complaint;
        $admission->doctor_id=$request->dotorid;
        $admission->diagnosis=$request->admidiagnosis;
        $admission->save();
        return redirect('admission');
    }
    public function ststore(Request $request)
    {
        $admission=new Admission();
        $admission->admission_id=$request->admissionid;
        $admission->admissiondate=$request->date;
        $admission->bed_id=$request->bedid;
        $admission->patient_id=$request->patientid;
        $admission->complaint=$request->complaint;
        $admission->doctor_id=$request->dotorid;
        $admission->diagnosis=$request->admidiagnosis;
        $admission->save();
        return redirect('stadmission');
    }
    public function drstore(Request $request)
    {
        $admission=new Admission();
        $admission->admission_id=$request->admissionid;
        $admission->admissiondate=$request->date;
        $admission->bed_id=$request->bedid;
        $admission->patient_id=$request->patientid;
        $admission->complaint=$request->complaint;
        $admission->doctor_id=$request->dotorid;
        $admission->diagnosis=$request->admidiagnosis;
        $admission->save();
        return redirect('dradmission');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function show(admission $admission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function edit($admission)
    {
        $bdata = bed::all();
        $pdata = patient::all();
        $dodata = doctor::all();
        $data=Admission::where('admission_id',$admission)->get()->first();
        return view('admissionedit',['data'=> $data,'bdata'=> $bdata,'pdata'=>$pdata,'dodata'=> $dodata]);
    }

    public function stedit($admission)
    {
        if(session()->has('sid'))
        {
        $stid=session('sid');
        $bdata = bed::all();
        $pdata = patient::all();
        $dodata = doctor::all();
        $data=Admission::where('admission_id',$admission)->get()->first();
        return view('staff/admissionedit',['data'=> $data,'bdata'=> $bdata,'pdata'=>$pdata,'dodata'=> $dodata]);
        }
        else
        {
        return redirect('stafflogin');
        }
    }
    public function dredit($admission)
    {
        if(session()->has('did'))
        {
        $did=session('did');
        $bdata = bed::all();
        $pdata = patient::all();
        $dodata = doctor::all();
        $data=Admission::where('admission_id',$admission)->get()->first();
        return view('doctor/admissionedit',['data'=> $data,'bdata'=> $bdata,'pdata'=>$pdata,'dodata'=> $dodata]);
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
     * @param  \App\Models\admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$admission)
    {
        $admissiondate=$request->date;
        $bed_id=$request->bedid;
        $patient_id=$request->patientid;
        $complaint=$request->complaint;
        $doctor_id=$request->dotorid;
        $diagnosis=$request->admidiagnosis;
        DB::update('update admission set `admissiondate`=?, `bed_id` =?, `patient_id` =?, `complaint`=?, `doctor_id` =?, `diagnosis`=? where admission_id = ?',[$admissiondate,$bed_id,$patient_id,$complaint,$doctor_id,$diagnosis,$admission]);
        return redirect('admission');
    }

    public function stupdate(Request $request,$admission)
    {
        $admissiondate=$request->date;
        $bed_id=$request->bedid;
        $patient_id=$request->patientid;
        $complaint=$request->complaint;
        $doctor_id=$request->dotorid;
        $diagnosis=$request->admidiagnosis;
        DB::update('update admission set `admissiondate`=?, `bed_id` =?, `patient_id` =?, `complaint`=?, `doctor_id` =?, `diagnosis`=? where admission_id = ?',[$admissiondate,$bed_id,$patient_id,$complaint,$doctor_id,$diagnosis,$admission]);
        return redirect('stadmission');
    }
    public function drupdate(Request $request,$admission)
    {
        $admissiondate=$request->date;
        $bed_id=$request->bedid;
        $patient_id=$request->patientid;
        $complaint=$request->complaint;
        $doctor_id=$request->dotorid;
        $diagnosis=$request->admidiagnosis;
        DB::update('update admission set `admissiondate`=?, `bed_id` =?, `patient_id` =?, `complaint`=?, `doctor_id` =?, `diagnosis`=? where admission_id = ?',[$admissiondate,$bed_id,$patient_id,$complaint,$doctor_id,$diagnosis,$admission]);
        return redirect('dradmission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function deldata($admission)
    {
        DB::delete('delete from admission where admission_id = ?',[$admission]);
        return redirect('admission');
    }
    public function stdeldata($admission)
    {
        DB::delete('delete from admission where admission_id = ?',[$admission]);
        return redirect('stadmission');
    }
}

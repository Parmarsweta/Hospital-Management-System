<?php

namespace App\Http\Controllers;

use App\Models\Doctorvisit;
use App\Models\Doctor;
use App\Models\admission;
use Illuminate\Http\Request;
use DB;

class DoctorvisitController extends Controller
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
            $data = Doctorvisit::join('admission', 'Doctorvisit.admission_id', '=', 'admission.admission_id')
                            ->join('doctor', 'Doctorvisit.Doctor_id', '=', 'doctor.doctor_id')
                            ->get(['doctorvisit.*', 'admission.admission_id', 'doctor.name']);
        //$data=doctorvisit::all();
        return view('doctorvisitlist',['data'=>$data]);
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
            $data = Doctorvisit::join('admission', 'Doctorvisit.admission_id', '=', 'admission.admission_id')
                            ->join('doctor', 'Doctorvisit.Doctor_id', '=', 'doctor.doctor_id')
                            ->where('doctor.doctor_id',$drid)->get(['doctorvisit.*', 'admission.admission_id', 'doctor.name']);
                return view('doctor/doctorvisitlist',['data'=>$data]);
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
        $data = Doctorvisit::join('admission', 'Doctorvisit.admission_id', '=', 'admission.admission_id')
                            ->join('doctor', 'Doctorvisit.Doctor_id', '=', 'doctor.doctor_id')
                            ->get(['doctorvisit.*', 'admission.admission_id', 'doctor.name']);
        
        return view('staff/doctorvisitlist',['data'=>$data]);
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
        $dodata=doctor::all();
        $adata=admission::all();
        return view('doctorvisitadd',['dodata'=>$dodata,'adata'=>$adata]);
    }
    public function stcreate()
    {
        $dodata=doctor::all();
        $adata=admission::all();
        return view('staff/doctorvisitadd',['dodata'=>$dodata,'adata'=>$adata]);
    }
    public function drcreate()
    {
        $dodata=doctor::all();
        $adata=admission::all();
        return view('doctor/doctorvisitadd',['dodata'=>$dodata,'adata'=>$adata]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctorvisit=new Doctorvisit();
        $doctorvisit->doctorvisit_id=$request->doctorvisitid;
        $doctorvisit->doctor_id=$request->doctorid;
        $doctorvisit->admission_id=$request->admissionid;
        $doctorvisit->date=$request->date;
        $doctorvisit->purpose=$request->txt;
        $doctorvisit->save();
        return redirect('doctorvisit');
    }

    public function ststore(Request $request)
    {
        $doctorvisit=new Doctorvisit();
        $doctorvisit->doctorvisit_id=$request->doctorvisitid;
        $doctorvisit->doctor_id=$request->doctorid;
        $doctorvisit->admission_id=$request->admissionid;
        $doctorvisit->date=$request->date;
        $doctorvisit->purpose=$request->txt;
        $doctorvisit->save();
        return redirect('stdoctorvisit');
    }
    public function drstore(Request $request)
    {
        $doctorvisit=new Doctorvisit();
        $doctorvisit->doctorvisit_id=$request->doctorvisitid;
        $doctorvisit->doctor_id=$request->doctorid;
        $doctorvisit->admission_id=$request->admissionid;
        $doctorvisit->date=$request->date;
        $doctorvisit->purpose=$request->txt;
        $doctorvisit->save();
        return redirect('drdoctorvisit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctorvisit  $doctorvisit
     * @return \Illuminate\Http\Response
     */
    public function show(Doctorvisit $doctorvisit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctorvisit  $doctorvisit
     * @return \Illuminate\Http\Response
     */
    public function edit($doctorvisit)
    {
        $dodata=doctor::all();
        $adata=admission::all();
        $data=doctorvisit::where('doctorvisit_id',$doctorvisit)->get()->first();
        return view('doctorvisitedit',['data'=> $data,'dodata'=>$dodata,'adata'=>$adata]);
    }

    public function stedit($doctorvisit)
    {
        if(session()->has('sid'))
        {
        $stid=session('sid');
        $dodata=doctor::all();
        $adata=admission::all();
        $data=doctorvisit::where('doctorvisit_id',$doctorvisit)->get()->first();
        return view('staff/doctorvisitedit',['data'=> $data,'dodata'=>$dodata,'adata'=>$adata]);
        }
        else
        {
        return redirect('stafflogin');
        }
    }

    public function dredit($doctorvisit)
    {
        if(session()->has('did'))
        {
        $did=session('did');
        $dodata=doctor::all();
        $adata=admission::all();
        $data=doctorvisit::where('doctorvisit_id',$did)->get()->first();
        return view('doctor/doctorvisitedit',['data'=> $data,'dodata'=>$dodata,'adata'=>$adata]);
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
     * @param  \App\Models\Doctorvisit  $doctorvisit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$doctorvisit)
    {
        $doctor_id=$request->doctorid;
        $admission_id=$request->admissionid;
        $date=$request->date;
        $purpose=$request->txt;
        DB::update('update Doctorvisit set `doctor_id`= ? ,`admission_id`= ?, `date`=?, `purpose` = ?  where doctorvisit_id = ?',[$doctor_id,$admission_id,$date,$purpose,$doctorvisit]);
        return redirect('doctorvisit');
    }

    public function stupdate(Request $request,$doctorvisit)
    {
        $doctor_id=$request->doctorid;
        $admission_id=$request->admissionid;
        $date=$request->date;
        $purpose=$request->txt;
        DB::update('update Doctorvisit set `doctor_id`= ? ,`admission_id`= ?, `date`=?, `purpose` = ?  where doctorvisit_id = ?',[$doctor_id,$admission_id,$date,$purpose,$doctorvisit]);
        return redirect('stdoctorvisit');
    }
    public function drupdate(Request $request,$doctorvisit)
    {
        $doctor_id=$request->doctorid;
        $admission_id=$request->admissionid;
        $date=$request->date;
        $purpose=$request->txt;
        DB::update('update Doctorvisit set `doctor_id`= ? ,`admission_id`= ?, `date`=?, `purpose` = ?  where doctorvisit_id = ?',[$doctor_id,$admission_id,$date,$purpose,$doctorvisit]);
        return redirect('drdoctorvisit');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctorvisit  $doctorvisit
     * @return \Illuminate\Http\Response
     */
    public function deldata($doctorvisit)
    {
        DB::delete('delete from doctorvisit where doctorvisit_id = ?',[$doctorvisit]);
        return redirect('doctorvisit');
    }
}

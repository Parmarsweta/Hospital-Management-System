<?php

namespace App\Http\Controllers;

use App\Models\patientdischarge;
use App\Models\admission;
use Illuminate\Http\Request;
use DB;

class PatientdischargeController extends Controller
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
            $data = Patientdischarge::join('admission', 'Patientdischarge.admission_id', '=', 'admission.admission_id')
            ->get(['Patientdischarge.*', 'admission.admission_id']);

            //$data=patientdischarge::all();
            return view('patientdischargelist',['data'=>$data]);
        }
        else
        {
                 return redirect('adminlogin');
        }
    }

    public function stindex()
    {
        if(session()->has('sid'))
        {
        $stid=session('sid');
        $data=patientdischarge::all();
        return view('staff/patientdischargelist',['data'=>$data]);
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
        $adata = admission::all();
        return view('patientdischargeadd',['adata'=> $adata]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patientdischarge=new patientdischarge();
        $patientdischarge->patientdischarge_id=$request->patientdischargeid;
        $patientdischarge->admission_id=$request->admissionid;
        $patientdischarge->dischargedate=$request->dischargedate;
        $patientdischarge->diagnosis=$request->txt;
        $patientdischarge->treatmentdescription=$request->text;
        $patientdischarge->advicedescription=$request->advicedescription;
        $patientdischarge->save();
        return redirect('patientdischarge');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\patientdischarge  $patientdischarge
     * @return \Illuminate\Http\Response
     */
    public function show(patientdischarge $patientdischarge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\patientdischarge  $patientdischarge
     * @return \Illuminate\Http\Response
     */
    public function edit($patientdischarge)
    {
        $adata = admission::all();
        $data = patientdischarge::where('patientdischarge_id',$patientdischarge)->get()->first();
        return view('patientdischargeedit',['data'=> $data,'adata'=> $adata]);
    }
    public function stedit($patientdischarge)
    {
        $adata = admission::all();
        $data = patientdischarge::where('patientdischarge_id',$patientdischarge)->get()->first();
        return view('staff/patientdischargeedit',['data'=> $data,'adata'=> $adata]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\patientdischarge  $patientdischarge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$patientdischarge)
    {
        $admission_id=$request->admissionid;
        $dischargedate=$request->dischargedate;
        $diagnosis=$request->txt;
        $treatmentdescription=$request->text;
        $advicedescription=$request->advicedescription;
        DB::update('update  patientdischarge set  `dischargedate`= ?,`admission_id`= ?, `diagnosis`=?, `treatmentdescription` = ?, `advicedescription`=?   where patientdischarge_id = ?',[$dischargedate,$admission_id,$diagnosis,$treatmentdescription,$advicedescription,$patientdischarge]);
        return redirect('patientdischarge');
    }
    public function stupdate(Request $request,$patientdischarge)
    {
        $admission_id=$request->admissionid;
        $dischargedate=$request->dischargedate;
        $diagnosis=$request->txt;
        $treatmentdescription=$request->text;
        $advicedescription=$request->advicedescription;
        DB::update('update  patientdischarge set  `dischargedate`= ?,`admission_id`= ?, `diagnosis`=?, `treatmentdescription` = ?, `advicedescription`=?   where patientdischarge_id = ?',[$dischargedate,$admission_id,$diagnosis,$treatmentdescription,$advicedescription,$patientdischarge]);
        return redirect('stpatientdischarge');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\patientdischarge  $patientdischarge
     * @return \Illuminate\Http\Response
     */
    public function deldata($patientdischarge)
    {
        DB::delete('delete from patientdischarge where patientdischarge_id = ?',[$patientdischarge]);
        return redirect('patientdischarge');
    }

    public function stdeldata($patientdischarge)
    {
        DB::delete('delete from patientdischarge where patientdischarge_id = ?',[$patientdischarge]);
        return redirect('stpatientdischarge');
    }

}


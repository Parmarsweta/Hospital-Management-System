<?php

namespace App\Http\Controllers;

use App\Models\Patienttest;
use App\Models\admission;
use App\Models\test;
use DB;

use Illuminate\Http\Request;

class PatienttestController extends Controller
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
            $data = Patienttest::join('admission', 'Patienttest.admission_id', '=', 'admission.admission_id')
                            ->join('test', 'Patienttest.test_id', '=', 'test.test_id')
                            ->get(['Patienttest.*', 'admission.admission_id', 'test.name']);
        //data=patienttest::all();
        return view('patienttestlist',['data'=>$data]);
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
            $data = Patienttest::join('admission', 'Patienttest.admission_id', '=', 'admission.admission_id')
            ->join('test', 'Patienttest.test_id', '=', 'test.test_id')
            ->where('admission.doctor_id',$drid)->get(['Patienttest.*', 'admission.admission_id', 'test.name']);
                
            return view('doctor/patienttestlist',['data'=>$data]);
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
        $adata=admission::all();
        $tdata=test::all();
        return view('patienttestadd',['adata'=>$adata,'tdata'=>$tdata]);
    }
    public function drcreate()
    {
        $adata=admission::all();
        $tdata=test::all();
        return view('doctor/patienttestadd',['adata'=>$adata,'tdata'=>$tdata]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patienttest=new patienttest();
        $patienttest->patienttest_id=$request->patienttestid;
        $patienttest->admission_id=$request->admissionid;
        $patienttest->test_id=$request->testid;
        $patienttest->datetime=$request->testdate;
        $patienttest->reportdescription=$request->txt;
        $patienttest->save();
        return redirect('patienttest');
    }
    public function drstore(Request $request)
    {
        $patienttest=new patienttest();
        $patienttest->patienttest_id=$request->patienttestid;
        $patienttest->admission_id=$request->admissionid;
        $patienttest->test_id=$request->testid;
        $patienttest->datetime=$request->testdate;
        $patienttest->reportdescription=$request->txt;
        $patienttest->save();
        return redirect('drpatienttest');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patienttest  $patienttest
     * @return \Illuminate\Http\Response
     */
    public function show(Patienttest $patienttest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patienttest  $patienttest
     * @return \Illuminate\Http\Response
     */
    public function edit($patienttest)
    {
        $adata=admission::all();
        $tdata=test::all();
        $data=Patienttest::where('patienttest_id',$patienttest)->get()->first();
        return view('patienttestedit',['data'=> $data,'adata'=>$adata,'tdata'=>$tdata]);
    }
    public function dredit($patienttest)
    {
        $adata=admission::all();
        $tdata=test::all();
        $data=Patienttest::where('patienttest_id',$patienttest)->get()->first();
        return view('doctor/patienttestedit',['data'=> $data,'adata'=>$adata,'tdata'=>$tdata]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patienttest  $patienttest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$patienttest)
    {
        $admission_id=$request->admissionid;
        $test_id=$request->testid;
        $datetime=$request->testdate;
        $reportdescription=$request->txt;
        DB::update('update patienttest set `admission_id`= ?, `test_id`=?, `datetime` = ?, `reportdescription`= ?  where patienttest_id = ?',[$admission_id,$test_id,$datetime,$reportdescription,$patienttest]);
        return redirect('patienttest');
    }
    public function drupdate(Request $request,$patienttest)
    {
        $admission_id=$request->admissionid;
        $test_id=$request->testid;
        $datetime=$request->testdate;
        $reportdescription=$request->txt;
        DB::update('update patienttest set `admission_id`= ?, `test_id`=?, `datetime` = ?, `reportdescription`= ?  where patienttest_id = ?',[$admission_id,$test_id,$datetime,$reportdescription,$patienttest]);
        return redirect('drpatienttest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patienttest  $patienttest
     * @return \Illuminate\Http\Response
     */
    public function deldata($patienttest)
    {
        DB::delete('delete from patienttest where patienttest_id = ?',[$patienttest]);
        return redirect('patienttest');
    }
}

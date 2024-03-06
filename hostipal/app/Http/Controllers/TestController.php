<?php

namespace App\Http\Controllers;

use App\Models\test;
use Illuminate\Http\Request;
use DB;

class TestController extends Controller
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
        $data = test::all();
        return view('testlist',['data'=>$data]);
        }
        else
        {
            return redirect('adminlogin');
        }
    }

        public function printdata()
        {        
            $data = test::all();
        return view('testprint',['data'=>$data]);
        }

    public function drindex()
    {
        if(session()->has('did'))
        {
        $drid=session('did');
        $data=test::where('test_id',$drid)->get();
        //$data = test::all();
        return view('doctor/testlist',['data'=>$data]);
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
        $data = test::all();
        return view('testadd',['data'=>$data]);
    }
    public function drcreate()
    {
        $data = test::all();
        return view('doctor/testadd',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test=new test();
        $test->test_id=$request->testid;
        $test->name=$request->testname;
        $test->description=$request->txt;
        $test->testcharge=$request->testcharge;
        $test->save();
        return redirect('test');
    }
    public function drstore(Request $request)
    {
        $test=new test();
        $test->test_id=$request->testid;
        $test->name=$request->testname;
        $test->description=$request->txt;
        $test->testcharge=$request->testcharge;
        $test->save();
        return redirect('drtest');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit($test)
    {
        $data=test::where('test_id',$test)->get()->first();
        //$data=DB::select('select * from ward where ward_id = ?',[$ward]);
        return view('testedit',['data'=> $data]);
    }
    public function dredit($test)
    {
        $data=test::where('test_id',$test)->get()->first();
        //$data=DB::select('select * from ward where ward_id = ?',[$ward]);
        return view('doctor/testedit',['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$test)
    {
        $name=$request->testname;
        $description=$request->txt;
        $testcharge=$request->testcharge;
        DB::update('update test set `name`=?, `description`=?, `testcharge` = ? where test_id = ?',[$name,$description,$testcharge,$test]);
        return redirect('test');

    }
    public function drupdate(Request $request,$test)
    {
        $name=$request->testname;
        $description=$request->txt;
        $testcharge=$request->testcharge;
        DB::update('update test set `name`=?, `description`=?, `testcharge` = ? where test_id = ?',[$name,$description,$testcharge,$test]);
        return redirect('drtest');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function deldata($test)
    {
        DB::delete('delete from test where test_id = ?',[$test]);
        return redirect('test');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ward;
use Illuminate\Http\Request;
use DB;
class WardController extends Controller
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
            $data = ward::all();
            return view('wardlist',['data'=> $data]);
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
        $did=session('did');
        $data=ward::where('ward_id',$did)->get();
        return view('doctor/wardlist',['data'=> $data]);
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
        $data=ward::where('ward_id',$stid)->get();
        $data = ward::all();
        return view('staff/wardlist',['data'=> $data]);
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
        $data = ward::all();
        return view('wardadd',['data'=> $data]);
    }
    public function drcreate()
    {
        $data = ward::all();
        return view('doctor/wardadd',['data'=> $data]);
    }

    public function stcreate()
    {
        $data = ward::all();
        return view('staff/wardadd',['data'=> $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ward=new ward();
        $ward->ward_id=$request->wardid;
        $ward->name=$request->wardname;
        $ward->save();
        return redirect('ward');
    }
    public function drstore(Request $request)
    {
        $ward=new ward();
        $ward->ward_id=$request->wardid;
        $ward->name=$request->wardname;
        $ward->save();
        return redirect('drward');
    }

    public function ststore(Request $request)
    {
        $ward=new ward();
        $ward->ward_id=$request->wardid;
        $ward->name=$request->wardname;
        $ward->save();
        return redirect('stward');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function show(ward $ward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function edit($ward)
    {
        
        $data=ward::where('ward_id',$ward)->get()->first();
        //$data=DB::select('select * from ward where ward_id = ?',[$ward]);
        return view('wardedit',['data'=> $data]);
    }
    public function dredit($ward)
    {
        if(session()->has('did'))
        {
        $did=session('did');
        $data=ward::where('ward_id',$did)->get()->first();
        //$data=DB::select('select * from ward where ward_id = ?',[$ward]);
        return view('doctor/wardedit',['data'=> $data]);
        }
        else
        {
            return redirect('doctorlogin');
        }
    }

    public function stedit($ward)
    {
        if(session()->has('sid'))
        {
        $stid=session('sid');
        $data=ward::where('ward_id',$ward)->get()->first();
        //$data=DB::select('select * from ward where ward_id = ?',[$ward]);
        return view('staff/wardedit',['data'=> $data]);
        }
        else
        {
        return redirect('stafflogin');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $ward)
    {
        $name=$request->wardname;
        DB::update('update ward set name=? where ward_id = ?',[$name,$ward]);
        return redirect('ward');
    }
    public function drupdate(Request $request, $ward)
    {
        $name=$request->wardname;
        DB::update('update ward set name=? where ward_id = ?',[$name,$ward]);
        return redirect('drward');
    }

    public function stupdate(Request $request, $ward)
    {
        $name=$request->wardname;
        DB::update('update ward set name=? where ward_id = ?',[$name,$ward]);
        return redirect('stward');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function deldata( $wa)
    {
        DB::delete('delete from ward where ward_id = ?',[$wa]);
        return redirect('ward');
    }
}

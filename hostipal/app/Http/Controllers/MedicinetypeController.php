<?php

namespace App\Http\Controllers;

use App\Models\medicinetype;
use Illuminate\Http\Request;
use DB;

class MedicinetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Medicinetype::all();
        return view('medicinetypelist',['data'=>$data]);
    }

    public function drindex()
    {
        if(session()->has('did'))
        {
            $drid=session('did');
            $data=Medicinetype::where('medicinetype_id',$drid)->get();
            $data = Medicinetype::all();

            return view('doctor/medicinetypelist',['data'=>$data]);
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
            $data = Medicinetype::all();
            $data=Medicinetype::where('medicinetype_id',$stid)->get();
            $data = Medicinetype::all();
            return view('staff/medicinetypelist',['data'=>$data]);
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
        $mdata =medicinetype::all();
        return view('medicinetypeadd',['mdata'=>$mdata]);
    
    }

    public function stcreate()
    {
        $mdata =medicinetype::all();
        return view('staff/medicinetypeadd',['mdata'=>$mdata]);
    
    }
    public function drcreate()
    {
        $mdata =medicinetype::all();
        return view('doctor/medicinetypeadd',['mdata'=>$mdata]);
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicinetype=new Medicinetype();
        $medicinetype->medicinetype_id=$request->medicinetypeid;
        $medicinetype->medicinetype=$request->txt;
        $medicinetype->save();
        return redirect('medicinetype');
    }

    public function ststore(Request $request)
    {
        $medicinetype=new Medicinetype();
        $medicinetype->medicinetype_id=$request->medicinetypeid;
        $medicinetype->medicinetype=$request->txt;
        $medicinetype->save();
        return redirect('stmedicinetype');
    }
    public function drstore(Request $request)
    {
        $medicinetype=new Medicinetype();
        $medicinetype->medicinetype_id=$request->medicinetypeid;
        $medicinetype->medicinetype=$request->txt;
        $medicinetype->save();
        return redirect('drmedicinetype');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\medicinetype  $medicinetype
     * @return \Illuminate\Http\Response
     */
    public function show(medicinetype $medicinetype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\medicinetype  $medicinetype
     * @return \Illuminate\Http\Response
     */
    public function edit($medicinetype)
    {
        $data=Medicinetype::where('medicinetype_id',$medicinetype)->get()->first();
        return view('medicinetypeedit',['data'=> $data]);   
    }

    public function stedit($medicinetype)
    {
        if(session()->has('sid'))
        {
        $stid=session('sid');
        $data=Medicinetype::where('medicinetype_id',$stid)->get()->first();
        return view('staff/medicinetypeedit',['data'=> $data]);   
        }
        else
        {
        return redirect('stafflogin');
        }
    }
    public function dredit($medicinetype)
    {
        if(session()->has('did'))
        {
        $did=session('did');
        $data=Medicinetype::where('medicinetype_id',$did)->get()->first();
        return view('doctor/medicinetypeedit',['data'=> $data]);   
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
     * @param  \App\Models\medicinetype  $medicinetype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$medicinetypeid)
    {
        $medicinetype=$request->txt;
        DB::update('update medicinetype set `medicinetype`=? where medicinetype_id = ?',[$medicinetype,$medicinetypeid]);
        return redirect('medicinetype');
    }

    public function stupdate(Request $request,$medicinetypeid)
    {
        $medicinetype=$request->txt;
        DB::update('update medicinetype set `medicinetype`=? where medicinetype_id = ?',[$medicinetype,$medicinetypeid]);
        return redirect('stmedicinetype');
    }
    public function drupdate(Request $request,$medicinetypeid)
    {
        $medicinetype=$request->txt;
        DB::update('update medicinetype set `medicinetype`=? where medicinetype_id = ?',[$medicinetype,$medicinetypeid]);
        return redirect('drmedicinetype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\medicinetype  $medicinetype
     * @return \Illuminate\Http\Response
     */
    public function deldata($medicinetype)
    {
        DB::delete('delete from medicinetype where medicinetype_id = ?',[$medicinetype]);
        return redirect('medicinetype');
    }
}

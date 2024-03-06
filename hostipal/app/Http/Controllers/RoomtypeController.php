<?php

namespace App\Http\Controllers;

use App\Models\Roomtype;
use Illuminate\Http\Request;
use DB;

class RoomtypeController extends Controller
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
        $data = Roomtype::all();
        return view('Roomtypelist',['data'=>$data]);
        }
        else
        {
        return redirect('adminlogin');
        }
    }
public function printdata()
{
    $data = Roomtype::all();
    return view('roomprint',['data'=>$data]);
}
    public function  drindex()
    {   
        if(session()->has('did'))
        {
        $drid=session('did');
        $data = Roomtype::all();
        $data=roomtype::where('roomtype_id',$drid)->get();
        return view('doctor/Roomtypelist',['data'=>$data]);
        }
        else
        {
            return redirect('doctorlogin');
            
        }
    }

    public function  stindex()
    {   
        if(session()->has('sid'))
        {
        $stid=session('sid');
        $data = Roomtype::all();

        $data=roomtype::where('roomtype_id',$stid)->get();
        return view('staff/Roomtypelist',['data'=>$data]);
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
        $rtdata = Roomtype::all();
        return view('roomtypeadd',['rtdata'=> $rtdata]);
    }

    public function stcreate()
    {
        $rtdata = Roomtype::all();
        return view('staff/roomtypeadd',['rtdata'=> $rtdata]);
    }

    public function drcreate()
    {
        $rtdata = Roomtype::all();
        return view('doctor/roomtypeadd',['rtdata'=> $rtdata]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roomtypeo=new Roomtype();
        $roomtypeo->roomtype_id=$request->roomtypeid;
        $roomtypeo->roomtype=$request->txt;
        $roomtypeo->nursingcharge=$request->nursingcharge;
        $roomtypeo->doctorcharge=$request->doctorcharge;
        $roomtypeo->bedcharge=$request->bedcharge;
        $roomtypeo->save();
        return redirect('roomtype');
    }

    public function ststore(Request $request)
    {
        $roomtypeo=new Roomtype();
        $roomtypeo->roomtype_id=$request->roomtypeid;
        $roomtypeo->roomtype=$request->txt;
        $roomtypeo->nursingcharge=$request->nursingcharge;
        $roomtypeo->doctorcharge=$request->doctorcharge;
        $roomtypeo->bedcharge=$request->bedcharge;
        $roomtypeo->save();
        return redirect('stroomtype');
    }

    public function drstore(Request $request)
    {
        $roomtypeo=new Roomtype();
        $roomtypeo->roomtype_id=$request->roomtypeid;
        $roomtypeo->roomtype=$request->txt;
        $roomtypeo->nursingcharge=$request->nursingcharge;
        $roomtypeo->doctorcharge=$request->doctorcharge;
        $roomtypeo->bedcharge=$request->bedcharge;
        $roomtypeo->save();
        return redirect('drroomtype');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function show(Roomtype $roomtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function edit($roomtype)
    {
        $rtdata = Roomtype::all();
        $data=roomtype::where('roomtype_id',$roomtype)->get()->first();
        return view('roomtypeedit',['data'=> $data,'rtdata'=> $rtdata]);
    }
    public function stedit($roomtype)
    {
        $rtdata = Roomtype::all();
        $data=roomtype::where('roomtype_id',$roomtype)->get()->first();
        return view('staff/roomtypeedit',['data'=> $data,'rtdata'=> $rtdata]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$roomtypeid)
    {
        $roomtype=$request->txt;
        $nursingcharge=$request->nursingcharge;
        $doctorcharge=$request->doctorcharge;
        $bedcharge=$request->bedcharge;
        DB::update('update roomtype set `roomtype`= ?, `nursingcharge` = ?, `doctorcharge` = ?, `bedcharge` = ? where roomtype_id = ?',[$roomtype,$nursingcharge,$doctorcharge,$bedcharge,$roomtypeid]);
        return redirect('roomtype');
    }

    public function stupdate(Request $request,$roomtypeid)
    {
        $roomtype=$request->txt;
        $nursingcharge=$request->nursingcharge;
        $doctorcharge=$request->doctorcharge;
        $bedcharge=$request->bedcharge;
        DB::update('update roomtype set `roomtype`= ?, `nursingcharge` = ?, `doctorcharge` = ?, `bedcharge` = ? where roomtype_id = ?',[$roomtype,$nursingcharge,$doctorcharge,$bedcharge,$roomtypeid]);
        return redirect('stroomtype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function deldata($rtype)
    {
        DB::delete('delete from roomtype where roomtype_id = ?',[$rtype]);
        return redirect('roomtype');
    }
}

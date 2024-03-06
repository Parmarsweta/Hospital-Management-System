<?php

namespace App\Http\Controllers;

use App\Models\bed;
use App\Models\room;
use Illuminate\Http\Request;
use DB;

class BedController extends Controller
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
            
        $data = bed::join('room', 'bed.room_id', '=', 'room.room_id')
        ->get(['bed.*', 'room.room_no']);

        //$data=bed::all();
        return view('bedlist',['data'=> $data]);
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
        //$data=bed::all();
        return view('bedlist',['data'=> $data]);
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
        $rdata = Room::all();
        return view('bedadd',['rdata'=> $rdata]);

        

    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bedo=new bed();
        $bedo->bed_id=$request->bedid;
        $bedo->bed_no=$request->bedno;
        $bedo->room_id=$request->roomid;
        $bedo->save();
        return redirect('bed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function show(bed $bed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function edit($bed)
    {
        $rdata = Room::all();
        $data=bed::where('bed_id',$bed)->get()->first();
        return view('bededit',['data'=> $data,'rdata'=> $rdata]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$bed)
    {
        $bed_no=$request->bedno;
        $room_id=$request->roomid;
        DB::update('update bed set `bed_no` = ?, `room_id` = ? where bed_id = ?',[$bed_no,$room_id,$bed]);
        return redirect('bed');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function deldata($bed)
    {
        DB::delete('delete from bed where bed_id = ?',[$bed]);
        return redirect('bed');
    }
}

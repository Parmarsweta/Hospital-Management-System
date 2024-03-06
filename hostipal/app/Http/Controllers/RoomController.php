<?php

namespace App\Http\Controllers;

use App\Models\room;
use App\Models\Roomtype;
use App\Models\ward;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
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
            $data = room::join('roomtype', 'room.roomtype_id', '=', 'roomtype.roomtype_id')
                    ->join('ward', 'room.ward_id', '=', 'ward.ward_id')
                    ->get(['room.*', 'roomtype.roomtype','ward.name']);
            return view('roomlist',['data'=> $data]);
        }
        else
        {
        return redirect('adminlogin');
        }
    }


    public function drindex()
    {
        if(session()->has('did'))
        {   $drid=session('did');
            $data = room::join('roomtype', 'room.roomtype_id', '=', 'roomtype.roomtype_id')
            ->join('ward', 'room.ward_id', '=', 'ward.ward_id')
            ->where('room_id',$drid)->get(['room.*', 'roomtype.roomtype','ward.name']);
            //$data = room::all();
        return view('doctor/roomlist',['data'=> $data]);
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
        $sid=session('sid');
        $data = room::join('roomtype', 'room.roomtype_id', '=', 'roomtype.roomtype_id')
                    ->join('ward', 'room.ward_id', '=', 'ward.ward_id')
                    ->where('room_id',$sid)->get(['room.*', 'roomtype.roomtype','ward.name']);
            return view('staff/roomlist',['data'=> $data]);
    }
    else
    {
        return redirect('satfflogin');
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
        $wdata = ward::all();
        return view('roomadd',['rtdata'=> $rtdata,'wdata'=> $wdata]);
    }

    public function stcreate()
    {
        $rtdata = Roomtype::all();
        $wdata = ward::all();
        return view('staff/roomadd',['rtdata'=> $rtdata,'wdata'=> $wdata]);
    }

    public function drcreate()
    {
        $rtdata = Roomtype::all();
        $wdata = ward::all();
        return view('doctor/roomadd',['rtdata'=> $rtdata,'wdata'=> $wdata]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room=new room();
        $room->room_id=$request->roomid;
        $room->room_no=$request->roomno;
        $room->roomtype_id=$request->roomtypeid;
        $room->no_of_beds=$request->noofbeds;
        $room->ward_id=$request->wardid;
        $room->save();
        return redirect('room');
    }

    public function ststore(Request $request)
    {
        $room=new room();
        $room->room_id=$request->roomid;
        $room->room_no=$request->roomno;
        $room->roomtype_id=$request->roomtypeid;
        $room->no_of_beds=$request->noofbeds;
        $room->ward_id=$request->wardid;
        $room->save();
        return redirect('stroom');
    }

    public function drstore(Request $request)
    {
        $room=new room();
        $room->room_id=$request->roomid;
        $room->room_no=$request->roomno;
        $room->roomtype_id=$request->roomtypeid;
        $room->no_of_beds=$request->noofbeds;
        $room->ward_id=$request->wardid;
        $room->save();
        return redirect('drroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit( $room)
    {
        $rtdata = Roomtype::all();
        $wdata = ward::all();
        $data=room::where('room_id',$room)->get()->first();
        //$data=DB::select('select * from room where room_id = ?',[$room]);
        return view('roomedit',['data'=> $data,'rtdata'=> $rtdata,'wdata'=> $wdata]);
    }

    public function dredit( $room)
    {
        $rtdata = Roomtype::all();
        $wdata = ward::all();
        $data=room::where('room_id',$room)->get()->first();
        //$data=DB::select('select * from room where room_id = ?',[$room]);
        return view('doctor/roomedit',['data'=> $data,'rtdata'=> $rtdata,'wdata'=> $wdata]);
    }

    public function stedit($room)
    {
        if(session()->has('sid'))
        {
        $sid=session('sid');
        $rtdata = Roomtype::all();
        $wdata = ward::all();
        $data=room::where('room_id',$room)->get()->first();
        return view('staff/roomedit',['data'=> $data,'rtdata'=> $rtdata,'wdata'=> $wdata]);
        }
        else
        {
        return redirect('satfflogin');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$room)
    {
        $name=$request->roomname;
        $room_no=$request->roomno;
        $roomtype_id=$request->roomtypeid;
        $no_of_beds=$request->noofbeds;
        $ward_id=$request->wardid;
        DB::update('update room set `room_no` = ?,`roomtype_id` = ?, `no_of_beds` = ?, `ward_id` =? where room_id = ?',[$room_no,$roomtype_id,$no_of_beds,$ward_id,$room]);
        return redirect('room');
    }

    public function stupdate(Request $request,$room)
    {
        $name=$request->roomname;
        $room_no=$request->roomno;
        $roomtype_id=$request->roomtypeid;
        $no_of_beds=$request->noofbeds;
        $ward_id=$request->wardid;
        DB::update('update room set `room_no` = ?,`roomtype_id` = ?, `no_of_beds` = ?, `ward_id` =? where room_id = ?',[$room_no,$roomtype_id,$no_of_beds,$ward_id,$room]);
        return redirect('stroom');
    }
    public function drupdate(Request $request,$room)
    {
        $name=$request->roomname;
        $room_no=$request->roomno;
        $roomtype_id=$request->roomtypeid;
        $no_of_beds=$request->noofbeds;
        $ward_id=$request->wardid;
        DB::update('update room set `room_no` = ?,`roomtype_id` = ?, `no_of_beds` = ?, `ward_id` =? where room_id = ?',[$room_no,$roomtype_id,$no_of_beds,$ward_id,$room]);
        return redirect('drroom');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function deldata($room)
    {
        DB::delete('delete from room where room_id = ?',[$room]);
        return redirect('room');
    }
}

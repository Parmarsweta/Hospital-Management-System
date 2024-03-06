<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use App\models\medicinetype;
use Illuminate\Http\Request;
use DB;
class MedicineController extends Controller
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
            $data = medicine::join('medicinetype', 'medicine.medicinetype_id', '=', 'medicinetype.medicinetype_id')
                ->get(['medicine.*', 'medicinetype.medicinetype']);
        //$data =medicine::all();
        return view('medicinelist',['data'=>$data]);
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
            $data = medicine::join('medicinetype', 'medicine.medicinetype_id', '=', 'medicinetype.medicinetype_id')
                ->get(['medicine.*', 'medicinetype.medicinetype']);
        $did=session('did');
        //$data=medicine::where('medicine_id',$did)->get();
        return view('doctor/medicinelist',['data'=>$data]);
        
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
        $mdata =medicinetype::all();
        return view('medicineadd',['mdata'=>$mdata]);
    }

    public function drcreate()
    {
        $mdata =medicinetype::all();
        return view('doctor/medicineadd',['mdata'=>$mdata]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicine=new Medicine();
        $medicine->medicine_id=$request->medicineid;
        $medicine->name=$request->medicinetxt;
        $medicine->brand=$request->Brandtxt;
        $medicine->storageinstruction=$request->txt;
        $medicine->medicinetype_id=$request->medicinetypeid;
        $medicine->packing=$request->medicinepacking;
        $medicine->price=$request->price;
        $medicine->save();
        return redirect('medicine');
    }
    public function drstore(Request $request)
    {
        $medicine=new Medicine();
        $medicine->medicine_id=$request->medicineid;
        $medicine->name=$request->medicinetxt;
        $medicine->brand=$request->Brandtxt;
        $medicine->storageinstruction=$request->txt;
        $medicine->medicinetype_id=$request->medicinetypeid;
        $medicine->packing=$request->medicinepacking;
        $medicine->price=$request->price;
        $medicine->save();
        return redirect('drmedicine');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($medicine)
    {
        $mdata =medicinetype::all();
        $data=medicine::where('medicine_id',$medicine)->get()->first();
        return view('medicineedit',['data'=> $data,'mdata'=>$mdata]);
    }
    public function dredit($medicine)
    {
        if(session()->has('did'))
        {
        $did=session('did');
        $mdata =medicinetype::all();
        $data=medicine::where('medicine_id',$did)->get()->first();
        return view('doctor/medicineedit',['data'=> $data,'mdata'=>$mdata]);
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
     * @param  \App\Models\medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$medicine)
    {
        $name=$request->medicinetxt;
        $brand=$request->Brandtxt;
        $storageinstruction=$request->txt;
        $medicinetype_id=$request->medicinetypeid;
        $packing=$request->medicinepacking;
        $price=$request->price;
        DB::update('update medicine set `name`=?, `brand`=?, `storageinstruction`=?,`medicinetype_id`=?, `packing`=?, `price`=? where medicine_id = ?',[$name,$brand,$storageinstruction,$medicinetype_id,$packing,$price,$medicine]);
        return redirect('medicine');
    }
    public function drupdate(Request $request,$medicine)
    {
        $name=$request->medicinetxt;
        $brand=$request->Brandtxt;
        $storageinstruction=$request->txt;
        $medicinetype_id=$request->medicinetypeid;
        $packing=$request->medicinepacking;
        $price=$request->price;
        DB::update('update medicine set `name`=?, `brand`=?, `storageinstruction`=?,`medicinetype_id`=?, `packing`=?, `price`=? where medicine_id = ?',[$name,$brand,$storageinstruction,$medicinetype_id,$packing,$price,$medicine]);
        return redirect('drmedicine');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function deldata($medicine)
    {
        DB::delete('delete from medicine where medicine_id = ?',[$medicine]);
        return redirect('medicine');
    }
}

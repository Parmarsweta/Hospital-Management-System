<?php

namespace App\Http\Controllers;

use App\Models\medicineallocation;
use App\Models\admission;
use App\Models\medicine;
use Illuminate\Http\Request;
use DB;

class MedicineallocationController extends Controller
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
            $data = medicineallocation::join('admission', 'medicineallocation.admission_id', '=', 'admission.admission_id')
                                      ->join('medicine', 'medicineallocation.medicine_id', '=', 'medicine.medicine_id')
                                    ->get(['medicineallocation.*', 'admission.admission_id','medicine.name']);

        //$data=medicineallocation::all();
        return view('medicineallocationlist',['data'=>$data]);
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
         
            $data = medicineallocation::join('admission', 'medicineallocation.admission_id', '=', 'admission.admission_id')
                                      ->join('medicine', 'medicineallocation.medicine_id', '=', 'medicine.medicine_id')
                                    ->where('medicineallocation_id',$drid)->get(['medicineallocation.*', 'admission.admission_id','medicine.name as mname']);
         return view('doctor/medicineallocationlist',['data'=>$data]);
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
            $data = medicineallocation::join('admission', 'medicineallocation.admission_id', '=', 'admission.admission_id')
                                      ->join('medicine', 'medicineallocation.medicine_id', '=', 'medicine.medicine_id')
                                    ->get(['medicineallocation.*', 'admission.admission_id','medicine.name']);
                                    
         return view('staff/medicineallocationlist',['data'=>$data]);
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
        $medata = medicine::all();
        return view('medicineallocationadd',['adata'=>$adata,'medata'=>$medata]);
    }

    public function stcreate()
    {
        $adata = admission::all();
        $medata = medicine::all();
        return view('staff/medicineallocationadd',['adata'=>$adata,'medata'=>$medata]);
    }
    public function drcreate()
    {
        $adata = admission::all();
        $medata = medicine::all();
        return view('doctor/medicineallocationadd',['adata'=>$adata,'medata'=>$medata]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicineallocation=new medicineallocation();
        $medicineallocation->medicineallocation_id=$request->medicineallocaionid;
        $medicineallocation->admission_id=$request->admissionid;
        $medicineallocation->medicine_id=$request->medicineid;
        $medicineallocation->quantity=$request->txt;
        $medicineallocation->allocationdate=$request->date;
        $medicineallocation->save();
        return redirect('medicineallocation');
    }

    public function drstore(Request $request)
    {
        $medicineallocation=new medicineallocation();
        $medicineallocation->medicineallocation_id=$request->medicineallocaionid;
        $medicineallocation->admission_id=$request->admissionid;
        $medicineallocation->medicine_id=$request->medicineid;
        $medicineallocation->quantity=$request->txt;
        $medicineallocation->allocationdate=$request->date;
        $medicineallocation->save();
        return redirect('drmedicineallocation');
    }
    public function ststore(Request $request)
    {
        $medicineallocation=new medicineallocation();
        $medicineallocation->medicineallocation_id=$request->medicineallocaionid;
        $medicineallocation->admission_id=$request->admissionid;
        $medicineallocation->medicine_id=$request->medicineid;
        $medicineallocation->quantity=$request->txt;
        $medicineallocation->allocationdate=$request->date;
        $medicineallocation->save();
        return redirect('stmedicineallocation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\medicineallocation  $medicineallocation
     * @return \Illuminate\Http\Response
     */
    public function show(medicineallocation $medicineallocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\medicineallocation  $medicineallocation
     * @return \Illuminate\Http\Response
     */
    public function edit($medicineallocation)
    {
        $adata = admission::all();
        $medata = medicine::all();
        $data=Medicineallocation::where('medicineallocation_id',$medicineallocation)->get()->first();
        return view('medicineallocationedit',['data'=> $data,'adata'=>$adata,'medata'=>$medata]);
    }

    public function stedit($medicineallocation)
    {
        if(session()->has('sid'))
        {
        $stid=session('sid');
        $adata = admission::all();
        $medata = medicine::all();
        $data=Medicineallocation::where('medicineallocation_id',$medicineallocation)->get()->first();
        return view('staff/medicineallocationedit',['data'=> $data,'adata'=>$adata,'medata'=>$medata]);
        }
        else
        {
        return redirect('stafflogin');
        }
    }

    public function dredit($medicineallocation)
    {
        if(session()->has('did'))
        {
        $did=session('did');
        $adata = admission::all();
        $medata = medicine::all();
        $data=Medicineallocation::where('medicineallocation_id',$medicineallocation)->get()->first();
        return view('doctor/medicineallocationedit',['data'=> $data,'adata'=>$adata,'medata'=>$medata]);
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
     * @param  \App\Models\medicineallocation  $medicineallocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$medicineallocation)
    {
        $admission_id=$request->admissionid;
        $medicine_id=$request->medicineid;
        $quantity=$request->txt;
        $allocationdate=$request->date;
        DB::update('update medicineallocation set `admission_id`=?, `medicine_id`=?, `quantity`=?,`allocationdate`=? where medicineallocation_id = ?',[$admission_id,$medicine_id,$quantity,$allocationdate,$medicineallocation]);
        return redirect('medicineallocation');
    }

    public function stupdate(Request $request,$medicineallocation)
    {
        $admission_id=$request->admissionid;
        $medicine_id=$request->medicineid;
        $quantity=$request->txt;
        $allocationdate=$request->date;
        DB::update('update medicineallocation set `admission_id`=?, `medicine_id`=?, `quantity`=?,`allocationdate`=? where medicineallocation_id = ?',[$admission_id,$medicine_id,$quantity,$allocationdate,$medicineallocation]);
        return redirect('stmedicineallocation');
    }

    public function drupdate(Request $request,$medicineallocation)
    {
        $admission_id=$request->admissionid;
        $medicine_id=$request->medicineid;
        $quantity=$request->txt;
        $allocationdate=$request->date;
        DB::update('update medicineallocation set `admission_id`=?, `medicine_id`=?, `quantity`=?,`allocationdate`=? where medicineallocation_id = ?',[$admission_id,$medicine_id,$quantity,$allocationdate,$medicineallocation]);
        return redirect('drmedicineallocation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\medicineallocation  $medicineallocation
     * @return \Illuminate\Http\Response
     */
    public function deldata($medicineallocation)
    {
        DB::delete('delete from medicineallocation where medicineallocation_id = ?',[$medicineallocation]);
        return redirect('medicineallocation');
    }

    public function stdeldata($medicineallocation)
    {
        DB::delete('delete from medicineallocation where medicineallocation_id = ?',[$medicineallocation]);
        return redirect('stmedicineallocation');
    }
}

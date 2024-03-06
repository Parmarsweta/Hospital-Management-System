<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\admission;
use App\Models\medicine;
use Illuminate\Http\Request;
use DB;

class TreatmentController extends Controller
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
            $data = Treatment::join('admission', 'Treatment.admission_id', '=', 'admission.admission_id')
                            ->join('medicine', 'Treatment.medicine_id', '=', 'medicine.medicine_id')
                            ->get(['Treatment.*', 'admission.admission_id', 'medicine.name']);
        //$data=treatment::all();
        return view('treatmentlist',['data'=>$data]);
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
            $data = Treatment::join('admission', 'Treatment.admission_id', '=', 'admission.admission_id')
            ->join('medicine', 'Treatment.medicine_id', '=', 'medicine.medicine_id')
            ->where('admission.doctor_id',$did)->get(['Treatment.*', 'admission.admission_id', 'medicine.name']);
                
            return view('doctor/treatmentlist',['data'=>$data]);
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
            $data = Treatment::join('admission', 'Treatment.admission_id', '=', 'admission.admission_id')
            ->join('medicine', 'Treatment.medicine_id', '=', 'medicine.medicine_id')
            ->get(['Treatment.*', 'admission.admission_id', 'medicine.name']);
                
            return view('staff/treatmentlist',['data'=>$data]);
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
        $adata=admission::all();
        $mdata=medicine::all();
        return view('treatmentadd',['adata'=>$adata,'mdata'=>$mdata]);
    }
    public function drcreate()
    {
        $did=session('did');
        $adata=admission::where('admission.doctor_id',$did)->get();
        $mdata=medicine::all();
        return view('doctor/treatmentadd',['adata'=>$adata,'mdata'=>$mdata]);
    }
    public function stcreate()
    {
        $adata=admission::all();
        $mdata=medicine::all();
        return view('staff/treatmentadd',['adata'=>$adata,'mdata'=>$mdata]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $treatment=new treatment();
        $treatment->treatment_id=$request->treatmentid;
        $treatment->admission_id=$request->admissionid;
        $treatment->medicine_id=$request->medicineid;
        $treatment->instructions=$request->txt;
        $treatment->treatmentdate=$request->date;
        $treatment->save();
        return redirect('treatment');
    }
    public function drstore(Request $request)
    {
        
        $treatment=new treatment();
        $treatment->treatment_id=$request->treatmentid;
        $treatment->admission_id=$request->admissionid;
        $treatment->medicine_id=$request->medicineid;
        $treatment->instructions=$request->txt;
        $treatment->treatmentdate=$request->date;
        $treatment->save();
        return redirect('drtreatment');
    }
    public function ststore(Request $request)
    {
        
        $treatment=new treatment();
        $treatment->treatment_id=$request->treatmentid;
        $treatment->admission_id=$request->admissionid;
        $treatment->medicine_id=$request->medicineid;
        $treatment->instructions=$request->txt;
        $treatment->treatmentdate=$request->date;
        $treatment->save();
        return redirect('sttreatment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function show(Treatment $treatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function edit($treatment)
    {
        $adata=admission::all();
        $mdata=medicine::all();
        $data=Treatment::where('Treatment_id',$treatment)->get()->first();
        return view('Treatmentedit',['data'=> $data,'adata'=>$adata,'mdata'=>$mdata]);
    }
    public function dredit($treatment)
    {
        $adata=admission::all();
        $mdata=medicine::all();
        $data=Treatment::where('Treatment_id',$treatment)->get()->first();
        return view('doctor/Treatmentedit',['data'=> $data,'adata'=>$adata,'mdata'=>$mdata]);
    }
    public function stedit($treatment)
    {
        $adata=admission::all();
        $mdata=medicine::all();
        $data=Treatment::where('Treatment_id',$treatment)->get()->first();
        return view('staff/Treatmentedit',['data'=> $data,'adata'=>$adata,'mdata'=>$mdata]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$treatment)
    {
        
        $admission_id=$request->admissionid;
        $medicine_id=$request->medicineid;
        $instructions=$request->txt;
        $treatmentdate=$request->date;
        DB::update('update treatment set `admission_id`= ?, `medicine_id`= ?, `instructions`=?,`treatmentdate`= ? where treatment_id = ?',[$admission_id,$medicine_id,$instructions,$treatmentdate,$treatment]);
        return redirect('treatment');
    }
    public function drupdate(Request $request,$treatment)
    {
        
        $admission_id=$request->admissionid;
        $medicine_id=$request->medicineid;
        $instructions=$request->txt;
        $treatmentdate=$request->date;
        DB::update('update treatment set `admission_id`= ?, `medicine_id`= ?, `instructions`=?,`treatmentdate`= ? where treatment_id = ?',[$admission_id,$medicine_id,$instructions,$treatmentdate,$treatment]);
        return redirect('drtreatment');
    }
    public function stupdate(Request $request,$treatment)
    {
        
        $admission_id=$request->admissionid;
        $medicine_id=$request->medicineid;
        $instructions=$request->txt;
        $treatmentdate=$request->date;
        DB::update('update treatment set `admission_id`= ?, `medicine_id`= ?, `instructions`=?,`treatmentdate`= ? where treatment_id = ?',[$admission_id,$medicine_id,$instructions,$treatmentdate,$treatment]);
        return redirect('sttreatment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function deldata($treatment)
    {
        DB::delete('delete from treatment where treatment_id = ?',[$treatment]);
        return redirect('treatment');
    
    }
}

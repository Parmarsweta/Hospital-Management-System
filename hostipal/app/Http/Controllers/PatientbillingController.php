<?php

namespace App\Http\Controllers;

use App\Models\patientbilling;
use App\Models\admission;
use App\Models\bed;
use App\Models\room;
use App\Models\roomtype;
use App\Models\Patienttest;
use App\Models\medicineallocation;
use App\Models\doctorvisit;
use App\Models\medicine;
use App\Models\patient;
use App\Models\patientdischarge;
use App\Models\test;
use App\Models\doctor;

use Illuminate\Http\Request;
use DB;
use DateTime;

class PatientbillingController extends Controller
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
            $data = Patientbilling::join('admission', 'Patientbilling.admission_id', '=', 'admission.admission_id')
            ->get(['Patientbilling.*', 'admission.admission_id']);
        //$data=patientbilling::all();
        return view('patientbillinglist',['data'=>$data]);
    }
    else
    {
            return redirect('adminlogin');
    }
}   

    public function printdata()
    {        
        $data=patientbilling::all();
        return view('patientbillingprint',['data'=>$data]);
    }
    
    
    public function print($pdid)
    {       
        $billdata = patientbilling::where('bill_id',$pdid)->get()->first();
        $adid=$billdata->admission_id;

        $pdata=Admission::where('admission_id',$adid)->get()->first();
        $pid=$pdata->patient_id;
        
        $pddata = patientdischarge::where('admission_id',$adid)->get()->first();
        $adid=$pddata->admission_id;

        $ptdata=patient::where('patient_id',$pid)->get()->first();

        
        return view('printbilling',['billdata'=>$billdata,'pdata'=>$pdata,'pddata'=>$pddata,'ptdata'=>$ptdata]);
    }


    public function stindex()
    {
        if(session()->has('sid'))
        {
        //$stid=session('sid');
        $data=patientbilling::all();
        return view('staff/patientbillinglist',['data'=>$data]);
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
        $data = admission::join('patient', 'admission.patient_id', '=', 'patient.patient_id')
                        ->join('bed', 'admission.bed_id', '=', 'bed.bed_id')        
                         ->get(['admission.*','patient.name','bed.bed_no']);
                return view('patientbillingadd',['data'=> $data]);
    }
    public function stcreate()
    {
        $data = admission::join('patient', 'admission.patient_id', '=', 'patient.patient_id')
                        ->join('bed', 'admission.bed_id', '=', 'bed.bed_id')        
                         ->get(['admission.*','patient.name','bed.bed_no']);
                return view('staff/patientbillingadd',['data'=> $data]);
    }
    public function bcreate()
    {
        $data = bed::join('room', 'bed.room_id', '=', 'room.room_id')
                ->get(['bed.*','room.room_no']);
                return view('staff/patientbillingadd',['data'=> $data]);
    }
    public function rcreate()
    {
        $data = room::join('roomtype', 'room.roomtype_id', '=', 'roomtype.roomtype_id')
                ->get(['room.*','roomtype.roomtype']);
                return view('staff/patientbillingadd',['data'=> $data]);
    }
    public function rmcreate()
    {
        $data = roomtype::join('roomtype', 'roomtype.nursingcharge', '=', 'nursingcharge.nursingcharge')
                        ->join('roomtype', 'roomtype.doctorcharge', '=', 'doctorcharge.doctorcharge')
                        ->join('roomtype', 'roomtype.bedcharge', '=', 'bedcharge.bedcharge')
                        ->get(['roomtype.*','nursingcharge.nursingcharge','doctorcharge.doctorcharge','bedcharge.bedcharge']);
                return view('staff/patientbillingadd',['data'=> $data]);
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $patientbilling=new patientbilling();
        $patientbilling->bill_id=$request->billid;
        $patientbilling->admission_id=$request->admissionid;
        $patientbilling->bill_date=$request->billdate;
        $patientbilling->no_of_days=$request->noofdays;
        $patientbilling->bedcharge=$request->bedcharge;
        $patientbilling->doctorcharge=$request->doctorcharge;
        $patientbilling->nursingcharge=$request->nursingcharge;
        $patientbilling->medicinecharge=$request->medicinecharge;
        $patientbilling->testcharge=$request->testcharge;
        $patientbilling->doctorvisitcharge=$request->doctorvisitingcharge;
        $patientbilling->total=$request->total;
        $patientbilling->save();
        return redirect('patientbilling');
    }

    public function ststore(Request $request)
    {
        
        $patientbilling=new patientbilling();
        //$patientbilling->bill_id=$request->billid;
        $patientbilling->admission_id=$request->admissionid;

        $ad=Admission::where('admission_id',$request->admissionid)->get()->first();;
        $adate=new DateTime($ad->admissiondate);
        $cdate=new DateTime(date('y-m-d'));
        $interval = $cdate->diff($adate);
        $days = $interval->format('%a');

        $bedid=$ad->bed_id;
        $bedo=bed::where('bed_id',$bedid)->get()->first();
        $roomid=$bedo->room_id;
        $roomo=room::where('room_id',$roomid)->get()->first();
        $roomtypeid=$roomo->roomtype_id;
        $roomtypeo=roomtype::where('roomtype_id',$roomtypeid)->get()->first();
        $bedc=$roomtypeo->bedcharge;
        $nc=$roomtypeo->nursingcharge;
        $doctorc=$roomtypeo->doctorcharge;
        
        
        $ptests=Patienttest::where('admission_id',$ad->admission_id)->get();
        $testcharges=0;
        
        foreach($ptests as $test)
        {
            $testc=test::where('test_id',$test->test_id)->get()->first();

            $testcharges=$testcharges+$testc->testcharge;

        }

        $medicines=medicineallocation::where('admission_id',$ad->admission_id)->get();
        $medicinecharge=0;
        foreach($medicines as $medicine)
        {
            $medc=medicine::where('medicine_id',$medicine->medicine_id)->get()->first();

            $medicinecharge=$medicinecharge+$medc->price*$medicine->quantity;

        }

        $doctors=doctorvisit::where('admission_id',$ad->admission_id)->get();
        $doctorcharge=0;
        foreach($doctors as $doctor)
        {
            
            $drc=doctor::where('doctor_id',$doctor->doctor_id)->get()->first();
            $doctorcharge=$doctorcharge+$drc->doctorcharge;
        }
        $gtotal=$bedc*$days+$doctorc*$days+$nc*$days+$medicinecharge+ $testcharges+$doctorcharge;
        



        

        $patientbilling->bill_date=$request->billdate;
        $patientbilling->no_of_days=$days;
        $patientbilling->bedcharge=$bedc*$days;
        $patientbilling->doctorcharge=$doctorc*$days;
        $patientbilling->nursingcharge=$nc*$days;
        $patientbilling->medicinecharge=$medicinecharge;
        $patientbilling->testcharge=$testcharges;
        $patientbilling->doctorvisitcharge=$doctorcharge;
        $patientbilling->total=$gtotal;
        $patientbilling->save();
        return redirect('stpatientbilling');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\patientbilling  $patientbilling
     * @return \Illuminate\Http\Response
     */
    public function show(patientbilling $patientbilling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\patientbilling  $patientbilling
     * @return \Illuminate\Http\Response
     */
    public function edit($patientbilling)
    {
        $data=patientbilling::where('bill_id',$patientbilling)->get()->first();
        $adata = admission::join('patient', 'admission.patient_id', '=', 'patient.patient_id')
        ->join('bed', 'admission.bed_id', '=', 'bed.bed_id')        
         ->get(['admission.*','patient.name','bed.bed_no']);
        return view('patientbillingedit',['data'=> $data,'adata'=>$adata]);
    
    }

    public function stedit($patientbilling)
    {
        $data=patientbilling::where('bill_id',$patientbilling)->get()->first();
        $adata = admission::join('patient', 'admission.patient_id', '=', 'patient.patient_id')
        ->join('bed', 'admission.bed_id', '=', 'bed.bed_id')        
         ->get(['admission.*','patient.name','bed.bed_no']);
        return view('staff/patientbillingedit',['data'=> $data,'adata'=>$adata]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\patientbilling  $patientbilling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$patientbilling)
    {
        $admission_id=$request->admissionid;
        $bill_date=$request->billdate;
        $no_of_days=$request->noofdays;
        $bedcharge=$request->bedcharge;
        $doctorcharge=$request->doctorcharge;
        $nursingcharge=$request->nursingcharge;
        $medicinecharge=$request->medicinecharge;
        $testcharge=$request->testcharge;
        $doctorvisitcharge=$request->doctorvisitingcharge;
        $total=$request->total;
        DB::update('update patientbilling set `admission_id`= ? ,`bill_date`= ?,`no_of_days`=?, `bedcharge`=?,`doctorcharge`=?,`nursingcharge`=?,`medicinecharge`=?,`testcharge`=?,`doctorvisitcharge`=?, `total`=? where bill_id = ?',[$admission_id,$bill_date,$no_of_days,$bedcharge,$doctorcharge,$nursingcharge,$medicinecharge,$testcharge,$doctorvisitcharge,$total,$patientbilling]);
        return redirect('patientbilling');
    }
    public function stupdate(Request $request,$patientbilling)
    {
        $admission_id=$request->admissionid;
        $bill_date=$request->billdate;
        $no_of_days=$request->noofdays;
        $bedcharge=$request->bedcharge;
        $doctorcharge=$request->doctorcharge;
        $nursingcharge=$request->nursingcharge;
        $medicinecharge=$request->medicinecharge;
        $testcharge=$request->testcharge;
        $doctorvisitcharge=$request->doctorvisitingcharge;
        $total=$request->total;
        DB::update('update patientbilling set `admission_id`= ? ,`bill_date`= ?,`no_of_days`=?, `bedcharge`=?,`doctorcharge`=?,`nursingcharge`=?,`medicinecharge`=?,`testcharge`=?,`doctorvisitcharge`=?, `total`=? where bill_id = ?',[$admission_id,$bill_date,$no_of_days,$bedcharge,$doctorcharge,$nursingcharge,$medicinecharge,$testcharge,$doctorvisitcharge,$total,$patientbilling]);
        return redirect('stpatientbilling');
    }

    /**

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\patientbilling  $patientbilling
     * @return \Illuminate\Http\Response
     */
    public function deldata($patientbilling)
    {
        DB::delete('delete from patientbilling where bill_id = ?',[$patientbilling]);
        return redirect('patientbilling');
    }

    public function stdeldata($patientbilling)
    {
        DB::delete('delete from patientbilling where bill_id = ?',[$patientbilling]);
        return redirect('stpatientbilling');
    }
}

<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\roomtypeController;
use App\Http\Controllers\wardController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\bedController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\admissionController;
use App\Http\Controllers\medicinetypeController;
use App\Http\Controllers\medicineController;
use App\Http\Controllers\testController;
use App\Http\Controllers\medicineallocationController;
use App\Http\Controllers\treatmentController;
use App\Http\Controllers\patienttestController;
use App\Http\Controllers\patientbillingController;
use App\Http\Controllers\doctorvisitController;
use App\Http\Controllers\patientdischargeController;
/*
|--------
\------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main', function () {
   return view('main');
});

Route::get('/doctormain', function () {
   return view('doctor/doctormain');
});


Route::get('/staffmain', function () {
   return view('staff/staffmain');
});
Route::get('/drdashboard', function () {
   return view('drdashboard');
});
Route::get('/dashboard', function () {
   return view('dashboard');
});

Route::get('/stdashboard', function () {
   return view('stdashboard');
});



Route::get('/admin',[AdminController::class,'index']);
Route::get('/dradmin',[AdminController::class,'drindex']);
Route::get('/stadmin',[AdminController::class,'stindex']);
Route::get('/adminadd',function () {
    return view('adminadd');
});
Route::get('/adminlogin',function () {
   return view('adminlogin');
});
Route::post('/adminadd',[AdminController::class,'store']);
Route::post('/adminlogin',[AdminController::class,'login']);
Route::get('/admindel/{id}',[adminController::class,'deldata']);
Route::get('/adminedit/{id}',[adminController::class,'edit']);
Route::post('/adminedit/{id}',[adminController::class,'update']);



Route::get('/doctor',[doctorController::class,'index']);
Route::get('/doctorprint',[doctorController::class,'printdata']);

Route::get('/drdoctor',[doctorController::class,'drindex']);


Route::get('/doctorlogin',function () {
   return view('doctorlogin');
});
Route::post('/doctoradd',[doctorController::class,'store']);
Route::get('/doctoradd',[doctorController::class,'create']);
Route::post('/drdoctoradd',[doctorController::class,'drstore']);
Route::get('/drdoctoradd',[doctorController::class,'drcreate']);

Route::post('/doctorlogin',[doctorController::class,'login']);
Route::get('/doctordel/{id}',[doctorController::class,'deldata']);
Route::get('/doctoredit/{id}',[doctorController::class,'edit']);
Route::post('/doctoredit/{id}',[doctorController::class,'update']);
Route::get('/drdoctoredit/{id}',[doctorController::class,'dredit']);
Route::post('/drdoctoredit/{id}',[doctorController::class,'drupdate']);
Route::get('/drdoctordel/{id}',[doctorController::class,'drdeldata']);






Route::get('/roomtype',[roomtypeController::class,'index']);
Route::get('/roomprint',[roomtypeController::class,'printdata']);
Route::get('/drroomtype',[roomtypeController::class,'drindex']);
Route::get('/stroomtype',[roomtypeController::class,'stindex']);
Route::get('/roomtypeadd', function () {
   return view('roomtypeadd');
});
Route::post('/roomtypeadd',[roomtypeController::class,'store']);
Route::get('/roomtypeadd',[roomtypeController::class,'create']);

Route::post('/stroomtypeadd',[roomtypeController::class,'ststore']);
Route::get('/stroomtypeadd',[roomtypeController::class,'stcreate']);

Route::get('/roomtypedelete/{id}',[roomtypeController::class,'deldata']);
Route::get('/roomtypeedit/{id}',[roomtypeController::class,'edit']);
Route::post('/roomtypeedit/{id}',[roomtypeController::class,'update']);
Route::get('/stroomtypeedit/{id}',[roomtypeController::class,'stedit']);
Route::post('/stroomtypeedit/{id}',[roomtypeController::class,'stupdate']);




Route::get('/ward',[wardController::class,'index']);
Route::get('/drward',[wardController::class,'drindex']);
Route::get('/stward',[wardController::class,'stindex']);

Route::post('/wardadd',[wardController::class,'store']);
Route::get('/wardadd',[wardController::class,'create']);
Route::post('/drwardadd',[wardController::class,'drstore']);
Route::get('/drwardadd',[wardController::class,'drcreate']);
Route::post('/stwardadd',[wardController::class,'ststore']);
Route::get('/stwardadd',[wardController::class,'stcreate']);
Route::get('/warddel/{id}',[wardController::class,'deldata']);
Route::get('/wardedit/{id}',[wardController::class,'edit']);
Route::post('/wardedit/{id}',[wardController::class,'update']);
Route::get('/drwardedit/{id}',[wardController::class,'dredit']);
Route::post('/drwardedit/{id}',[wardController::class,'drupdate']);
Route::get('/stwardedit/{id}',[wardController::class,'stedit']);
Route::post('/stwardedit/{id}',[wardController::class,'stupdate']);



Route::get('/patient',[patientController::class,'index']);
Route::get('/patientprint',[patientController::class,'printdata']);
Route::get('/drpatient',[patientController::class,'drindex']);
Route::get('/stpatient',[patientController::class,'stindex']);
Route::get('/patientadd',function () {
   return view('patientadd');
});

Route::post('/patientadd',[patientController::class,'store']);
Route::get('/patientadd',[patientController::class,'create']);
Route::post('/stpatientadd',[patientController::class,'ststore']);
Route::get('/stpatientadd',[patientController::class,'stcreate']);
Route::post('/drpatientadd',[patientController::class,'drstore']);
Route::get('/drpatientadd',[patientController::class,'drcreate']);

Route::get('/patientedit/{id}',[patientController::class,'edit']);
Route::post('/patientedit/{id}',[patientController::class,'update']);
Route::get('/stpatientedit/{id}',[patientController::class,'stedit']);
Route::post('/stpatientedit/{id}',[patientController::class,'stupdate']);
Route::get('/drpatientedit/{id}',[patientController::class,'dredit']);
Route::post('/drpatientedit/{id}',[patientController::class,'drupdate']);

Route::get('/patientdel/{id}',[patientController::class,'deldata']);
Route::get('/stpatientdel/{id}',[patientController::class,'stdeldata']);



Route::get('/room',[roomController::class,'index']);
Route::get('/drroom',[roomController::class,'drindex']);
Route::get('/stroom',[roomController::class,'stindex']);


Route::get('/roomadd',[roomController::class,'create']);
Route::post('/roomadd',[roomController::class,'store']);
Route::get('/stroomadd',[roomController::class,'stcreate']);
Route::post('/stroomadd',[roomController::class,'ststore']);

Route::get('/drroomadd',[roomController::class,'drcreate']);
Route::post('/drroomadd',[roomController::class,'drstore']);
Route::get('/roomdel/{id}',[roomController::class,'deldata']);
Route::get('/roomedit/{id}',[roomController::class,'edit']);
Route::post('/roomedit/{id}',[roomController::class,'update']);
Route::get('/drroomedit/{id}',[roomController::class,'dredit']);
Route::post('/drroomedit/{id}',[roomController::class,'drupdate']);

Route::get('/stroomedit/{id}',[roomController::class,'stedit']);
Route::post('/stroomedit/{id}',[roomController::class,'stupdate']);


Route::get('/bed',[bedController::class,'index']);
Route::get('/drbed',[bedController::class,'drindex']);

Route::get('/bedadd',function(){
   return view('bedadd');
});
Route::get('/bedadd',[bedController::class,'create']);
Route::post('/bedadd',[bedController::class,'store']);
Route::get('/bededit/{id}',[bedController::class,'edit']);
Route::post('/bededit/{id}',[bedController::class,'update']);
Route::get('/beddel/{id}',[bedController::class,'deldata']);


Route::get('/staff',[staffController::class,'index']);
Route::get('/staffadd',function () {
    return view('staffadd');
});
Route::get('/stafflogin',function () {
   return view('stafflogin');
});
Route::post('/staffadd',[staffController::class,'store']);
Route::post('/stafflogin',[staffController::class,'login']);
Route::get('/staffedit/{id}',[staffController::class,'edit']);
Route::post('/staffedit/{id}',[staffController::class,'update']);
Route::get('/staffdel/{id}',[staffController::class,'deldata']);



Route::get('/admission',[admissionController::class,'index']);
Route::get('/dradmission',[admissionController::class,'drindex']);
Route::get('/stadmission',[admissionController::class,'stindex']);

Route::post('/admissionadd',[admissionController::class,'store']);
Route::get('/admissionadd',[admissionController::class,'create']);
Route::post('/dradmissionadd',[admissionController::class,'drstore']);
Route::get('/dradmissionadd',[admissionController::class,'drcreate']);


Route::post('/stadmissionadd',[admissionController::class,'ststore']);
Route::get('/stadmissionadd',[admissionController::class,'stcreate']);

Route::get('/admissionedit/{id}',[admissionController::class,'edit']);
Route::post('/admissionedit/{id}',[admissionController::class,'update']);
Route::get('/stadmissionedit/{id}',[admissionController::class,'stedit']);
Route::post('/stadmissionedit/{id}',[admissionController::class,'stupdate']);

Route::get('/dradmissionedit/{id}',[admissionController::class,'dredit']);
Route::post('/dradmissionedit/{id}',[admissionController::class,'drupdate']);
Route::get('/admissiondel/{id}',[admissionController::class,'deldata']);
Route::get('/stadmissiondel/{id}',[admissionController::class,'stdeldata']);



Route::get('/medicinetype',[medicinetypeController::class,'index']);
Route::get('/stmedicinetype',[medicinetypeController::class,'stindex']);
Route::get('/drmedicinetype',[medicinetypeController::class,'drindex']);

Route::post('/medicinetypeadd',[medicinetypeController::class,'store']);
Route::get('/medicinetypeadd',[medicinetypeController::class,'create']);
Route::post('/drmedicinetypeadd',[medicinetypeController::class,'drstore']);
Route::get('/drmedicinetypeadd',[medicinetypeController::class,'drcreate']);

Route::post('/stmedicinetypeadd',[medicinetypeController::class,'ststore']);
Route::get('/stmedicinetypeadd',[medicinetypeController::class,'stcreate']);

Route::get('/medicinetypeedit/{id}',[medicinetypeController::class,'edit']);
Route::post('/medicinetypeedit/{id}',[medicinetypeController::class,'update']);
Route::get('/drmedicinetypeedit/{id}',[medicinetypeController::class,'dredit']);
Route::post('/drmedicinetypeedit/{id}',[medicinetypeController::class,'drupdate']);
Route::get('/medicinetypedel/{id}',[medicinetypeController::class,'deldata']);
Route::get('/stmedicinetypedel/{id}',[medicinetypeController::class,'stdeldata']);



Route::get('/medicine',[medicineController::class,'index']);
Route::get('/drmedicine',[medicineController::class,'drindex']);

Route::get('/medicineadd', function () {
   return view('medicineadd');
});
Route::post('/medicineadd',[medicineController::class,'store']);
Route::get('/medicinedel/{id}',[medicineController::class,'deldata']);
Route::get('/medicineadd',[medicineController::class,'create']);
Route::get('/medicineedit/{id}',[medicineController::class,'edit']);
Route::post('/medicineedit/{id}',[medicineController::class,'update']);
Route::post('/drmedicineadd',[medicineController::class,'drstore']);
Route::get('/drmedicineadd',[medicineController::class,'drcreate']);
Route::get('/drmedicineedit/{id}',[medicineController::class,'dredit']);
Route::post('/drmedicineedit/{id}',[medicineController::class,'drupdate']);


Route::get('/test',[testController::class,'index']);
Route::get('/testprint',[testController::class,'printdata']);

Route::get('/drtest',[testController::class,'drindex']);
Route::get('/testadd', function () {
   return view('testadd');
});
Route::post('/testadd',[testController::class,'store']);
Route::get('/testadd',[testController::class,'create']);
Route::post('/drtestadd',[testController::class,'drstore']);
Route::get('/drtestadd',[testController::class,'drcreate']);

Route::get('/testdel/{id}',[testController::class,'deldata']);
Route::get('/testedit/{id}',[testController::class,'edit']);
Route::post('/testedit/{id}',[testController::class,'update']);
Route::get('/drtestedit/{id}',[testController::class,'dredit']);
Route::post('/drtestedit/{id}',[testController::class,'drupdate']);



Route::get('/medicineallocation',[medicineallocationController::class,'index']);
Route::get('/stmedicineallocation',[medicineallocationController::class,'stindex']);
Route::get('/drmedicineallocation',[medicineallocationController::class,'drindex']);

Route::post('/medicineallocationadd',[medicineallocationController::class,'store']);
Route::get('/medicineallocationadd',[medicineallocationController::class,'create']);
Route::post('/drmedicineallocationadd',[medicineallocationController::class,'drstore']);
Route::get('/drmedicineallocationadd',[medicineallocationController::class,'drcreate']);

Route::post('/stmedicineallocationadd',[medicineallocationController::class,'ststore']);
Route::get('/stmedicineallocationadd',[medicineallocationController::class,'stcreate']);

Route::get('/medicineallocationedit/{id}',[medicineallocationController::class,'edit']);
Route::post('/medicineallocationedit/{id}',[medicineallocationController::class,'update']);
Route::get('/stmedicineallocationedit/{id}',[medicineallocationController::class,'stedit']);
Route::post('/stmedicineallocationedit/{id}',[medicineallocationController::class,'stupdate']);

Route::get('/drmedicineallocationedit/{id}',[medicineallocationController::class,'dredit']);
Route::post('/drmedicineallocationedit/{id}',[medicineallocationController::class,'drupdate']);
Route::get('/medicineallocationdel/{id}',[medicineallocationController::class,'deldata']);


Route::get('/treatment',[treatmentController::class,'index']);
Route::get('/drtreatment',[treatmentController::class,'drindex']);
Route::get('/sttreatment',[treatmentController::class,'stindex']);

Route::get('/treatmentadd', function () {
   return view('treatmentadd');
});
Route::post('/treatmentadd',[treatmentController::class,'store']);
Route::get('/treatmentadd',[treatmentController::class,'create']);
Route::post('/drtreatmentadd',[treatmentController::class,'drstore']);
Route::post('/sttreatmentadd',[treatmentController::class,'ststore']);
Route::get('/sttreatmentadd',[treatmentController::class,'stcreate']);

Route::get('/drtreatmentadd',[treatmentController::class,'drcreate']);
Route::get('/treatmentedit/{id}',[treatmentController::class,'edit']);
Route::post('/treatmentedit/{id}',[treatmentController::class,'update']);
Route::get('/drtreatmentedit/{id}',[treatmentController::class,'dredit']);
Route::get('/sttreatmentedit/{id}',[treatmentController::class,'stedit']);
Route::post('/sttreatmentedit/{id}',[treatmentController::class,'stupdate']);

Route::post('/drtreatmentedit/{id}',[treatmentController::class,'drupdate']);
Route::get('/treatmentdel/{id}',[treatmentController::class,'deldata']);


Route::get('/patienttest',[patienttestController::class,'index']);
Route::get('/drpatienttest',[patienttestController::class,'drindex']);

Route::post('/patienttestadd',[patienttestController::class,'store']);
Route::get('/patienttestadd',[patienttestController::class,'create']);
Route::post('/drpatienttestadd',[patienttestController::class,'drstore']);
Route::get('/drpatienttestadd',[patienttestController::class,'drcreate']);
Route::get('/patienttestedit/{id}',[patienttestController::class,'edit']);
Route::post('/patienttestedit/{id}',[patienttestController::class,'update']);
Route::get('/drpatienttestedit/{id}',[patienttestController::class,'dredit']);
Route::post('/drpatienttestedit/{id}',[patienttestController::class,'drupdate']);
Route::get('/patienttestdel/{id}',[patienttestController::class,'deldata']);


Route::get('/patientbilling',[patientbillingController::class,'index']);
Route::get('/patientbillingprint',[patientbillingController::class,'printdata']);
Route::get('/printbilling/{id}',[patientbillingController::class,'print']);



Route::get('/stpatientbilling',[patientbillingController::class,'stindex']);
Route::get('/patientbillingadd', function () {
   return view('patientbillingadd');
});
Route::post('/stpatientbillingadd',[patientbillingController::class,'ststore']);

Route::post('/patientbillingadd',[patientbillingController::class,'store']);
Route::get('/patientbillingadd',[patientbillingController::class,'create']);
Route::get('/stpatientbillingadd',[patientbillingController::class,'stcreate']);

Route::get('/bpatientbillingadd',[patientbillingController::class,'bcreate']);
Route::get('/bpatientbillingadd',[patientbillingController::class,'rmcreate']);
Route::get('/bpatientbillingadd',[patientbillingController::class,'rcreate']);


Route::get('/patientbillingdel/{id}',[patientbillingController::class,'deldata']);
Route::get('/stpatientbillingdel/{id}',[patientbillingController::class,'stdeldata']);

Route::get('/patientbillingedit/{id}',[patientbillingController::class,'edit']);
Route::post('/patientbillingedit/{id}',[patientbillingController::class,'update']);
Route::get('/stpatientbillingedit/{id}',[patientbillingController::class,'stedit']);
Route::post('/stpatientbillingedit/{id}',[patientbillingController::class,'stupdate']);


Route::get('/doctorvisit',[doctorvisitController::class,'index']);
Route::get('/drdoctorvisit',[doctorvisitController::class,'drindex']);
Route::get('/stdoctorvisit',[doctorvisitController::class,'stindex']);
Route::get('/doctorvisitadd', function () {
   return view('doctorvisitadd');
});
Route::post('/doctorvisitadd',[doctorvisitController::class,'store']);
Route::get('/doctorvisitadd',[doctorvisitController::class,'create']);
Route::post('/stdoctorvisitadd',[doctorvisitController::class,'ststore']);
Route::get('/stdoctorvisitadd',[doctorvisitController::class,'stcreate']);
Route::post('/drdoctorvisitadd',[doctorvisitController::class,'drstore']);
Route::get('/drdoctorvisitadd',[doctorvisitController::class,'drcreate']);

Route::get('/doctorvisitdel/{id}',[doctorvisitController::class,'deldata']);
Route::get('/doctorvisitedit/{id}',[doctorvisitController::class,'edit']);
Route::post('/doctorvisitedit/{id}',[doctorvisitController::class,'update']);

Route::get('/drdoctorvisitedit/{id}',[doctorvisitController::class,'dredit']);
Route::post('/drdoctorvisitedit/{id}',[doctorvisitController::class,'drupdate']);



Route::get('/patientdischarge',[patientdischargeController::class,'index']);
Route::get('/stpatientdischarge',[patientdischargeController::class,'stindex']);
Route::get('/patientdischargeadd', function () {
   return view('patientdischargeadd');
});
Route::post('/patientdischargeadd',[patientdischargeController::class,'store']);
Route::post('/stpatientdischargeadd',[patientdischargeController::class,'ststore']);

Route::get('/patientdischargeadd',[patientdischargeController::class,'create']);
Route::get('/patientdischargeedit/{id}',[patientdischargeController::class,'edit']);
Route::post('/patientdischargeedit/{id}',[patientdischargeController::class,'update']);
Route::get('/stpatientdischargeedit/{id}',[patientdischargeController::class,'stedit']);
Route::post('/stpatientdischargeedit/{id}',[patientdischargeController::class,'stupdate']);
Route::get('/patientdischargedel/{id}',[patientdischargeController::class,'deldata']);
Route::get('/stpatientdischargedel/{id}',[patientdischargeController::class,'stdeldata']);


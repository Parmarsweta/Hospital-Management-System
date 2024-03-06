@extends('doctor/doctormain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Patient Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/drpatientedit/{{$data->patient_id}}" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputpatient">Patient_id :</label>
                  <input type="number" class="form-control" id="patientid" name="patientid" value="{{$data->patient_id}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputname">name :</label>
                  <input type="text" class="form-control" id="patientname" name="patientname" value="{{$data->name}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputWeight">weight :</label>
                  <input type="number" class="form-control" id="patientweight" name="patientweight" value="{{$data->weight}}" placeholder="Enter number">
                </div>

                <div class="form-group">
                <label for="exampleInputMobile_no">gender :</label>
                
                <label>male</label>
                        <input type="radio" name="gendar" value="Male" id="male">
                        <label>famale</label>
                        <input type="radio" name="gendar" value="Female" id="famale">
                </div>

                <div class="form-group">
                  <label for="exampleInputAddress">address :</label>
                  <input type="address" class="form-control" id="address" name="address"  value="{{$data->address}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputphone">phone :</label>
                  <input type="number" class="form-control" id="patientphone" name="patientphone"  value="{{$data->phone}}" placeholder="Enter number">
                </div>
                

                <div class="form-group">
                  <label for="exampleInputEmail">medicalhistory :</label>
                  <input type="text" class="form-control" id="patientmedicalhistory" name="patientmedicalhistory" value="{{$data->medicalhistory}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputfamilyhistory">familyhistory :</label>
                  <input type="text" class="form-control" id="patientfamilyhistory" name="patientfamilyhistory"  value="{{$data->familyhistory}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputDOB">dob :</label>
                  <input type="date" class="form-control" id="patientdate" name="patientdate" value="{{$data->dob}}" placeholder="Enter date">
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputBloodgroup">bloodgroup :</label>
                  <input type="text" class="form-control" id="patientbloodgroup" name="patientbloodgroup" value="{{$data->bloodgroup}}" placeholder=" Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputvisiting">habits :</label>
                  <input type="text" class="form-control" id="patienthabits" name="patienthabits"  value="{{$data->habits}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputAdmin_name">otherdetails :</label>
                  <input type="text" class="form-control" id="otherdetalis" name="otherdetalis" value="{{$data->otherdetails}}" placeholder="Enter text">
                </div>
                

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
</section>
@endsection
          <!-- /.box -->
@extends('staff/staffmain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Admission Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="stadmissionadd" method="post">
              @csrf
              <div class="box-body">
                

                <div class="form-group">
                  <label for="exampleInputAdmissiondate">admissiondate :</label>
                  <input type="date" class="form-control" id="admissiondate" name="date" required placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputBed_id">bed_id :</label>
                  <select class="form-control" id="bed_id" name="bedid" required placeholder="Enter number">
                  @foreach( $bdata as $d)
              		<option value='{{$d->bed_id}}'>{{$d->bed_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPatient_id">patient:</label>
                  <select class="form-control" id="patientid"  name="patientid" placeholder="Enter number">
                  @foreach( $pdata as $d)
              		<option value='{{$d->patient_id}}'>{{$d->name}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputComplaint">complaint :</label>
                  <input type="text" class="form-control" id="complaint" name="complaint" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputDoctor_id">doctor :</label>
                  <select class="form-control" id="doctor_id" name="dotorid" placeholder="Enter number">
                  @foreach( $dodata as $d)
              		<option value='{{$d->doctor_id}}'>{{$d->name}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputDiagnosis">diagnosis :</label>
                  <input type="text" class="form-control" id="diagnosis" name="admidiagnosis" placeholder="Enter text">
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
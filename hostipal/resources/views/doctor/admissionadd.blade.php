@extends('doctor/doctormain')
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
            <form action="dradmissionadd" method="post">
              @csrf
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputAdmissiondate">admissiondate :</label>
                  <input type="date" class="form-control" id="admissiondate" name="date" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputBed_id">bed_id :</label>
                  <select class="form-control" id="bed_id" name="bedid" placeholder="Enter number" required>
                  @foreach( $bdata as $d)
              		<option value='{{$d->bed_id}}'>{{$d->bed_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPatient_id">patient_id :</label>
                  <select class="form-control" id="patientid"  name="patientid" placeholder="Enter number" required>
                  @foreach( $pdata as $d)
              		<option value='{{$d->patient_id}}'>{{$d->patient_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputComplaint">complaint :</label>
                  <input type="text" class="form-control" id="complaint" name="complaint" placeholder="Enter text" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputDoctor_id">doctor_id :</label>
                  <select class="form-control" id="doctor_id" name="dotorid" placeholder="Enter number" required>
                  @foreach( $dodata as $d)
              		<option value='{{$d->doctor_id}}'>{{$d->doctor_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputDiagnosis">diagnosis :</label>
                  <input type="text" class="form-control" id="diagnosis" name="admidiagnosis" placeholder="Enter text" required>
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
@extends('staff/staffmain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Patientbilling Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="stpatientbillingadd" method="post">
              @csrf
              <div class="box-body">
                

                <div class="form-group">
                  <label for="exampleInputmedicinetype">Patient :</label>
                  <select class="form-control" id="admissionid" name="admissionid" required placeholder="Enter number">
                  @foreach( $data as $d)
              		<option value='{{$d->admission_id}}'>{{$d->name}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">Admission date :</label>
                  <input type="date" class="form-control" id="billdate" required name="billdate" placeholder="Enter number" value="{{$d->admissiondate}}">
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Calculate&submit</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
</section>
@endsection
          <!-- /.box -->
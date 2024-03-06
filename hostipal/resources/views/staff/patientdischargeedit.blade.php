@extends('staff/staffmain')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Patientdischarge Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/stpatientdischargeedit/{{$data->patientdischarge_id}}" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputmedicinetype">patientdischarge_id :</label>
                  <input type="number" class="form-control" id="patientdischargeid" name="patientdischargeid" value="{{$data->patientdischrage_id}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">admission_id :</label>
                  <select class="form-control" id="admissionid" name="admissionid"  value="{{$data->admission_id}}" placeholder="Enter number">
                  @foreach( $adata as $d)
              		<option value='{{$d->admission_id}}'>{{$d->admission_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputname">dischargedate :</label>
                  <input type="date" class="form-control" id="dischargedate" name="dischargedate" value="{{$data->dischargedate}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">diagnosis :</label>
                  <input type="text" class="form-control" id="txt" name="txt" value="{{$data->diagnosis}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">treatmentdescription :</label>
                  <input type="text" class="form-control" id="text" name="text" value="{{$data->treatmentdescription}}" placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">advicedescription :</label>
                  <input type="text" class="form-control" id="advicedescription" name="advicedescription" value="{{$data->advicedescription}}" placeholder="Enter text">
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
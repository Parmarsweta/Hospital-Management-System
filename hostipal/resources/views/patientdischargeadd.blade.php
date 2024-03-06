@extends('main')
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
            <form action="patientdischargeadd" method="post">
              @csrf
              <div class="box-body">
                

                <div class="form-group">
                  <label for="exampleInputmedicinetype">admission_id :</label>
                  <select class="form-control" id="admissionid" name="admissionid" required placeholder="Enter number">
                  @foreach( $adata as $d)
              		<option value='{{$d->admission_id}}'>{{$d->admission_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputname">dischargedate :</label>
                  <input type="date" class="form-control" id="dischargedate" name="dischargedate" required placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">diagnosis :</label>
                  <input type="text" class="form-control" id="txt" name="txt" required placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">treatmentdescription :</label>
                  <input type="text" class="form-control" id="text" name="text" required placeholder="Enter text">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">advicedescription :</label>
                  <input type="text" class="form-control" id="advicedescription" name="advicedescription" required placeholder="Enter text">
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
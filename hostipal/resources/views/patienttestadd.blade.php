@extends('main')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">patienttestadd Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="patienttestadd" method="post">
              @csrf
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputname">admission_id :</label>
                  <select class="form-control" id="admissionid" name="admissionid" required  placeholder="Enter number">
                  @foreach( $adata as $d)
              		<option value='{{$d->admission_id}}'>{{$d->admission_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputname">test_id :</label>
                  <select class="form-control" id="testid" name="testid"  required placeholder="Enter number">
                  @foreach( $tdata as $d)
              		<option value='{{$d->test_id}}'>{{$d->name}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputname">datetime :</label>
                  <input type="datetime-local" class="form-control" id="testdate" name="testdate" required placeholder="Enter date">
                </div>

                <div class="form-group">
                  <label for="exampleInputname">reportdescription :</label>
                  <input type="text" class="form-control" id="txt" name="txt" required placeholder="Enter text">
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
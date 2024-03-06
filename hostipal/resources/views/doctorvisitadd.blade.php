@extends('main')
@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Doctorvisit Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="doctorvisitadd" method="post">
              @csrf
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputmedicinetype">doctor_id :</label>
                  <select class="form-control" id="doctorid" name="doctorid" required placeholder="Enter number">
                  @foreach( $dodata as $d)
              		<option value='{{$d->doctor_id}}'>{{$d->doctor_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">admission_id :</label>
                  <select class="form-control" id="admissionid" name="admissionid" required placeholder="Enter number">
                  @foreach( $adata as $d)
              		<option value='{{$d->admission_id}}'>{{$d->admission_id}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputmedicinetype">date :</label>
                  <input type="date" class="form-control" id="date" name="date" required placeholder="Enter date">
                </div>
                <div class="form-group">
                  <label for="exampleInputname">purpose :</label>
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